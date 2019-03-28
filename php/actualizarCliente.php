<?php
//--- RECIBIENDO DATOS DE FORMULARIO ACTUALIZAR --------------
$id=$_POST["id"];
$nombre_cliente=$_POST["nombre"];
$cedula=$_POST["cedula"];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$municipio=$_POST['municipio'];

try{
require_once("conexion.php");
$base=conectar::conexion();

//--- ACTUALIZANDO REGISTROS EN LA TABLA CLIENTE ----------------------------
$sql="UPDATE cliente SET nombreCliente=:nombre_cliente,cedula=:cedula,telefono=:telefono,direccion=:direccion,municipio=:municipio WHERE idCliente=:id_cliente";
$resultado=$base->prepare($sql);
$resultado->execute(array(":nombre_cliente"=>$nombre_cliente,":cedula"=>$cedula,":direccion"=>$direccion,":telefono"=>$telefono,":municipio"=>$municipio,":id_cliente"=>$id));

header("location:../index.php?exact");



}catch(Exception $e){
  header("location:../index.php?erroract");

}









 ?>
