<?php
class personas_modelo{
  private $db;
  private $personas;

  public function __construct(){
    require_once("conexion.php");
    $this->db=conectar::conexion();
    $this->personas=array();
  }

  public function get_personas(){


    $consulta=$this->db->query("SELECT idProducto,nombreProducto,valorVenta,nombreProveedor,nombreTipoProducto,cantidadVendida FROM producto,proveedor,tipoProducto WHERE producto.idProveedor=proveedor.idProveedor AND producto.idTipoProducto=tipoProducto.idTipoProducto");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->personas[]=$fila;
    }
    return $this->personas;

  }

}

$persona=new personas_modelo();

$matriz_personas=$persona->get_personas();



 ?>
