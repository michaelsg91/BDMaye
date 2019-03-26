$(document).ready(function(){

//--- FUNCIONES PARA CONSULTA UNICA ---------------------
$("#form_consultas #producto").change(function(){

  $("#form_consultas #tipo_producto").val(0);
  $("#form_consultas #proveedor").val(0);
  $("#form_consultas #cliente").val(0);

});

$("#form_consultas #tipo_producto").change(function(){
  $("#form_consultas #producto").val(0);
  $("#form_consultas #proveedor").val(0);
  $("#form_consultas #cliente").val(0);

});

$("#form_consultas #proveedor").change(function(){
  $("#form_consultas #tipo_producto").val(0);
  $("#form_consultas #producto").val(0);
  $("#form_consultas #cliente").val(0);

});

$("#form_consultas #cliente").change(function(){
  $("#form_consultas #tipo_producto").val(0);
  $("#form_consultas #proveedor").val(0);
  $("#form_consultas #producto").val(0);

});


});//--End document
