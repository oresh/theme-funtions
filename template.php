<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 *
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */

  /**
   * Add IE7-8 browser specific css files.
   */
  function THEMENAME_preprocess_page(&$vars) {
    drupal_add_css(path_to_theme() . '/css/ie7.css', array('group' => CSS_THEME, 'weight' => 115, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
    drupal_add_css(path_to_theme() . '/css/ie8.css', array('group' => CSS_THEME, 'weight' => 115, 'browsers' => array('IE' => 'lte IE 8', '!IE' => FALSE), 'preprocess' => FALSE));
  }

  /**
   * Rewrite the from required label symbol.
   */
  function THEMENAME_form_required_marker($variables) {
    // This is also used in the installer, pre-database setup.
    $t = get_t();
    $attributes = array(
      'class' => 'form-required',
      'title' => $t('This field is required.'),
    );
    return '<span' . drupal_attributes($attributes) . '></span>';
  }

  /**
   * Override form item label to include parent name as class.
   */
  function THEMENAME_form_element_label($variables) {
    $element = $variables['element'];
    // This is also used in the installer, pre-database setup.
    $t = get_t();
    // If title and required marker are both empty, output no label.
    if ((!isset($element['#title']) || $element['#title'] === '') && empty($element['#required'])) {
      return '';
    }
    // If the element is required, a required marker is appended to the label.
    $required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '';
    $title = filter_xss_admin($element['#title']);
    $attributes = array();
    // Style the label as class option to display inline with the element.
    if ($element['#title_display'] == 'after') {
      $attributes['class'] = 'option';
    }
    // Show label only to screen readers to avoid disruption in visual flows.
    elseif ($element['#title_display'] == 'invisible') {
      $attributes['class'] = 'element-invisible';
    }
    if (!empty($element['#id'])) {
      $attributes['for'] = $element['#id'];
    }
    if (!empty($element['#parents'])) {
      $attributes['class'] = 'feild-' . $element['#parents'][0] . '-label';
    }
    // The leading whitespace helps visually separate fields from inline labels.
    return ' <label' . drupal_attributes($attributes) . '>' . $t('!title !required', array('!title' => $title, '!required' => $required)) . "</label>\n";
  }

  /**
   * Add parent name as cass for textfield,
   * and add the label as data-label attribute for IE placeholder fallback. 
   */
  function THEMENAME_textfield($variables) {
    // Check if textfield has parents.
    if (!empty($variables['element']['#parents'])) {
      // Add class attribute if it does not exist.
      if (!isset($variables['element']['#attributes']['class'])) {
        $variables['element']['#attributes']['class'] = array();
      }
      // Add parent name as textfield class. 
      $variables['element']['#attributes']['class'][] = 'feild-' . $variables['element']['#parents'][0] . '-textfield';
    }

    // Add label to data-label attribute for input.
    $variables['element']['#attributes']['data-label'] = $variables['element']['#title'];

    // Send updated $variables to theme function.
    return theme_textfield($variables);
  }

  /**
   * Add image style class name to rendered image.
   */
  function THEMENAME_image_style($variables) {
    // Determine the dimensions of the styled image.
    $dimensions = array(
      'width' => $variables['width'], 
      'height' => $variables['height'],
    );
  
    image_style_transform_dimensions($variables['style_name'], $dimensions);
  
    $variables['width'] = $dimensions['width'];
    $variables['height'] = $dimensions['height'];
    $styleclass = 'style-' . $variables['style_name'];
    
    $variables['attributes'] = array(
      'class' => $styleclass,
    );
  
    // Determine the url for the styled image.
    $variables['path'] = image_style_url($variables['style_name'], $variables['path']);
    return theme('image', $variables);
  }
