<?php

function chycme_config_geral_settings_form() {
  $form['chycme_config_geral_footer'] = array(
    '#type' => 'textarea',
    '#wysiwyg' => FALSE,
    '#title' => t('Rodapé'),
    '#description' => t(''),
    '#default_value' => variable_get('chycme_config_geral_footer', ''),
  );
  //$form['#validate'] = array('chycme_config_geral_settings_form_validate');
  return system_settings_form($form);
}
