$(document).ready(function(){


//-------- Ocultar Articulos ------------------------
$(".art_ventas").fadeIn(1000);
$(".art_productos").hide();
$(".art_clientes").hide();
$(".art_actualizar").hide();


$("#li_ventas").click(function(e){
$(".art_ventas").fadeIn(1000);
$(".art_productos").hide();
$(".art_clientes").hide();
$(".art_actualizar").hide();
});

$("#li_productos").click(function(e){
  $(".art_ventas").hide();
  $(".art_productos").fadeIn(1000);
  $(".art_clientes").hide();
  $(".art_actualizar").hide();
});


$("#li_clientes").click(function(e){
  $(".art_ventas").hide();
  $(".art_productos").hide();
  $(".art_actualizar").hide();
  $(".art_clientes").fadeIn(1000);
});


$("#li_actualizar").click(function(e){
  $(".art_ventas").hide();
  $(".art_productos").hide();
  $(".art_actualizar").fadeIn(1000);
  $(".art_clientes").hide();
});



//------- Start validate function ------------------


//-------- End validate function

});//--End document
