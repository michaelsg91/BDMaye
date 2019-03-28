<?php


class ventas{
  private $db;
  private $ventas;

  public function __construct(){
    require_once("conexion.php");
    $this->db=conectar::conexion();
    $this->ventas=array();
  }

  public function get_ventas(){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta
      FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor ORDER BY ventas.idVenta DESC LIMIT 0,20");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->ventas[]=$fila;
    }
    return $this->ventas;

  }


  public function get_soloProducto($producto,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta
      FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND ventas.idProducto=$producto
      AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "' ORDER BY ventas.idVenta DESC" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
     $this->ventas[]=$fila;
    }
    return $this->ventas;

  }


  public function get_soloTipoProducto($tipoProducto,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta
      FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND producto.idTipoProducto=$tipoProducto
      AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "' ORDER BY ventas.idVenta DESC" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->ventas[]=$fila;
    }
    return $this->ventas;

  }


  public function get_soloProveedor($proveedor,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta
      FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND producto.idProveedor=$proveedor
      AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "' ORDER BY ventas.idVenta DESC" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->ventas[]=$fila;
    }
    return $this->ventas;

  }


  public function get_soloCliente($cliente,$fechaInicial,$fechaFinal){

    $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta
      FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto
      AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor AND ventas.idCliente=$cliente
      AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "' ORDER BY ventas.idVenta DESC" );

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
    $this->ventas[]=$fila;
    }
    return $this->ventas;

  }


    public function get_soloFecha($fechaInicial,$fechaFinal){

      $consulta=$this->db->query("SELECT idVenta,nombreProducto,nombreTipoProducto,nombreProveedor,nombreCliente,fechaVenta,cantidad,ventas.valorVenta
        FROM ventas,producto,proveedor,tipoProducto,cliente WHERE ventas.idProducto=producto.idProducto AND producto.idTipoProducto=tipoProducto.idTipoProducto
        AND ventas.idCliente=cliente.idCliente AND producto.idProveedor=proveedor.idProveedor
        AND fechaVenta BETWEEN '". $fechaInicial  ."' AND '" . $fechaFinal . "' ORDER BY ventas.idVenta DESC" );

      while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->ventas[]=$fila;
      }
      return $this->ventas;

    }

}


 ?>
