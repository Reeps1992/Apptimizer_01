'use strict';

$('#formulaire').submit(function() {
  $('#count_plane').val($('div #plane_div input:text').length);
  $('#count_item').val($('div #item_div input:text').length);
});

$('#plus_plane').on('click', function() {
  if($('#plane_div input:text').last().val().length > 0){
    $('#plane_div').append('<input class="form-control plane_autocomplete" type="text" name="plane'+ $('#plane_div input:text').length +'"></input>');
  }

});

$('#plus_item').on('click', function() {
  if($('#item_div input:text').last().val().length > 0){
    $('#item_div').append('<input class="form-control item_autocomplete" type="text" name="item'+ $('div #item_div input:text').length +'"></input>');
  }

});

///////////////////////////////////////////

$( function() {

  var immats;

  $.get( "../app/complete_plane_input.php", function( data ) {

    immats = JSON.parse(data);

    $('body').on('click', '.plane_autocomplete', function(){
      $('.plane_autocomplete').autocomplete({
        source: immats
      });
    })

  });

});

//////////////////////////////////////////

$( function() {

  var pn;

  $.get( "../app/complete_item_input.php", function( data ) {

    pn = JSON.parse(data);

    $('body').on('click', '.item_autocomplete', function() {
      $('.item_autocomplete').autocomplete({
        source: pn
      });
    })

  });

});
