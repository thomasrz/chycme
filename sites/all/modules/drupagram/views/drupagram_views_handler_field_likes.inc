<?php

/**
 * @file
 * Views handler for field likes
 */

/**
 * Field handler to show data of serialized fields.
 *
 * @ingroup views_field_handlers
 */
class drupagram_views_handler_field_likes extends views_handler_field {

  function option_definition() {
    $options = parent::option_definition();
    $options['format'] = array('default' => 'unserialized');
    $options['key'] = array('default' => '');
    return $options;
  }


  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    $form['format'] = array(
      '#type' => 'select',
      '#title' => t('Display format'),
      '#description' => t('How should the serialized data be displayed. You can choose a custom array/object key or a print_r on the full output.'),
      '#options' => array(
        'unserialized' => t('Full data'),
        'key' => t('A certain key'),
      ),
      '#default_value' => $this->options['format'],
    );
    $form['key'] = array(
      '#type' => 'select',
      '#title' => t('Which key should be displayed'),
      '#options' => array(
        'count' => t('Likes count'),
        'data' => t('Likes detail'),
      ),
      '#default_value' => $this->options['key'],
      '#dependency' => array('edit-options-format' => array('key')),
    );
  }

  function options_validate(&$form, &$form_state) {
    // Require a key if the format is key.
    if ($form_state['values']['options']['format'] == 'key' && $form_state['values']['options']['key'] == '') {
      form_error($form['key'], t('You have to enter a key if you want to display a key of the data.'));
    }
  }

  function render($values) {
    $value = $values->{$this->field_alias};

    if ($this->options['format'] == 'unserialized') {
      $value = (array) unserialize($value);
      return theme('drupagram_likes', $value);
    }
    elseif ($this->options['format'] == 'key' && !empty($this->options['key'])) {
      $value = (array) unserialize($value);
      if ($this->options['key'] == 'count') {
        return check_plain($value[$this->options['key']]);
      }
      elseif ($this->options['key'] == 'data') {
        return theme('drupagram_likes_data', array('data' => $value[$this->options['key']]));
      }
    }

    return $value;
  }
}
