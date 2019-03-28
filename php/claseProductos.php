<?php
class Productos{
  private $db;
  private $productos;

  public function __construct(){
    require_once("conexion.php");
    $this->db=conectar::conexion();
    $this->productos=array();
  }

  public function get_productos(){

    $consulta=$this->db->query("SELECT idProducto,nombreProducto,valorVenta,nombreProveedor,nombreTipoProducto,cantidadVendida
      FROM producto,proveedor,tipoProducto WHERE producto.idProveedor=proveedor.idProveedor
      AND producto.idTipoProducto=tipoProducto.idTipoProducto");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->productos[]=$fila;
    }
    return $this->productos;

  }

  public function get_solo_nombre($nombreProducto){

    $consulta=$this->db->query("SELECT idProducto,nombreProducto,valorVenta,nombreProveedor,nombreTipoProducto,cantidadVendida
      FROM producto,proveedor,tipoProducto WHERE producto.idProveedor=proveedor.idProveedor AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND nombreProducto='" . $nombreProducto . "'");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->productos[]=$fila;
    }
    return $this->productos;

  }

  public function get_solo_proveedor($idProveedor){

    $consulta=$this->db->query("SELECT idProducto,nombreProducto,valorVenta,nombreProveedor,nombreTipoProducto,cantidadVendida
      FROM producto,proveedor,tipoProducto WHERE producto.idProveedor=proveedor.idProveedor AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND producto.idProveedor=$idProveedor");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->productos[]=$fila;
    }
    return $this->productos;

  }

  public function get_solo_tipo_producto($idTipoProducto){


    $consulta=$this->db->query("SELECT idProducto,nombreProducto,valorVenta,nombreProveedor,nombreTipoProducto,cantidadVendida
      FROM producto,proveedor,tipoProducto WHERE producto.idProveedor=proveedor.idProveedor AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND producto.idTipoProducto=$idTipoProducto");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->productos[]=$fila;
    }
    return $this->productos;

  }

}




 ?>
