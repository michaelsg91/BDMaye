<?php
try{

require_once("conexion.php");
$base=conectar::conexion();

//--- RECIBIENDO CEDULA DEL CLIENTE   (VENTAS) ------------------------
if(isset($_GET['num'])){

$numdoc=$_GET['num'];

try{
$sql="SELECT * FROM cliente WHERE cedula=$numdoc";
$resultado=$base->prepare($sql);
$resultado->execute(array());

while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
  echo $registro['nombreCliente'];
}
}catch(Exception $e){
  echo "Formato no valido";
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

//--- SECCION ACTUALIZAR PRODUCTO   --------------------------------------------------------------------

//--- RECIBIENDO ID PARA IDPROVEEDOR (ACTUALIZAR) --------------------------
if(isset($_GET["idproveedor"])){
  $producto=$_GET["idproveedor"];
  $sql="SELECT idProveedor FROM producto WHERE idProducto=$producto";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["idProveedor"];
  }
}

//--- RECIBIENDO ID PARA IDTIPOPRODUCTO (ACTUALIZAR) --------------------------
if(isset($_GET["idtipoprodcuto"])){
  $producto=$_GET["idtipoprodcuto"];
  $sql="SELECT idTipoProducto FROM producto WHERE idProducto=$producto";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["idTipoProducto"];
  }
}

//--- RECIBIENDO ID PARA NOMBRE PRODUCTO (ACTUALIZAR) --------------------------
if(isset($_GET["idproducto"])){
  $producto=$_GET["idproducto"];
  $sql="SELECT nombreProducto FROM producto WHERE idProducto=$producto";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["nombreProducto"];
  }
}

//--- RECIBIENDO ID PARA VALOR VENTA (ACTUALIZAR) --------------------------
if(isset($_GET["idvalor"])){
  $producto=$_GET["idvalor"];
  $sql="SELECT valorVenta FROM producto WHERE idProducto=$producto";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["valorVenta"];
  }
}
//--- FIN SECCION ACTUALIZAR PRODUCTO -------------------------------------------


//--- SECCION ACTUALIZAR CLIENTE   --------------------------------------------------------------------

//--- RECIBIENDO ID PARA CEDULA --------------------------
if(isset($_GET["cedula"])){
  $cliente=$_GET["cedula"];
  $sql="SELECT cedula FROM cliente WHERE idCliente=$cliente";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["cedula"];
  }
}

//--- RECIBIENDO ID PARA NOMBRE CLIENTE--------------------------
if(isset($_GET["nombre_cliente"])){
  $cliente=$_GET["nombre_cliente"];
  $sql="SELECT nombreCliente FROM cliente WHERE idCliente=$cliente";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["nombreCliente"];
  }
}

//--- RECIBIENDO ID PARA TELEFONO --------------------------
if(isset($_GET["telefono"])){
  $cliente=$_GET["telefono"];
  $sql="SELECT telefono FROM cliente WHERE idCliente=$cliente";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["telefono"];
  }
}

//--- RECIBIENDO ID PARA DIRECCION --------------------------
if(isset($_GET["direccion"])){
  $cliente=$_GET["direccion"];
  $sql="SELECT direccion FROM cliente WHERE idCliente=$cliente";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["direccion"];
  }
}

//--- RECIBIENDO ID PARA MUNICIPIO --------------------------
if(isset($_GET["municipio"])){
  $cliente=$_GET["municipio"];
  $sql="SELECT municipio FROM cliente WHERE idCliente=$cliente";

  $resultado=$base->prepare($sql);
  $resultado->execute(array());

  while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
    echo $registro["municipio"];
  }
}
//--- FIN SECCION ACTUALIZAR CLIENTE -------------------------------------------



}catch(Exception $e){
  die('Error'. $e->getMessage());
  echo "Linea del error ". $e->getLine();

}

?>
