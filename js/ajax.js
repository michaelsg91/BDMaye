$(document).ready(function(){


//--- FUNCION PARA ENCONTRAR CLIENTE -------------------------------
$("#form_ventas #cedcli").keyup(function(){
    var numdoc=$("#form_ventas #cedcli").val();
    $.get("php/ajax.php",{num:numdoc}).done(function(data){
    $("#form_ventas #nombre").html(data);
    });
});

//--- FUNCION PARA ENVIAR TIPO PRODUCTO A PRODUCTO ------------------
$("#form_ventas #tipo_producto").change(function(){
  var tipopro=$("#form_ventas #tipo_producto").val();
  $.get("php/ajax.php",{tpr:tipopro}).done(function(data){
    $("#form_ventas #producto").html(data);
  });
  $("#form_ventas #total").val("");
  $("#form_ventas #valor").val("");
  $("#form_ventas #cantidad").val(null);


});

//--- FUNCION PARA ENVIAR PRECIO Y CANTIDAD DE PRODUCTO -----------------------
$("#form_ventas #producto").change(function(){
  var producto=$("#form_ventas #producto").val();
  $.get("php/ajax.php",{propre:producto}).done(function(data){
    $("#form_ventas #valor").val(data);
    $("#form_ventas #total").val(data);
  });

});


//--- FUNCIONES PARA MULTIPLICAR PRECIO*CANTIDAD ---------------------
$("#form_ventas #cantidad").keyup(function(){
  var cantidad=$("#form_ventas #cantidad").val();
  var valorUnidad=$("#form_ventas #valor").val();
  var total=cantidad*valorUnidad;
  $("#form_ventas #total").val(total);
});

$("#form_ventas #valor").keyup(function(){
  var cantidad=$("#form_ventas #cantidad").val();
  var valorUnidad=$("#form_ventas #valor").val();
  var total=cantidad*valorUnidad;
  $("#form_ventas #total").val(total);
});


//--- FUNCIONES PARA BUSCAR PRODUCTO ------------------------------
$("#form_actualizar #buscar").click(function(){
  var id=$("#form_actualizar #id").val();
  $.get("php/ajax.php",{idproveedor:id}).done(function(data){
    $("#form_actualizar #proveedor").val(data);
  });
  $.get("php/ajax.php",{idtipoprodcuto:id}).done(function(data){
    $("#form_actualizar #tipo_producto").val(data);
  });
  $.get("php/ajax.php",{idproducto:id}).done(function(data){
    $("#form_actualizar #producto").val(data);
  });
  $.get("php/ajax.php",{idvalor:id}).done(function(data){
    $("#form_actualizar #valor_venta").val(data);
  });

});


//--- FUNCIONES PARA BUSCAR CLIENTE ------------------------------
$("#form_actualizar_cliente #buscar").click(function(){
  var id=$("#form_actualizar_cliente #id").val();
  $.get("php/ajax.php",{cedula:id}).done(function(data){
    $("#form_actualizar_cliente #cedula").val(data);
  });
  $.get("php/ajax.php",{nombre_cliente:id}).done(function(data){
    $("#form_actualizar_cliente #nombre").val(data);
  });
  $.get("php/ajax.php",{telefono:id}).done(function(data){
    $("#form_actualizar_cliente #telefono").val(data);
  });
  $.get("php/ajax.php",{direccion:id}).done(function(data){
    $("#form_actualizar_cliente #direccion").val(data);
  });
  $.get("php/ajax.php",{municipio:id}).done(function(data){
    $("#form_actualizar_cliente #municipio").val(data);
  });

});








});//--End document
