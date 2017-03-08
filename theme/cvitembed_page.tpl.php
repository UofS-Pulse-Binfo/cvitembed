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
  <div class="chart-col-left">
     <?php
       // Render CViT canvas.
       print drupal_render($form['cvit_canvas']);
       // Adds a border to chart to match KP theme.
     ?>
  </div>

  <div class="chart-col-right">
    <ul id="list-legend">
      <?php
        $legend = $form['arr_plots_legend']['#value'];
        if(count($legend)) {
          // Configuration file has legend information.
          print '<li>Legend</li>' . "\n";

          // Construct legend markup.
          foreach($legend as $l) {
            // Due to limited horizontal space for long text, lengthy legend text will be trimmed.
            // Full text is available on title of the field and can be accessed by hovering over the element.
            $tmp_title = (strlen($l['value']) > 10)
              ? substr($l['value'], 0, 8) . '...'
              : $l['value'];

            print '<li title="' . $l['value'] . '"><div style="background-color: ' . $l['colour'] . ';">&nbsp;</div>&nbsp;&nbsp;' . $tmp_title . '</li>';
          }
        }
        else {
          // No legend in configuration file.
          // The options below becomes CViT options.
          print '<li>CViTjs Quick Links</li>' . "\n";
        }
      ?>

      <li>
        <ul>
          <!-- Export view will export current chart to png file. -->
          <li><a id="link-export" href="#">Export view</a></li>
          <!-- CViT help will launch cvitjs help topics. -->
          <li><a id="link-help" href="#">CViT help</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <div class="chart-col-clear">&nbsp;</div>
</div>

<?php
  // Render other form elements.
  print drupal_render_children($form);
?>
