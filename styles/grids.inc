<?php


/**
 * @file
 * Definition of the 'grids' panel style.
 */

// Plugin definition
$plugin = array(
  'title' => t('Grids'),
  'description' => t('Choose a grid for region'),
  'render region' => 'panels_grids_style_render_region',
  'settings form' => 'panels_grids_style_settings_form',
  'settings validate' => 'panels_grids_style_settings_validate',
);

/**
 * Render callback.
 *
 * @ingroup themeable
 */
function theme_panels_grids_style_render_region($vars) {
  //$display = $vars['display'];
  //$region_id = $vars['region_id'];
  $panes = $vars['panes'];
  $settings = $vars['settings'];
  $additional_classes = '';

  $items = array();

  foreach ($panes as $pane_id => $item) {
    $items[] = $item;
  }
  
  if (empty($settings['grid_qty'])) {
    $settings['grid_qty'] = '16';
  }

  if (isset($settings['grid_push']) && $settings['grid_push'] != '0') {
    $additional_classes .= ' prefix_' . $settings['grid_push'];
  }

  if (isset($settings['alpha']) && $settings['alpha'] != 0) {
    $additional_classes .= ' alpha';
  }

  if (isset($settings['omega']) && $settings['omega'] != 0) {
    $additional_classes .= ' omega';
  }


  $rendered_items = implode($items);
  $grid_class = 'grid_' . $settings['grid_qty'] . $additional_classes;

  if ($rendered_items) {
    return '<div class="' . $grid_class . '">' . $rendered_items . '</div>';  
  } else {
    return $rendered_items;  
  }
  
}

/**
 * Settings form callback.
 */
function panels_grids_style_settings_form($style_settings) {
  $form['grid_qty'] = array(
    '#type' => 'select',
    '#title' => t('Grid Size'),
    '#options' => array(
      '1' => t('1 Column'),
      '2' => t('2 Columns'),
      '3' => t('3 Columns'),
      '4' => t('4 Columns'),
      '5' => t('5 Columns'),
      '6' => t('6 Columns'),
      '7' => t('7 Columns'),
      '8' => t('8 Columns'),
      '9' => t('9 Columns'),
      '10' => t('10 Columns'),
      '11' => t('11 Columns'),
      '12' => t('12 Columns'),
      '13' => t('13 Columns'),
      '14' => t('14 Columns'),
      '15' => t('15 Columns'),
      '16' => t('16 Columns')
    ),
    '#default_value' => (isset($style_settings['grid_qty'])) ? $style_settings['grid_qty'] : '16',
  );

  $form['alpha'] = array(
  '#type' =>'checkbox',
  '#title' => t('First row (alpha)'),
  '#default_value' => (isset($style_settings['alpha'])) ? $style_settings['alpha'] : 0,
  );

  $form['omega'] = array(
  '#type' =>'checkbox',
  '#title' => t('Last row (omega)'),
  '#default_value' => (isset($style_settings['omega'])) ? $style_settings['omega'] : 0,
  );

  $form['grid_push'] = array(
    '#type' => 'select',
    '#title' => t('Grid Push'),
    '#options' => array(
      '0' => t('No Push'),
      '1' => t('1 Column'),
      '2' => t('2 Columns'),
      '3' => t('3 Columns'),
      '4' => t('4 Columns'),
      '5' => t('5 Columns'),
      '6' => t('6 Columns'),
      '7' => t('7 Columns'),
      '8' => t('8 Columns'),
      '9' => t('9 Columns'),
      '10' => t('10 Columns'),
      '11' => t('11 Columns'),
      '12' => t('12 Columns'),
      '13' => t('13 Columns'),
      '14' => t('14 Columns'),
      '15' => t('15 Columns')
    ),
    '#default_value' => (isset($style_settings['grid_push'])) ? $style_settings['grid_push'] : '0',
  );

  return $form;
}

