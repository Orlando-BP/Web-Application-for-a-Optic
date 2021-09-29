<?php
require_once ('conexion.php');
$conexion=conectarBD();
$nombre = $_POST["nombre"];
$Consultadebusqueda = "select * from view_NotaDeVenta where position ('$nombre' in nombre) > 0;";
$resultado=pg_query($conexion,$Consultadebusqueda) or die ("Error en la consulta");
$numReg=pg_num_rows($resultado);
?>

<!DOCTYPE html>
<HTML LANG="sp">
<html>
<head> 

           <title> Optica Barba </title>
<link rel="stylesheet" href="estilo.css">
<link rel="stylesheet" href="estilo_mensaje.css">
     <style>
body {margin:0;}
body { background-image: url("imagenes/fondoazul1.png");}
</style>

</head>

<body text="black">

<div class="topnav">
<center><img src="imagenes/ija.png"></center>
  <a href="index.html">Inicio</a>
  <a href="clientes.php">Clientes</a>
  <a href="Productos.php">Productos</a>
  <a href="buscarCliente.html">Buscar Cliente</a>
  <a href="registroClientes.html">Registro de clientes</a>
  <a class="active" href="nueva_venta.html">Nueva Venta</a>
</div>
<div class="imagenmove">
<h1><marquee><img src="imagenes/barba1.png"></marquee></h1>
</div>

<div>
        <form method="POST" action="nueva_venta.php" class="buscar">
            <center><h2><em>Busca al cliente al que se le realizara la venta</em></h2></center>
			<center><table class="reg">
			<tr>
			<th>
            <label for="nombre">Nombre el nombre y/o apellido del cliente <span><em>(requerido)</em></span></label>
			<input type="text" name="nombre" class="form-input" required />
			</th>
			</tr></table></center>
            <center> <input class="form-btn" name="submit" type="submit" value="Buscar" /></center>
			
        </form>
    </div>
	
	<?php
	if($numReg>0){
		?>
		<div class="group2">
			<center><h2><em>Cliente Encontrado!!</em></h2></center>
			<?php
			while($filas=pg_fetch_array($resultado)){
				$nuevonombre = $filas["nombre"];
				?>
				<div class="individual2">
				<center><table class="view">
				<tr><th>Fecha de ultima nota: </th><td><?php echo"".$filas["fecha"]."";?></td></tr>
				<tr><th>Nombre de Cliente: </th><td><?php echo"".$filas["nombre"]."";?></td></tr>
				<tr><th>telefono de Cliente: </th><td><?php echo"".$filas["telefono"]."";?></td></tr>
				</table></center>
				<center><table class="view">
				<tr><th colspan="4">Ojo derecho</th><th>DP</th><th>O</th><th colspan="4">Ojo Izquierdo</th></tr>
				<tr><th></th><th>ESF</th><th>CIL</th><th>EJE</th><td> <?php echo"".$filas["distanciapupila"]."";?></td><td><?php echo"".$filas["altura"]."";?></td><th></th><th>ESF</th><th>CIL</th><th>EJE</th></tr>
				<tr><th>Lejos</th><td><?php echo"".$filas["esfericoderlejos"]."";?></td><td><?php echo"".$filas["cilindroderlejos"]."";?></td><td><?php echo"".$filas["ejederlejos"]."";?></td><th colspan="2"></th><th>Lejos</th><td><?php echo"".$filas["esfericoizqlejos"]."";?></td><td><?php echo"".$filas["cilindroizqlejos"]."";?></td><td><?php echo"".$filas["ejeizqlejos"]."";?></td></tr>
				<tr><th>Cerca</th><td><?php echo"".$filas["esfericodercerca"]."";?></td><td><?php echo"".$filas["cilindrodercerca"]."";?></td><td><?php echo"".$filas["ejedercerca"]."";?></td><th colspan="2"></th><th>Cerca</th><td><?php echo"".$filas["esfericoizqcerca"]."";?></td><td><?php echo"".$filas["cilindroizqcerca"]."";?></td><td><?php echo"".$filas["ejeizqcerca"]."";?></td></tr>
				</table></center>
				
				<center><table class="view">
				<tr><th>Tipo</th><td><?php echo"".$filas["tipo"]."";?></td>
				<th>Material</th><td><?php echo"".$filas["material"]."";?></td>
				<th>E</th><td><?php echo"".$filas["extra"]."";?></td>
				</tr>
				<tr><th>Armazon</th><td><?php echo"".$filas["armazon"]."";?></td>
				<th>Color</th><td><?php echo"".$filas["color"]."";?></td>
				<th>Tamaño</th><td><?php echo"".$filas["tamaño"]."";?></td>
				</tr>
				</table></center>
				<center><table class="view">
				<tr>
				<th>Observaciones</th><td><?php echo"".$filas["observaciones"]."";?></td>
				</tr>
				</table></center>
				<center><table class="view">
				<tr>
				<th>Precio Total</th><td><?php echo"".$filas["total"]."";?></td>
				</tr>
				</table></center>
				</div>
				
				
			<?php } ?> 
			<form method="POST" action="registroVenta.php">
			<center><table class="reg">
			<tr><th>Tipo</th><td><input type="text" name="tipo" class="peque-input" required /></td>
			<th>Material</th><td><input type="text" name="material" class="peque-input" required /></td>
			<th>E</th><td><input type="text" name="extra" class="peque-input" required /></td>
			</tr>
			<tr><th>Armazon</th><td><input type="text" name="armazon" class="peque-input" required /></td>
			<th>Color</th><td><input type="text" name="color" class="peque-input" required /></td>
			<th>Tamaño</th><td><input type="text" name="tamano" class="peque-input" required /></td>
			</tr>
			</table></center>
			<center><table class="reg">
			<tr>
			<th>Observaciones</th><td><input type="text" name="observaciones" class="form-input" required /></td>
			</tr>
			</table></center>
			
			<center><table class="reg">
			<tr>
			<th>Precio Total</th><td><input type="text" name="total" class="peque-input" required /></td>
			</tr>
			</table></center>
			<input type="hidden" name="nombre" value="<?php echo $nuevonombre ?>" />
            <center> <input class="form-btn" name="submit" type="submit" value="¡¡Registrar!!" /></center>
			</form>
			</div> 
			<?php
		} else{ echo"
		<center><h1>No se encontro cliente en la base de datos...</h1></center>";
		}
?>
</body>
<footer>
</footer>
</html>