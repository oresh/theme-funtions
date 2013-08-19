<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('One Column'),
  'category' => t('Columns'),
  'icon' => 'onecolumn.png',
  'theme' => 'panels_onecolumn',
  'css' => 'onecolumn.css',
  'regions' => array(
  	'one' => t('Column One')
  ),
);