'use strict';

$( function() {

  var suppliers;

  $.get( "../app/complete_supplier_input.php", function( data ) {

    suppliers = JSON.parse(data);

    $( "#company-autocomplete" ).autocomplete({
      source: suppliers
    });

  });

});
