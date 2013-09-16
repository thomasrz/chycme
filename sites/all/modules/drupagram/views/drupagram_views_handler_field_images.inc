<?php

/**
 * @file
 * Views handler for instagram images
 */

/**
 * Field handler to provide simple renderer that turns a URL into a clickable link.
 */
class drupagram_views_handler_field_images extends views_handler_field {
    function option_definition() {
    $conf = InstagramConf::instance();
    $options = parent::option_definition();
    $options['source'] = array('default' => 'thumbnail');
    $options['link_to_post'] = array('default' => FALSE);
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $form['source'] = array(
      '#title' => t('Image Source'),
      '#type' => 'select',
      '#options' => array(
          'thumbnail' => t('Thumbnail'),
          'standard_resolution' => t('Standard Resolution'),
          'low_resolution' => t('Low Resolution'),
      ),
      '#default_value' => $this->options['source'],
    );
    $form['link_to_post'] = array(
      '#title' => t('Link to post'),
      '#description' => t('If the link field is available, the image field will link to the Instagram post'),
      '#type' => 'checkbox',
      '#default_value' => !empty($this->options['link_to_post']),
    );
  }

  function render($values) {
    $value = $values->{$this->field_alias};
    $images = unserialize($value);
    if (!empty($this->options['source'])) {
      $source = $this->options['source'];
    }

    $image = theme('image', $images[$source]['url'], '', '', NULL, FALSE);
    if ($this->options['link_to_post'] && isset($values->drupagram_link) && !empty($values->drupagram_link)) {
      return l($image, $values->drupagram_link, array('html' => TRUE, 'attributes' => array('target' => '_blank', 'rel' => 'nofollow')));
    }
    return $image;
  }
}
