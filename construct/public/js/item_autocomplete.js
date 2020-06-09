'use strict';

$( function() {

  var pn;

  $.get( "../app/complete_item_input.php", function( data ) {

    pn = JSON.parse(data);

    $('#item_div input:text').autocomplete({
      source: pn
    });

  });

});
