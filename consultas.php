<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagina de Consultas</title>
    <link href="css/hoja.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/scriptConsultas.js"></script>

  </head>
  <body>
    <header>
      <h1>VENTAS</h1>
    </header>
<?php

    require_once("php/SQLInicialesConsultas.php");
    require_once("php/claseVentas.php");

    if(isset($_POST["fecha_inicial"])){

    try{
      error_reporting(E_ALL ^ E_NOTICE);//--- EVITA LOS MENSAJES DE ERROR

      $fechaInicial=$_POST["fecha_inicial"];
      $fechaFinal=$_POST["fecha_final"];
      $producto=$_POST["producto"];
      $tipoProducto=$_POST["tipo_producto"];
      $proveedor=$_POST["proveedor"];
      $cliente=$_POST["cliente"];

      if($producto!=0){
        $soloProducto=new ventas();
        $matriz_ventas=$soloProducto->get_soloProducto($producto,$fechaInicial,$fechaFinal);

      }else if($tipoProducto!=0){
        $soloTipoProducto=new ventas();
        $matriz_ventas=$soloTipoProducto->get_soloTipoProducto($tipoProducto,$fechaInicial,$fechaFinal);

      }else if($proveedor!=0){
        $soloProveedor=new ventas();
        $matriz_ventas=$soloProveedor->get_soloProveedor($proveedor,$fechaInicial,$fechaFinal);
      }else if($cliente!=0){
        $soloCliente=new ventas();
        $matriz_ventas=$soloCliente->get_soloCliente($cliente,$fechaInicial,$fechaFinal);
      }else if($fechaInicial!="" && $fechaFinal!=""){
        $soloFecha=new ventas();
        $matriz_ventas=$soloFecha->get_soloFecha($fechaInicial,$fechaFinal);

      }else{

          $todasVentas=new ventas();
          $matriz_ventas=$todasVentas->get_ventas();

      }


    }catch(Exception $e){
          echo "Linea del error: " . $e->getLine();
    }


}else{
  $todasVentas=new ventas();
  $matriz_ventas=$todasVentas->get_ventas();

}





?>

<aside class="aside_consultas">
<form id="form_consultas" action="consultas.php" method="post" name="form_consultas">
<table>
  <tr>
    <td>Fecha Inicial:</td>
    <td><input type="date" name="fecha_inicial" id="fecha_inicial" value="0"></td>
  </tr>
  <tr>
    <td>Fecha Final:</td>
    <td><input type="date" name="fecha_final" id="fecha_final" value="0"></td>
  </tr>

  <!--  DESPLEGABLE PARA PRODUCTO -->
  <tr>
    <td>Producto</td>
    <td>
      <select id="producto" name="producto">
        <option value="0">-- Elige una Opción --</option>
        <?php
          while($registro=$resultadoProducto->fetch(PDO::FETCH_ASSOC)){
            echo  "<option value='". $registro['idProducto'] ."'>". $registro['nombreProducto'] ."</option>";
          }
         ?>
      </select>
    </td>
  </tr>

  <!--  DESPLEGABLE PARA TIPO PRODUCTO -->
  <tr>
    <td>Tipo Producto</td>
    <td>
      <select id="tipo_producto" name="tipo_producto">
        <option value="0">-- Elige una Opción --</option>
        <?php
          while($registro=$resultadoTipoProducto->fetch(PDO::FETCH_ASSOC)){
            echo  "<option value='". $registro['idTipoProducto'] ."'>". $registro['nombreTipoProducto'] ."</option>";
          }
         ?>
      </select>
    </td>
  </tr>

  <!--  DESPLEGABLE PARA PROVEEDOR -->
  <tr>
    <td>Proveedor</td>
    <td>
      <select id="proveedor" name="proveedor">
        <option value="0">-- Elige una Opción --</option>
        <?php
          while($registro=$resultadoProveedor->fetch(PDO::FETCH_ASSOC)){
            echo  "<option value='". $registro['idProveedor'] ."'>". $registro['nombreProveedor'] ."</option>";
          }
         ?>
      </select>
    </td>
  </tr>

  <!--  DESPLEGABLE PARA CLIENTE -->
  <tr>
    <td>Cliente</td>
    <td>
      <select id="cliente" name="cliente">
        <option value="0">-- Elige una Opción --</option>
        <?php
          while($registro=$resultadoCliente->fetch(PDO::FETCH_ASSOC)){
            echo  "<option value='". $registro['idCliente'] ."'>". $registro['nombreCliente'] ."</option>";
          }
         ?>
      </select>
    </td>
  </tr>
<tr>
  <td colspan="2"><input type="submit" value="Consultar" name="envia_consulta" id="envia_consulta"></td>
</tr>

</table>
</form>
</aside>
<section>

  <table  border="0" align="left" width="50%">
    <tr >
      <td class="primera_fila">Id Venta</td>
      <td class="primera_fila">Producto</td>
      <td class="primera_fila">Tipo Producto</td>
      <td class="primera_fila">Proveedor</td>
      <td class="primera_fila">Cliente</td>
      <td class="primera_fila">Fecha Venta</td>
      <td class="primera_fila">Cantidad</td>
      <td class="primera_fila">Valor Venta</td>

    </tr>

		<?php
    $sumaVentas=0;
    foreach ($matriz_ventas as $persona):
    	?>


   	<tr>
      <td><?php echo $persona["idVenta"]?></td>
      <td><?php echo $persona["nombreProducto"]?></td>
      <td><?php echo $persona["nombreTipoProducto"]?></td>
      <td><?php echo $persona["nombreProveedor"]?></td>
      <td><?php echo $persona["nombreCliente"]?></td>
      <td><?php echo $persona["fechaVenta"]?></td>
      <td><?php echo $persona["cantidad"]?></td>
      <td><?php echo $persona["valorVenta"]?></td>


    </tr>

<?php

$sumaVentas=$sumaVentas+$persona["valorVenta"];

endforeach;
?>
<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="primera_fila">Total:</td>
  <td>
<?php  echo $sumaVentas; ?>

  </td>
</tr>
  </table>

</section>



  </body>
</html>
