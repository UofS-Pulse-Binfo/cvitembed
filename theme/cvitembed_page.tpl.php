<?php
/**
 * @file
 * Master template file of cvitembed module.
 */

 // Current/active plot title.
 $active_plot = $form['active_plot']['#value'];
?>


<div id="div-chart-container" class="cvitjs" width="1000" class="clearfix">

  <?php
    // Render plot description.
    print drupal_render($form['description']);
  ?>

  <?php
    // Render CViT canvas.
    print drupal_render($form['cvit_canvas']);
  ?>

  <?php
    // Configuration file has legend information.
    $legend = $form['arr_plots_legend']['#value'];
    if(count($legend)) :
  ?>
  <div id="legend">
    <span class="legend-title">Legend:</span>
    <ul id="list-legend">

    <?php
      // Construct legend markup.
      foreach($legend as $l) {
        print '<li title="' . $l['value'] . '"><div style="background-color: ' . $l['colour'] . ';">&nbsp;</div>&nbsp;&nbsp;' . $l['value'] . '</li>';
      }
    ?>
    </ul>
  </div>
  <?php endif; ?>

</div>

<?php
  // Render other form elements.
  print drupal_render_children($form);
?>
