<?php
try{

require_once("conexion.php");
$base=conectar::conexion();

//--- RECIBIENDO CEDULA DEL CLIENTE   (VENTAS) ------------------------
if(isset($_GET['num'])){

$numdoc=$_GET['num'];

if($numdoc!=null){
$sql="SELECT * FROM cliente WHERE cedula=$numdoc";
$resultado=$base->prepare($sql);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  echo $registro['nombreCliente'];
}
}

}


//--- RECIBIENDO TIPO PRODUCTO PARA PRODUCTO-PROVEEDOR    (VENTAS) -----------------------------

if(isset($_GET['tpr'])){
  echo  "<option value='0'>-- Elige una Opción --</option>";

  $tipoproducto=$_GET['tpr'];
  $sql="SELECT idProducto,nombreProducto,nombreProveedor FROM producto,proveedor WHERE producto.idProveedor=proveedor.idProveedor AND idTipoProducto=$tipoproducto ORDER BY nombreProducto ASC";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());



  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo  "<option value='". $registro['idProducto'] ."'>". $registro['nombreProducto']  ." --- ". $registro['nombreProveedor'] ."</option>";
  }

}

//--- RECIBIENDO PRODUCTO PARA PRECIO   (VENTAS)----------------------------------
if(isset($_GET['propre'])){
  $producto=$_GET['propre'];
  $sql="SELECT valorVenta FROM producto WHERE idProducto=$producto";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["valorVenta"];
  }

}


}catch(Exception $e){
  die('Error'. $e->getMessage());
  echo "Linea del error ". $e->getLine();

}

?>
