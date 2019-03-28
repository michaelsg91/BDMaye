<?php
try{
  require_once("conexion.php");
  $base=conectar::conexion();

//---   CONSULTA SQL PRODUCTO --------------------------------
$consultaProducto="SELECT nombreProducto from producto group by nombreProducto order by nombreProducto asc";
$resultadoProducto=$base->prepare($consultaProducto);
$resultadoProducto->execute(array());


//---   CONSULTA SQL TIPO PRODUCTO --------------------------------
$consultaTipoProducto="SELECT producto.idTipoProducto,nombreTipoProducto from tipoProducto,producto
where producto.idTipoProducto=tipoProducto.idTipoProducto group by producto.idTipoProducto
order by nombreTipoProducto asc";
$resultadoTipoProducto=$base->prepare($consultaTipoProducto);
$resultadoTipoProducto->execute(array());



//---   CONSULTA SQL PROVEEDOR  --------------------------------
$consultaProveedor="SELECT producto.idProveedor,nombreProveedor from producto,proveedor
where producto.idProveedor=proveedor.idProveedor group by producto.idProveedor
order by nombreProveedor asc";
$resultadoProveedor=$base->prepare($consultaProveedor);
$resultadoProveedor->execute(array());


}catch(Exception $e){
  echo "Linea del error: " . $e->getLine();
}


 ?>
