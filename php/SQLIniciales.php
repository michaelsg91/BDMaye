<?php
try{
require_once("conexion.php");
$base=conectar::conexion();


//---   CONSULTA SQL TIPO PRODUCTO --------------------------------
$consultaTipoProducto="SELECT idTipoProducto,nombreTipoProducto from tipoProducto order by nombreTipoProducto asc";
$resultadoTipoProducto=$base->prepare($consultaTipoProducto);
$resultadoTipoProducto->execute(array());



//---   CONSULTA SQL PROVEEDOR --------------------------------
$consultaProveedor="SELECT idProveedor,nombreProveedor from proveedor order by nombreProveedor asc";
$resultadoProveedor=$base->prepare($consultaProveedor);
$resultadoProveedor->execute(array());



  }catch(Exception $e){
    echo "Linea del error: " . $e->getLine();
  }



 ?>
