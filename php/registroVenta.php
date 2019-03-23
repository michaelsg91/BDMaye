<?php
//--- RECIBIENDO DATOS DE FORMULARIO VENTAS --------------
$cedcli=$_POST["cedcli"];
$producto=$_POST['producto'];
$cantidad=$_POST['cantidad'];
$total=$_POST["total"];
$fecha=date("Y-m-d");

try{
require_once("conexion.php");
$base=conectar::conexion();

//--- BUSCANDO IDCLIENTE CON CEDULA ----------------------------
$sqlCliente="SELECT idCliente from cliente where cedula=$cedcli";
$resultadoCliente=$base->prepare($sqlCliente);
$resultadoCliente->execute(array());

while($registro=$resultadoCliente->fetch(PDO::FETCH_ASSOC)){
      $idCliente=$registro['idCliente'];
}

//--- INGRESANDO REGISTROS EN LA TABLA VENTAS --------------------------------
$sql="INSERT INTO ventas (idProducto,cantidad,fechaVenta,idCliente,valorVenta) VALUES (:id_producto,:cantidad,:fecha_venta,:id_cliente,:valor_venta)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":id_producto"=>$producto, ":cantidad"=>$cantidad,":fecha_venta"=>$fecha,":id_cliente"=>$idCliente,":valor_venta"=>$total));


//--- BUSCANDO CANTIDADVENDIDA ----------------------------
$sqlCantidad="SELECT cantidadVendida from producto where idProducto=$producto";
$resultadoCantidad=$base->prepare($sqlCantidad);
$resultadoCantidad->execute(array());

while($registro=$resultadoCliente->fetch(PDO::FETCH_ASSOC)){
      $cantidadVendida=$registro['idCliente'];
}

$cantidadVendidaNueva=$cantidad+$cantidadVendida;

//--- ACTUALIZANDO VALOR DE CANTIDADVENDIDA ---------------------------------
$sqlActualizaCantidad="UPDATE producto SET cantidadVendida=:cantidad_vendida WHERE idProducto=:id_producto";
$resultado=$base->prepare($sqlActualizaCantidad);
$resultado->execute(array(":cantidad_vendida"=>$cantidadVendidaNueva, ":id_producto"=>$producto));


header("location:../index.php?ex");

}catch(Exception $e){
  header("location:../index.php?error");

}









 ?>
