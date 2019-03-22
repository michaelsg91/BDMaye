$(document).ready(function(){

//---------   Procesos ajax    -------------------------------------


//-------- Ocultar Articulos ------------------------
$(".art_ventas").fadeIn(1000);
$(".art_productos").hide();
$(".art_clientes").hide();
$(".art_consultas").hide();


$("#li_ventas").click(function(e){
$(".art_ventas").fadeIn(1000);
$(".art_productos").hide();
$(".art_clientes").hide();
$(".art_consultas").hide();
});

$("#li_productos").click(function(e){
  $(".art_ventas").hide();
  $(".art_productos").fadeIn(1000);
  $(".art_clientes").hide();
  $(".art_consultas").hide();

});


$("#li_clientes").click(function(e){
  $(".art_ventas").hide();
  $(".art_productos").hide();
  $(".art_clientes").fadeIn(1000);
  $(".art_consultas").hide();
});


$("#li_consultas").click(function(e){
  $(".art_ventas").hide();
  $(".art_productos").hide();
  $(".art_clientes").hide();
  $(".art_consultas").fadeIn(1000);

});


  var fechaHoy=new Date();
  var mesHoy=fechaHoy.getMonth()+1;
  var diaHoy=fechaHoy.getDate();
  var anioHoy=fechaHoy.getFullYear();

//------- Start validate function ------------------

jQuery.validator.addMethod("latino", function(value, element) {
  return this.optional(element) || /^[a-z-á,é,í,ó,ú,ñ,\u0020]+$/i.test(value);
}, "Formato no válido");

$(function(){
$("#fechafin").datepicker({
minDate: "+0d",
dateFormat: "dd-mm-yy1",
});

});
$(function(){
$("#empfin").datepicker({
minDate: "+0d",
dateFormat: "dd-mm-yy",
});

});

$.validator.addMethod("fechaESP", function( value, element){
			var validator = this;
			var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
			var fechaCompleta = value.match(datePat);

			if (fechaCompleta == null) {
				$.validator.messages.fechaESP = "Fecha erronea";
				return false;
			}

			dia = fechaCompleta[1];
			mes = fechaCompleta[3];
			anio = fechaCompleta[5];


			if (dia < 1 || dia > 31) {
				$.validator.messages.fechaESP = "El valor del día debe estar comprendido entre 1 y 31.";
				return false;
			}
			if (mes < 1 || mes > 12) {
				$.validator.messages.fechaESP = "El valor del mes debe estar comprendido entre 1 y 12.";
				return false;
			}
			if ((mes==4 || mes==6 || mes==9 || mes==11) && dia==31) {
				$.validator.messages.fechaESP = "El mes "+mes+" no tiene 31 días!";
				return false;
			}
			if (mes == 2) { // bisiesto
				var bisiesto = (anio % 4 == 0 && (anio % 100 != 0 || anio % 400 == 0));
				if (dia > 29 || (dia==29 && !bisiesto)) {
					$.validator.messages.fechaESP = "Febrero del " + anio + " no contiene " + dia + " dias!";
					return false;
				}
			}

      if(anio<anioHoy){
        $.validator.messages.fechaESP = "La fecha es menor a la actual.";
				return false;
      }else if(anio==anioHoy){
        if(mes<mesHoy){
          $.validator.messages.fechaESP = "La fecha es menor a la actual.";
  				return false;
        }else if(mes==mesHoy){
          if(dia<diaHoy){
            $.validator.messages.fechaESP = "La fecha es menor a la actual.";
    				return false;
          }
        }
      }


			return true;
		}, "Formato de fecha no válido");



$("#formven").validate({
  rules:{
    cedcli:{
      number: true,
      minlength: 6,
      maxlength: 11,
      required: true,
    },
    producto: "required",
    valor:{
      required: true,
      number: true,
      maxlength: 18,
    },
  },//end rules

  messages:{
    cedcli:{
      number: "Formato no valido",
      minlength: "Mínimo 6 dígitos",
      maxlength: "Máximo 11 dígitos",
      required: "Campo requerido",
    },
    producto: "Campo requerido",
    valor:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
  }
});



$("#formcre").validate({
  rules:{
    cedcli:{
      number: true,
      minlength: 6,
      maxlength: 11,
      required: true,
    },
    producto: "required",
    valor:{
      required: true,
      number: true,
      maxlength: 18,
    },
    fechafin:{
      required: true,
      fechaESP: true,
    }
  },//end rules

  messages:{
    cedcli:{
      number: "Formato no valido",
      minlength: "Mínimo 6 dígitos",
      maxlength: "Máximo 11 dígitos",
      required: "Campo requerido",
    },
    producto: "Campo requerido",
    valor:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
    fechafin:{
      required: "Campo requerido",
    }
  }
});


$("#formabcre").validate({
  rules:{
    credito: "required",
    valor:{
      required: true,
      number: true,
      maxlength: 18,
    },
  },//end rules

  messages:{
    credito: "Campo requerido",
    valor:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
  }
});

$("#formcli").validate({
  rules:{
    cedula:{
      number: true,
      minlength: 6,
      maxlength: 11,
      required: true,
    },
    nombre:{
      latino: true,
      maxlength: 50,
      required: true,
    },
    apellido:{
      latino: true,
      maxlength: 50,
      required: true,
    },
    ciudad: "required",
    telefono:{
      number: true,
      maxlength: 10,
    },
  },//end rules

  messages:{
    cedula:{
      number: "Formato no valido",
      maxlength: "Máximo 11 dígitos",
      required: "Campo requerido",
    },
    nombre:{
      maxlength: "Máximo 50 dígitos",
      required: "Campo requerido",
    },
    apellido:{
      maxlength: "Máximo 50 dígitos",
      required: "Campo requerido",
    },
    ciudad: "Campo requerido",
    telefono:{
      number: "Formato no valido",
      maxlength: "Máximo 10 dígitos"
    },
  }
});

$("#formart").validate({
  rules:{
    nombre:{
      maxlength: 50,
      required: true,
    },
    tipo: "required",
    peso:{
      number: true,
      maxlength: 18,
    },
  },//end rules

  messages:{
    nombre:{
      maxlength: "Máximo 50 dígitos",
      required: "Campo requerido",
    },
    tipo: "Campo requerido",
    peso:{
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
  }
});

$("#formemp").validate({
  rules:{
    cedcli:{
      number: true,
      minlength: 6,
      maxlength: 11,
      required: true,
    },
    articulo: "required",
    valor:{
      required: true,
      number: true,
      maxlength: 18,
    },
    valorre:{
      required: true,
      number: true,
      maxlength: 18,
    },
    empfin:{
      required: true,
      fechaESP: true,
    }
  },//end rules

  messages:{
    cedcli:{
      number: "Formato no valido",
      minlength: "Mínimo 6 dígitos",
      maxlength: "Máximo 11 dígitos",
      required: "Campo requerido",
    },
    articulo: "Campo requerido",
    valor:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
    valorre:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
    empfin:{
      required: "Campo requerido",
    }
  }
});

$("#formabemp").validate({
  rules:{
    empeno: "required",
    valor:{
      required: true,
      number: true,
      maxlength: 18,
    },
  },//end rules

  messages:{
    empeno: "Campo requerido",
    valor:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
  }
});


$("#forminv").validate({
  rules:{
    articulo: "required",
    valorcompra:{
      required: true,
      number: true,
      maxlength: 18,
    },
    valorvender:{
      required: true,
      number: true,
      maxlength: 18,
    },
  },//end rules

  messages:{
    articulo: "Campo requerido",
    valorcompra:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
    valorvender:{
      required: "Campo requerido",
      number: "Formato no valido",
      maxlength: "Máximo 18 dígitos"
    },
  }
});

//-------- End validate function

});//--End document
