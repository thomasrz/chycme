<?php

/**
 * @file
 * Instagram API functions
 */
 
 
/**
 * Connect to the API using the 'proper' version (Oauth vs. standard)
 */
function drupagram_connect($account) {
  $auth = $account->get_auth();
  if (_drupagram_use_oauth() && $auth['oauth_token'] && $auth['oauth_token_secret']) {
    module_load_include('lib.php', 'oauth_common');
    return new InstagramOAuth(variable_get('drupagram_consumer_key', ''), variable_get('drupagram_consumer_secret', ''),
                            $auth['oauth_token'], $auth['oauth_token_secret']);
  }
  elseif (_drupagram_use_oauth() && $auth['oauth_token']) {
    return new Instagram($account->username, $auth['oauth_token']);
  }
  else {
    return new Instagram;
  }
}

/**
 * Saves a InstagramUser object to {drupagram_account}
 */
function drupagram_account_save($drupagram_user, $save_auth = FALSE, $account = NULL) {
  $values = (array) $drupagram_user;
  
  if (empty($drupagram_user)) {
    return FALSE;
  }
  
  $values['drupagram_id'] = $values['id'];
  
  if ($save_auth) {
    $values += $drupagram_user->get_auth();
    if (empty($account)) {
      global $user;
      $account = $user;
    }
    $values['uid'] = $account->uid;
  }
  
  $schema = drupal_get_schema('drupagram_account');
  
   foreach ($values as $k => $v) {
     if (!isset($schema['fields'][$k])) {
       unset($values[$k]);
     }
     elseif (isset($schema['fields'][$k]['not null']) && $schema['fields'][$k]['not null'] && empty($values[$k])) {
       $values[$k] = isset($schema['fields'][$k]['default']) ? drupagram_emoji($schema['fields'][$k]['default']) : '';
     }
   }
   
   $drupagram_users_count = db_result(db_query("SELECT count(da.drupagram_id) FROM {drupagram_account} da WHERE da.drupagram_id = %d", $values['drupagram_id']));
   $values = array_filter($values, "strlen");
   $values = (object) $values;
   if ($drupagram_users_count) {
    drupal_write_record("drupagram_account", $values, "drupagram_id");
   }
   else {
     drupal_write_record("drupagram_account", $values);
   }
}

/**
 * Delete a drupagram account and its statuses.
 *
 * @param $drupagram_id
 *   An integer with the Instagram UID.
 *
 * @param $username
 *   Optional string with the user name.
 */
function drupagram_account_delete($drupagram_id) {
  $account = drupagram_account_load($drupagram_id);
  
  db_query("DELETE FROM {drupagram_account} WHERE drupagram_id=%d", $drupagram_id);
  db_query("DELETE FROM {drupagram} WHERE username='%s'", $account->username);
  db_query("DELETE FROM {authmap} WHERE authname='%s' AND module='%s'", $drupagram_id, 'drupagram');
}

/**
 * Helper function to handle emoji special characters.
 * 
 * In the future this will be the single point where emoji unicode characters
 * will be replaced with the actual image for it.
 * 
 * This issue is only pertinent to users adding emoji characters to their posts
 * or usernames.
 */
function drupagram_emoji(&$variable) {
  if (is_array($variable)) {
    foreach ($variable as $key => $value) {
      if (empty($value)) {
        continue;
      }
      $variable[$key] = drupagram_emoji($value);
    }
  }
  elseif (is_object($variable)) {
    $variable = (array)$variable;
    foreach ($variable as $key => $value) {
      if (empty($value)) {
        continue;
      }
      $variable[$key] = drupagram_emoji($value);
    }
    $variable = (object)$variable;
  }
  elseif (is_string($variable)) {
    $variable = preg_replace("/[\xC0-\xF7]{1,1}[\x80-\xBF]+/", "", htmlspecialchars($variable, ENT_NOQUOTES, 'UTF-8', FALSE));
  }
  return $variable;
}

/**
 * Load a Instagram account from {drupagram_account}.
 *
 * @param $id
 *   Instagram UID
 *
 * @return
 *   InstagramUser object
 *
 */
function drupagram_account_load($id) {
  $values = db_fetch_array(db_query("SELECT * FROM {drupagram_account} WHERE drupagram_id=%d", $id));
  if ($values['drupagram_id']) {
    $values['id'] = $values['drupagram_id'];
    $account = new InstagramUser($values);
    $account->set_auth($values);
    $account->uid = $values['uid'];
    $account->import = $values['import'];
    $account->is_global = $values['is_global'];
    return $account;
  }
}

/**
 * Saves a InstagramMedia object to {drupagram}
 */
function drupagram_media_save($media) {
  $drupagram = array(
    'drupagram_id' => check_plain($media->id),
    'username' => drupagram_emoji($media->user->username),
    'type' => filter_xss($media->type),
    'images' => serialize($media->images),
    'location' => serialize($media->location),
    'comments' => serialize(drupagram_emoji($media->comments)),
    'caption' => serialize(drupagram_emoji($media->caption)),
    'link' => drupagram_emoji($media->link),
    'likes' => serialize(drupagram_emoji($media->likes)),
    'filter' => filter_xss($media->filter),
    'created_at' => format_date($media->created_time, 'long'),
    'created_time' => $media->created_time,
    'endpoint_type' => t("user_recent"),
  );
  $drupagram_media_count = db_result(db_query("SELECT count(da.drupagram_id) FROM {drupagram} da WHERE da.drupagram_id = '%s'", $drupagram['drupagram_id']));
  $drupagram = (object)$drupagram;
  if ($drupagram_media_count) {
    drupal_write_record("drupagram", $drupagram, "drupagram_id");
  }
  else {
    drupal_write_record("drupagram", $drupagram);
  }
}


/**
 * Fetches a user's recent items.
 */
function drupagram_fetch_recent_items($id) {
  $params = array();
  $account = drupagram_account_load($id);
  $min_id = db_result(db_query("SELECT MAX(drupagram_id) FROM {drupagram} WHERE username = '%s'", $account->username));

  $params['!min_id'] = (int)$min_id;
  
  $params['count'] = 6;
  
  $drupagram = drupagram_connect($account);
  
  $items = $drupagram->user_recent($id);
  
  if (empty($items)) {
    return;
  }
  
  foreach ($items as $media) {
    drupagram_media_save($media);
  }
  
  db_query("UPDATE {drupagram_account} SET last_refresh=%d WHERE drupagram_id=%d", REQUEST_TIME, $account->id);
}

