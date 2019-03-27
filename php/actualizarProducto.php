<?php
//--- RECIBIENDO DATOS DE FORMULARIO ACTUALIZAR --------------
$id=$_POST["id"];
$nombre_producto=$_POST["producto"];
$valor_venta=$_POST["valor_venta"];
$tipo_producto=$_POST['tipo_producto'];
$proveedor=$_POST['proveedor'];

try{
require_once("conexion.php");
$base=conectar::conexion();

//--- ACTUALIZANDO REGISTROS EN LA TABLA PRODUCTO ----------------------------
$sql="UPDATE producto SET nombreProducto=:nombre_producto,valorVenta=:valor_venta, idTipoProducto=:tipo_producto,idProveedor=:proveedor WHERE idProducto=:id_producto";
$resultado=$base->prepare($sql);
$resultado->execute(array(":nombre_producto"=>$nombre_producto, ":valor_venta"=>$valor_venta,":proveedor"=>$proveedor,":tipo_producto"=>$tipo_producto,":id_producto"=>$id));

header("location:../index.php?exact");



}catch(Exception $e){
  header("location:../index.php?erroract");

}









 ?>
