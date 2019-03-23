<?php
//--- RECIBIENDO DATOS DE FORMULARIO VENTAS --------------
$cedula=$_POST["cedula"];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$direccion=$_POST["direccion"];
$municipio=$_POST["municipio"];

$fecha=date("Y-m-d");

try{
require_once("conexion.php");
$base=conectar::conexion();

//--- INGRESANDO REGISTROS EN LA TABLA VENTAS --------------------------------
$sql="INSERT INTO cliente (nombreCliente,telefono,cedula,direccion,municipio) VALUES (:nombre_cliente,:telefono,:cedula,:direccion,:municipio)";
$resultado=$base->prepare($sql);
$resultado->execute(array(":nombre_cliente"=>$nombre, ":telefono"=>$telefono,":cedula"=>$cedula,":direccion"=>$direccion,"municipio"=>$municipio));

header("location:../index.php?ex");

}catch(Exception $e){
  header("location:../index.php?error");

}









 ?>
