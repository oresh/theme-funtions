<?php
/**
 * @file
 * Template for a 1 column panel layout.
 *
 * This template provides a very simple "one column" panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   $content['middle']: The only panel in the layout.
 */
?>
<div class="panel-one-column clearfix container_16 " <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <?php if (isset($content['one']) && $content['one']): ?>
  <div class="panel-panel panel-col">
    <?php print $content['one']; ?>
  </div>
  <?php endif; ?>
</div>
