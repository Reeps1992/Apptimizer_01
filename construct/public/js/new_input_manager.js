'use strict';

// PAGE NON PRESENTE DANS CE PROJET

// ************* vars ********************************************************//

var delete_btn = $('.btn-danger');

var new_pdf_input_file = "<input type='file' class='form-control-file my-1' name='pdf'>";
var last_pdf_input = $('#pdf_div input:file').last();
var pdf_div = $('#pdf_div');

var new_crs_input_file = "<input type='file' class='form-control-file my-1' name='crs'>";
var last_crs_input = $('#crs_div input:file').last();
var crs_div = $('#crs_div');

var new_easa_input_file = "<input type='file' class='form-control-file my-1' name='easa'>";
var last_easa_input = $('#easa_div input:file').last();
var easa_div = $('#easa_div');

var new_img_input_file = "<input type='file' class='form-control-file my-1' name='img'>";
var last_img_input = $('#img_div input:file').last();
var img_div = $('#img_div');

//*************** functions **************************************************//

$(function () {
  $('[data-toggle="popover"]').popover()
})

$(document).on('mousemove', function(){

  if ($('#pdf_div input:file').length) {
    if (last_pdf_input[0].value) {
      var pdf_count = $('#pdf_count').val();
      pdf_count ++;
      new_pdf_input_file = "<input type='file' name='pdf"+pdf_count+"'>";
      pdf_div.append(new_pdf_input_file);
      last_pdf_input = $('#pdf_div input:file').last();
      var new_pdf_count = $('#pdf_count').val(pdf_count);
      console.log(pdf_count);
    }
  }

  if ($('#crs_div input:file').length) {
    if (last_crs_input[0].value) {
      var crs_count = $('#crs_count').val();
      crs_count ++;
      new_crs_input_file = "<input type='file' name='crs"+crs_count+"'>";
      crs_div.append(new_crs_input_file);
      last_crs_input = $('#crs_div input:file').last();
      var new_crs_count = $('#crs_count').val(crs_count);
      console.log(crs_count);
    }
  }


  if ($('#easa_div input:file').length) {
    if (last_easa_input[0].value) {
      var easa_count = $('#easa_count').val();
      easa_count ++;
      new_easa_input_file = "<input type='file' name='easa"+easa_count+"'>";
      easa_div.append(new_easa_input_file);
      last_easa_input = $('#easa_div input:file').last();
      var new_easa_count = $('#easa_count').val(easa_count);
      console.log(easa_count);
    }
  }

  if ($('#img_div input:file').length) {
    if (last_img_input[0].value) {
      var img_count = $('#img_count').val();
      img_count ++;
      new_img_input_file = "<input type='file' name='img"+img_count+"'>";
      img_div.append(new_img_input_file);
      last_img_input = $('#img_div input:file').last();
      var new_img_count = $('#img_count').val(img_count);
      console.log(img_count);
    }
  }
});
