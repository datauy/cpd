<?php

function datauy_cpd_admin() {
  $form = array();

  $form['datauy_cpd_test'] = array(
    '#type' => 'textfield',
    '#title' => t('DataUY test'),
    '#default_value' => variable_get('datauy_cpd_test', 'Test de DATA meta admin interface'),
    '#description' => t("Test for admin"),
  );

  $form['datauy_cpd_trivia_welcome'] = array(
    '#type' => 'textarea',
    '#title' => t('CPD Trivia Welcome'),
    '#default_value' => variable_get('datauy_cpd_trivia_welcome', 'Welcome to CPD Trivia'),
    '#description' => t("Trivia Welcome message"),
  );

  return system_settings_form($form);
}

?>
