/**
 * @file
 * Manage behavior in project management admin control panel
 */
(function($) {
  Drupal.behaviors.cvitembed = {
    attach: function (context, settings) {
      // Add event listener to available plots links.
      $('#link-available-plots').click(function(e) {
        // Stop default behaviour of a.
        e.preventDefault();

        // Check the link caption
        var lnk = $(this);
        var delay = 80;
        var l;

        if (lnk.text() == 'Available plots') {
          $('#div-available-plots').slideDown(delay);
          l = 'Close available plots';
        }
        else {
          $('#div-available-plots').slideUp(delay);
          l = 'Available plots';
        }

        $(this).text(l);
      });

      // Add event listener to Export view link.
      $('#link-export').click(function(e){
        e.preventDefault();
        $('#btn-export').click();
      });

      // Add event listener to CViT help link.
      $('#link-help').click(function(e){
        e.preventDefault();
        $('#btn-help').click();
      });
    }
  };
}(jQuery));
