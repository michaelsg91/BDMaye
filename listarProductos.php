<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de Productos</title>
    <link href="css/hoja.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/scriptProductos.js"></script>
  </head>
  <body>
    <h1>PRODUCTOS</h1>
    <?php

        require_once("php/SQLInicialesProductos.php");
        require_once("php/claseProductos.php");

        if(isset($_POST["producto"])){

        try{
          error_reporting(E_ALL ^ E_NOTICE);//--- EVITA LOS MENSAJES DE ERROR

          $producto=$_POST["producto"];
          $tipoProducto=$_POST["tipo_producto"];
          $proveedor=$_POST["proveedor"];

          if($producto!="0"){
            $soloProducto=new Productos();
            $matriz_productos=$soloProducto->get_solo_nombre($producto);

          }else if($tipoProducto!=0){
            $soloTipoProducto=new Productos();
            $matriz_productos=$soloTipoProducto->get_solo_tipo_producto($tipoProducto);

          }else if($proveedor!=0){
            $soloProveedor=new Productos();
            $matriz_productos=$soloProveedor->get_solo_proveedor($proveedor);
          }else{

            $producto=new Productos();
            $matriz_productos=$producto->get_productos();


          }


        }catch(Exception $e){
              echo "Linea del error: " . $e->getLine();
        }


    }else{
      $producto=new Productos();
      $matriz_productos=$producto->get_productos();

    }





    ?>

    <aside class="aside_consultas">
    <form id="form_consultas_productos" action="listarProductos.php" method="post" name="form_consultas_productos">
    <table>

      <!--  DESPLEGABLE PARA PRODUCTO -->
      <tr>
        <td>Producto</td>
        <td>
          <select id="producto" name="producto">
            <option value="0">-- Elige una Opción --</option>
            <?php
              while($registro=$resultadoProducto->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['nombreProducto'] ."'>". $registro['nombreProducto'] ."</option>";
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

    <tr>
      <td colspan="2"><input type="submit" value="Consultar" name="envia_consulta" id="envia_consulta"></td>
    </tr>

    </table>
    </form>
    </aside>

    <section>
  <table  border="0" align="left" width="50%">
    <tr >
      <td class="primera_fila">Id Producto</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Valor Venta</td>
      <td class="primera_fila">Proveedor</td>
      <td class="primera_fila">Tipo Producto</td>
      <td class="primera_fila">Cantidad Vendida</td>


    </tr>

		<?php
    foreach ($matriz_productos as $producto):
    	?>


   	<tr>
      <td><?php echo $producto["idProducto"]?></td>
      <td><?php echo $producto["nombreProducto"]?></td>
      <td><?php echo $producto["valorVenta"]?></td>
      <td><?php echo $producto["nombreProveedor"]?></td>
      <td><?php echo $producto["nombreTipoProducto"]?></td>
      <td><?php echo $producto["cantidadVendida"]?></td>


    </tr>

<?php
endforeach;
?>

  </table>
</section>


  </body>
</html>
