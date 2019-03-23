<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Informe De Ventas</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">

<script src="js/jquery-3.1.1.js"></script>

<script src="js/script.js"></script>
<script src="js/ajax.js"></script>



</head>

<body>
  <?php

include("php/SQLIniciales.php");

  ?>
  <div id="banner"><img src="css/img/compra.png" alt="Banner Compra Venta" name="logo" width="413" height="74" id="logo"/>
    <ul>
      <li class="separador"><?php echo  date("d-m-Y") ?></li>
      <li><?php echo $usuario ?></li></ul>
  </div>


  <div id="princNav">
  <ul>
    <li><a id="li_ventas">Ventas</a></li>
	  <li><a id="li_productos">Productos</a></li>
    <li><a id="li_clientes">Clientes</a></li>
    <li><a id="li_consultas">Consultas</a></li>
	  <li><a href="login.php?salir">Deslogear</a></li>
  </ul>
  </div>

<section id="contenidoPrincipal">

  <!--- CONTENIDO PARA VENTAS ---------------------------------------------------------------------------->
  <article class="art_ventas">
      <h2>Venta</h2>
      <form id="form_ventas" action="php/registroVenta.php" method="post">
        <table>
          <!--  CAJA PARA CEDULA -->
          <tr>
            <td>Cédula Cliente:</td>
            <td><input type="text" name="cedcli" id="cedcli"></td>
            <td><p  id="nombre"></p></td>
          </tr>

          <!--  DESPLEGABLE PARA TIPO PRODUCTO -->
          <tr>
            <td>Tipo Producto:</td>
            <td><select id="tipo_producto" name="tipo_producto">
              <option value="">-- Elige una Opción --</option>
              <?php
                while($registro=$resultadoTipoProducto->fetch(PDO::FETCH_ASSOC)){
                  echo  "<option value='". $registro['idTipoProducto'] ."'>". $registro['nombreTipoProducto'] ."</option>";
                }
              ?>
              </select></td>
          </tr>

          <!--  DESPLEGABLE PARA PRODUCTO -->
          <tr>
            <td>Producto:</td>
            <td><select id="producto" name="producto">
              <option value="">-- Elige una Opción --</option>

              </select>
            </td>
          </tr>

          <!--  CAJA PARA CANTIDAD $ -->
          <tr>
            <td>Cantidad:</td>
            <td>
              <select id="cantidad" name="cantidad">

                </select>
            </td>
          </tr>

          <!--  CAJA PARA VALOR UNITARIO  Y TOTAL $ -->
          <tr>
            <td>Valor:</td>
            <td><input type="text" name="valor" id="valor"></td>
            <td><input type="text" name="total" id="total" readonly></td>
          </tr>

          <tr>
              <td colspan="2" align="center"><input type="submit" value="Registrar" id="enviar" name="enviar"></td>
          </tr>
        </table>
      </form>
    </article>
<!----------------------------------------------------------------------------------------------------------------->

<!--- SECCION PARA PRODUCTOS ---------------------------------------------------------------------------->
  <article class="art_productos">
    <h2>Productos</h2>
      <form id="form_producto" action="php/registroProducto.php" method="post">
        <table>
          <!--  BOTON PARA LISTAR PRODUCTOS -->
          <tr>
              <td colspan="2" align="right">
                <a href="listarProductos.php">
                <input type="button" name="button" value="Listar Productos"></button>
                </a>
              </td>
          </tr>

          <!--  CAJA PARA EL NOMBRE -->
          <tr>
            <td>Nombre: </td>
            <td><input type="text" name="nombre_producto" id="nombre_producto" size="50"></td>
          </tr>

          <!--  CAJA PARA LA CANTIDAD -->
          <tr>
            <td>Cantidad: </td>
            <td><input type="number" name="cantidad" id="cantidad"></td>
          </tr>

          <!--  CAJA PARA EL VALOR DE VENTA -->
          <tr>
            <td>Valor Venta: </td>
            <td><input type="number" name="valor_venta" id="valor_venta"></td>
          </tr>

          <!--  DESPLEGABLE PARA TIPO PRODUCTO -->
          <tr>
            <td>Tipo Producto:</td>
            <td><select id="tipo_producto" name="tipo_producto">
              <option value="">-- Elige una Opción --</option>
              <?php
                $resultadoTipoProducto->execute(array());
                while($registro=$resultadoTipoProducto->fetch(PDO::FETCH_ASSOC)){
                  echo  "<option value='". $registro['idTipoProducto'] ."'>". $registro['nombreTipoProducto'] ."</option>";
                }
              ?>
              </select></td>
          </tr>

          <!--  DESPLEGABLE PARA PROVEEDOR -->
          <tr>
            <td>Proveedor:</td>
            <td><select id="proveedor" name="proveedor">
              <option value="">-- Elige una Opción --</option>
              <?php
              while($registro=$resultadoProveedor->fetch(PDO::FETCH_ASSOC)){
                echo  "<option value='". $registro['idProveedor'] ."'>". $registro['nombreProveedor'] ."</option>";
              }
              ?>
              </select></td>
          </tr>

            <td colspan="2" align="center"><input type="submit" name="enviar" value="Registrar"></td>
          </tr>
        </table>
      </form>
    </article>
<!----------------------------------------------------------------------------------------------------------------->


<!--- SECCION PARA CLIENTES ---------------------------------------------------------------------------->
<article class="art_clientes">
  <h2>Registro de Cliente</h2>
    <form id="form_cliente" action="php/registroCliente.php" method="post">
      <table>
        <tr>
          <td>Cédula:</td>
          <td><input type="text" name="cedula" id="cedula"></td>
        </tr>
        <tr>
          <td>Nombre:</td>
          <td><input type="text" name="nombre" id="nombre"></td>
        </tr>
        <tr>
          <td>Teléfono:</td>
          <td><input type="text" name="telefono" id="telefono"></td>
        </tr>
        <tr>
          <td>Dirección:</td>
          <td><input type="text" name="direccion" id="direccion"></td>
        </tr>
        <tr>
          <td>Municipio:</td>
          <td><input type="text" name="municipio" id="municipio"></td>

        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="enviar" value="Registrar"></td>
        </tr>
      </table>
    </form>

</article>



<article class="art_consultas">
  <h2>Consultas</h2>


</article>


<article>
<p align="center" id="aviso">

<?php

if (isset($_GET["error"])) {
echo "No ha sido posible agregar el registro. <br>Verifique los datos ingresados, compruebe su conexión a la base de datos o intentelo más tarde.";
}else if(isset($_GET["ex"])) {
echo "Registrado correctamente.";
}

?>

</p>

</article>
  <p id="pie">2017. Universidad Cooperativa de Colombia</p>
</section>

</body>


</html>
