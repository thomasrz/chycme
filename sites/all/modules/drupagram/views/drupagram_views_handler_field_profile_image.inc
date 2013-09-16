<?php

/**
 * @file
 * Views handler for field profile picture
 */

/**
 * Field handler to provide simple renderer that turns a URL into a clickable link.
 */
class drupagram_views_handler_field_profile_image extends views_handler_field {
  function render($values) {
    $value = $values->{$this->field_alias};
    return theme('image', $value, '', '', NULL, FALSE);
  }
}
