<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
 function cpd_theme($existing, $type, $theme, $path) {
     $items['datauy_cpd_trivia_form'] = array(
         'render element' => 'form',
         'template' => 'trivia',
         'path' => drupal_get_path('theme', 'cpd') . '/templates/form',
     );

     return $items;
 }
