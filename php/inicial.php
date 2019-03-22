<?php
try{
require_once("conexion.php");
$base=conectar::conexion();


//--- VERIFICA SI SE HA CERRADO CESION ----------------------------
$sqlusu="SELECT usuario from usuarios where online=1";
$resultado5=$base->prepare($sqlusu);
$resultado5->execute(array());

while($registro=$resultado5->fetch(PDO::FETCH_ASSOC)){
      $usuario= $registro['usuario'];
}

if($usuario==null){
  header("location:login.php");
}
//------------------------------------------------------------------


//--- CONSULTA SQL PROVEEDOR --------------------------------------

$sqlProveedor="SELECT idProveedor,nombreProveedor from proveedor";


  }catch(Exception $e){
    echo "Linea del error: " . $e->getLine();
  }



 ?>
