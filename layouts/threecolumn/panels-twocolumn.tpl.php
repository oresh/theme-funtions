<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a very simple "three column" panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   $content['one']: First column
 *   $content['two']: Second column
 *   $content['three']: Third column
 */
?>
<div class="panel-three-column clearfix container_16" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="grid_16">
    <?php if (isset($content['one']) && $content['one']): ?>
    <div class="panel-panel panel-col panel-col-one">
      <?php print $content['one']; ?>
    </div>
  	<?php endif; ?>
  	<?php if (isset($content['two']) && $content['two']): ?>
     <div class="panel-panel panel-col panel-col-two">
      <?php print $content['two']; ?>
    </div>
    <?php endif; ?>
    <?php if (isset($content['three']) && $content['three']): ?>
     <div class="panel-panel panel-col panel-col-three">
      <?php print $content['three']; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
