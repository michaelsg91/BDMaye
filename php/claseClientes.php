<?php
class Clientes{
  private $db;
  private $clientes;

  public function __construct(){
    require_once("conexion.php");
    $this->db=conectar::conexion();
    $this->clientes=array();
  }

  public function get_personas(){


    $consulta=$this->db->query("SELECT * FROM cliente");

    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
       $this->clientes[]=$fila;
    }
    return $this->clientes;

  }

}

$cliente=new Clientes();

$matriz_clientes=$cliente->get_personas();



 ?>
