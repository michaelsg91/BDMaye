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
