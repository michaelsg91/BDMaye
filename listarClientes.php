<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Listado de Productos</title>
    <link href="css/hoja.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <h1>CLIENTES</h1>
<?php
    require_once("php/claseClientes.php");

?>

  <table  border="0" align="center" width="50%">
    <tr >
      <td class="primera_fila">Id Cliente</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Cédula</td>
      <td class="primera_fila">Teléfono</td>
      <td class="primera_fila">Dirección</td>
      <td class="primera_fila">Municipio</td>


    </tr>

		<?php
    foreach ($matriz_clientes as $persona):
    	?>


   	<tr>
      <td><?php echo $persona["idCliente"]?></td>
      <td><?php echo $persona["nombreCliente"]?></td>
      <td><?php echo $persona["cedula"]?></td>
      <td><?php echo $persona["telefono"]?></td>
      <td><?php echo $persona["direccion"]?></td>
      <td><?php echo $persona["municipio"]?></td>


    </tr>

<?php
endforeach;
?>

  </table>



  </body>
</html>
