'use strict';

$( function() {

  var immats;

  $.get( "../app/complete_plane_input.php", function( data ) {

    immats = JSON.parse(data);

    $('#plane_div input:text').autocomplete({
      source: immats
    });

  });

});
