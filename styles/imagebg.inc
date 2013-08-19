<?php

/**
 * Implementation of hook_panels_styles().
 */
function basetheme_imagebg_panels_styles() {
  return array(
    'imagebg' => array(
      'title' => t('Background Image'),
      'description' => t('Block with background image'),
      'pane settings form' => 'basetheme_imagebg_settings_form',
      'render pane' => 'imagebg_style_pane',
    ),
  );
}

function basetheme_imagebg_settings_form($style_settings) {
  // Select for form title.
  $form['image'] = array(
  '#type' => 'textfield',
  '#title' => t('Image'),
  '#description' => t('Do not include base path. Put the image in theme folder. Ex.: images/img.png'),
  '#default_value' => '/siteimages/',
  '#size' => 80,
  '#maxlength' => 128,
  '#required' => TRUE,
  );
  return $form;
}

function theme_imagebg_style_pane($content) {
  global $base_url;
  $theme_url = $base_url . '/' . drupal_get_path('theme', $GLOBALS['theme']) . '/';

  // Define pane variables
  $variables = array(
    'css_class' => !empty($content['content']->css_class) ? $content['content']->css_class : '',
    'title' => is_string($content['content']->title) ? $content['content']->title : '',
    'content' => is_string($content['content']->content) ? $content['content']->content : drupal_render($content['content']->content),
    'image' => isset($content['settings']['image']) ? $content['settings']['image'] : ''
  );

  $output = '<div class="image-pane">';
  if ($variables['image']) {
    $output .= '<div class="image-pane-image">';
    $output .= '<img src="' . $theme_url . $variables['image'] . '">';
    $output .= '</div>';
  }

  $output .= '<div class="image-pane-content">';
  if ($variables['title']) {
    $output .= '<h3 class="pane-title">' . $variables['title'] . '</h3>';
  }

  $output .= $variables['content'];
  $output .= '</div></div>';

  return $output;
}
