<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de Productos</title>
    <link href="css/hoja.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>PRODUCTOS</h1>
<?php
    require_once("php/procesoListar.php");

?>

  <table  border="0" align="center" width="50%">
    <tr >
      <td class="primera_fila">Id Producto</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Valor Venta</td>
      <td class="primera_fila">Proveedor</td>
      <td class="primera_fila">Tipo Producto</td>
      <td class="primera_fila">Cantidad Vendida</td>


    </tr>

		<?php
    foreach ($matriz_personas as $persona):
    	?>


   	<tr>
      <td><?php echo $persona["idProducto"]?></td>
      <td><?php echo $persona["nombreProducto"]?></td>
      <td><?php echo $persona["valorVenta"]?></td>
      <td><?php echo $persona["nombreProveedor"]?></td>
      <td><?php echo $persona["nombreTipoProducto"]?></td>
      <td><?php echo $persona["cantidadVendida"]?></td>


    </tr>

<?php
endforeach;
?>

  </table>



  </body>
</html>
