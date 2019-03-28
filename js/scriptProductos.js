$(document).ready(function(){

//--- FUNCIONES PARA CONSULTA UNICA ---------------------
$("#form_consultas_productos #producto").change(function(){

  $("#form_consultas_productos #tipo_producto").val(0);
  $("#form_consultas_productos #proveedor").val(0);

});

$("#form_consultas_productos #tipo_producto").change(function(){
  $("#form_consultas_productos #producto").val(0);
  $("#form_consultas_productos #proveedor").val(0);

});

$("#form_consultas_productos #proveedor").change(function(){
  $("#form_consultas_productos #tipo_producto").val(0);
  $("#form_consultas_productos #producto").val(0);

});

});//--End document
