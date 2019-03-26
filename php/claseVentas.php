<?php


class ventas{
  private $db;
  private $personas;

  public function __construct(){
    require_once("conexion.php");
    $this->db=conectar::conexion();
    $this->personas=array();
  }

  public function get_ventas(){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->personas[]=$fila;
    }
    return $this->personas;

  }


  public function get_soloProducto($producto,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND ventas.idProducto=$producto AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "'" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
     $this->personas[]=$fila;
    }
    return $this->personas;

  }


  public function get_soloTipoProducto($tipoProducto,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND producto.idTipoProducto=$tipoProducto AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "'" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->personas[]=$fila;
    }
    return $this->personas;

  }


  public function get_soloProveedor($proveedor,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND producto.idProveedor=$proveedor AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "'" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->personas[]=$fila;
    }
    return $this->personas;

  }


  public function get_soloCliente($cliente,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND ventas.idCliente=$cliente AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "'" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
    $this->personas[]=$fila;
    }
    return $this->personas;

  }

}


 ?>
