<?php
/**
 * @file
 * Master template file of cvitembed module.
 */

 // Template structure:
 // <div></div>     - Active plot and plot selector.
 //
 // <div>
 //   <div></div>   - Left column - CVIT plot.
 //   <div></div>   - Right column - Legend and options.
 //   <div></div>
 // </div>

 // Current/active plot title.
 $active_plot = $form['active_plot']['#value'];
?>
<div id="select-plots">
  <span class="title active-plot"><?php print $active_plot; ?></span>
  <span class="show-plots-link"><a href="#" id="link-available-plots">Available plots</a></span>

  <div id="div-available-plots">
    <ul>
      <?php
        // Construct list of available plots.
        $plots = $form['arr_plots_available']['#value'];
        foreach($plots as $k => $p) {
          if ($p['title'] != $active_plot) {
            // Exclude from the list the active/current plot.
            $loc = '?data=' . $k;

            print '<li>' . "\n";
            print   '<a href="' . $loc . '">' . $p['title'] . '</a>' . "\n";
            print   '<a href="' . $loc . '" class="btn btn-success" style="float:right; margin-right:10px;" alt="Show ' . $p['title'] . '" title="Show ' . $p['title'] . '">Show</a>' . "\n";
            print "</li>\n";
          }
        }
      ?>
    </ul>
  </div>
</div>

<div id="div-chart-container">

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
