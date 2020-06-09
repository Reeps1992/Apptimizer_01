'use strict';

$( function() {

  var customers;

  $.get( "../app/complete_customer_input.php", function( data ) {
    customers = JSON.parse(data);

    $( "#customers" ).autocomplete({
      source: customers
    });

  });

});
