<?php
//--- RECIBIENDO DATOS DE FORMULARIO PRODUCTO --------------
$nombre_producto=$_POST["nombre_producto"];
$valor_venta=$_POST["valor_venta"];
$tipo_producto=$_POST['tipo_producto'];
$proveedor=$_POST['proveedor'];

try{
require_once("conexion.php");
$base=conectar::conexion();

//--- INGRESANDO REGISTROS EN LA TABLA PRODUCTO ----------------------------
$sql="INSERT INTO producto (nombreProducto,valorVenta,idProveedor,idTipoProducto) VALUES (:nombre_producto,:valor_venta,:proveedor,:tipo_producto)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":nombre_producto"=>$nombre_producto, ":valor_venta"=>$valor_venta,":proveedor"=>$proveedor,":tipo_producto"=>$tipo_producto));

header("location:../index.php?ex");



}catch(Exception $e){
  header("location:../index.php?error");

}









 ?>
