$(document).ready(function(){

//---------   Procesos ajax    -------------------------------------

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
  $("#form_ventas #cantidad").empty();


});

//--- FUNCION PARA ENVIAR PRECIO Y CANTIDAD DE PRODUCTO -----------------------
$("#form_ventas #producto").change(function(){
  var producto=$("#form_ventas #producto").val();
  $.get("php/ajax.php",{propre:producto}).done(function(data){
    $("#form_ventas #valor").val(data);
    $("#form_ventas #total").val(data);

  });
});

$("#form_ventas #producto").change(function(){
  var producto=$("#form_ventas #producto").val();
  $.get("php/ajax.php",{procan:producto}).done(function(data){
    $("#form_ventas #cantidad").html(data);
  });
});


//--- FUNCIONES PARA MULTIPLICAR PRECIO*CANTIDAD ---------------------
$("#form_ventas #cantidad").change(function(){
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








});//--End document
