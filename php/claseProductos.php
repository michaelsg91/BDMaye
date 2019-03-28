<?php
class Productos{
  private $db;
  private $productos;

  public function __construct(){
    require_once("conexion.php");
    $this->db=conectar::conexion();
    $this->productos=array();
  }

  public function get_personas(){


    $consulta=$this->db->query("SELECT idProducto,nombreProducto,valorVenta,nombreProveedor,nombreTipoProducto,cantidadVendida FROM producto,proveedor,tipoProducto WHERE producto.idProveedor=proveedor.idProveedor AND producto.idTipoProducto=tipoProducto.idTipoProducto");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->productos[]=$fila;
    }
    return $this->productos;

  }

}

$producto=new Productos();

$matriz_productos=$producto->get_personas();



 ?>
