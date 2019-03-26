<?php
try{
  require_once("conexion.php");
  $base=conectar::conexion();

//---   CONSULTA SQL PRODUCTO --------------------------------
$consultaProducto="SELECT ventas.idProducto,nombreProducto from ventas,producto where ventas.idProducto=producto.idProducto group by ventas.idProducto order by nombreProducto asc";
$resultadoProducto=$base->prepare($consultaProducto);
$resultadoProducto->execute(array());


//---   CONSULTA SQL TIPO PRODUCTO --------------------------------
$consultaTipoProducto="SELECT producto.idTipoProducto,nombreTipoProducto from ventas,tipoProducto,producto where ventas.idProducto=producto.idProducto and producto.idTipoProducto=tipoProducto.idTipoProducto group by producto.idTipoProducto  order by nombreTipoProducto asc";
$resultadoTipoProducto=$base->prepare($consultaTipoProducto);
$resultadoTipoProducto->execute(array());



//---   CONSULTA SQL PROVEEDOR  --------------------------------
$consultaProveedor="SELECT producto.idProveedor,nombreProveedor from ventas,producto,proveedor where ventas.idProducto=producto.idProducto and producto.idProveedor=proveedor.idProveedor group by producto.idProveedor order by nombreProveedor asc";
$resultadoProveedor=$base->prepare($consultaProveedor);
$resultadoProveedor->execute(array());

//--- CONSULTA SQL CLIENTE -------------------------------------
$consultaCliente="SELECT ventas.idCliente,nombreCliente from ventas,cliente where ventas.idCliente=cliente.idCliente group by ventas.idCliente order by nombreCliente asc";
$resultadoCliente=$base->prepare($consultaCliente);
$resultadoCliente->execute(array());


}catch(Exception $e){
  echo "Linea del error: " . $e->getLine();
}


 ?>
