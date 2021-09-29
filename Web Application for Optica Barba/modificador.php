<?php
require_once ('conexion.php');
$conexion=conectarBD();
$nombreamodificar = $_POST["nombreamodificar"];
$modificacion = $_POST["modificacion"];
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
  <a class="active" href="clientes.php">Clientes</a>
  <a href="Productos.php">Productos</a>
  <a href="buscarCliente.html">Buscar Cliente</a>
  <a href="registroClientes.html">Registro de clientes</a>
  <a href="nueva_venta.html">Nueva Venta</a>
</div>
<div class="imagenmove">
<h1><marquee><img src="imagenes/barba1.png"></marquee></h1>
</div>

<?php
if($modificacion == "Datos"){
	$queryDatos="select * from clientes where nombre = '$nombreamodificar'";
    $resultadoDatos=pg_query($conexion,$queryDatos) or die ("Error en la consulta");
	$numReg=pg_num_rows($resultadoDatos);
	if($numReg>0){
	?>
		<div class="group">
			<center><h2><em>Graduacion Actual:</em></h2></center>
			<?php
			while($filas=pg_fetch_array($resultadoDatos)){
				
				$id_cliente = $filas["id_cliente"];
				?>
				<div class="individual3">
				<center><table class="view">
				<tr><th>Nombre de Cliente: </th><td><?php echo"".$filas["nombre"]."";?></td></tr>
				<tr><th>telefono de Cliente: </th><td><?php echo"".$filas["telefono"]."";?></td></tr>
				</table></center>
				</div>
			
	<?php
}}?>
		<form method="POST" action="modificarClientes.php">
            <center><h2><em>Modifica los datos del cliente</em></h2></center>
			<center><table class="reg">
			<tr>
			<th>
            <label for="nombre">Nombre del cliente <span><em>(requerido)</em></span></label>
			<input type="text" name="nombre" class="form-input" required />
			</th>
			</tr>
			<tr>
			<th>
            <label for="telefono">Telefono del cliente <span><em>(requerido)</em></span></label>
			<input type="text" name="telefono" class="form-input" required />
			</th>
			</tr>
			</table></center>
			<input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>" />
			<center> <input class="form-btn" name="submit" type="submit" value="modificar" /></center>
			</form>
			</div>

<?php
} else if ($modificacion == "Graduacion"){
	$queryGraduacion="select * from graduacion where id_cliente = (select id_cliente from clientes where nombre = '$nombreamodificar')";
    $resultadoGraduacion=pg_query($conexion,$queryGraduacion) or die ("Error en la consulta");
	$numReg=pg_num_rows($resultadoGraduacion);
	if($numReg>0){
	?>
		<div class="group">
			<center><h2><em>Datos Actuales:</em></h2></center>
			<?php
			while($filas=pg_fetch_array($resultadoGraduacion)){
				$id_cliente = $filas["id_cliente"];
				?>
				<div class="individual3">
				<center><table class="view">
				<tr><th colspan="4">Ojo derecho</th><th>DP</th><th>O</th><th colspan="4">Ojo Izquierdo</th></tr>
				<tr><th></th><th>ESF</th><th>CIL</th><th>EJE</th><td> <?php echo"".$filas["distanciapupila"]."";?></td><td><?php echo"".$filas["altura"]."";?></td><th></th><th>ESF</th><th>CIL</th><th>EJE</th></tr>
				<tr><th>Lejos</th><td><?php echo"".$filas["esfericoderlejos"]."";?></td><td><?php echo"".$filas["cilindroderlejos"]."";?></td><td><?php echo"".$filas["ejederlejos"]."";?></td><th colspan="2"></th><th>Lejos</th><td><?php echo"".$filas["esfericoizqlejos"]."";?></td><td><?php echo"".$filas["cilindroizqlejos"]."";?></td><td><?php echo"".$filas["ejeizqlejos"]."";?></td></tr>
				<tr><th>Cerca</th><td><?php echo"".$filas["esfericodercerca"]."";?></td><td><?php echo"".$filas["cilindrodercerca"]."";?></td><td><?php echo"".$filas["ejedercerca"]."";?></td><th colspan="2"></th><th>Cerca</th><td><?php echo"".$filas["esfericoizqcerca"]."";?></td><td><?php echo"".$filas["cilindroizqcerca"]."";?></td><td><?php echo"".$filas["ejeizqcerca"]."";?></td></tr>
				</table></center>
				</div>
				
	<?php
}}
	?>
			<form method="POST" action="modificarGraduacion.php">
			<center><table class="reg">
			<tr><th colspan="4">Ojo derecho</th><th>DP</th><th>O</th><th colspan="4">Ojo Izquierdo</th></tr>
			<tr><th></th><th>ESF</th><th>CIL</th><th>EJE</th><td><input type="text" name="distanciapupila" class="peque-input" required /></td><td><input type="text" name="altura" class="peque-input" required /></td><th></th><th>ESF</th><th>CIL</th><th>EJE</th></tr>
			<tr><th>Lejos</th><td><input type="text" name="esfericoDerLejos" class="peque-input" required /></td><td><input type="text" name="cilindroDerLejos" class="peque-input" required /></td><td><input type="text" name="ejeDerLejos" class="peque-input" required /></td><th colspan="2"></th><th>Lejos</th><td><input type="text" name="esfericoIzqLejos" class="peque-input" required /></td><td><input type="text" name="cilindroIzqLejos" class="peque-input" required /></td><td><input type="text" name="ejeIzqLejos" class="peque-input" required /></td></tr>
			<tr><th>Cerca</th><td><input type="text" name="esfericoDerCerca" class="peque-input" required /></td><td><input type="text" name="cilindroDerCerca" class="peque-input" required /></td><td><input type="text" name="ejeDerCerca" class="peque-input" required /></td><th colspan="2"></th><th>Lejos</th><td><input type="text" name="esfericoIzqCerca" class="peque-input" required /></td><td><input type="text" name="cilindroIzqCerca" class="peque-input" required /></td><td><input type="text" name="ejeIzqCerca" class="peque-input" required /></td></tr>
			</table></center>
			<input type="hidden" name="id_cliente" value="<?php echo $id_cliente ?>" />
			<center> <input class="form-btn" name="submit" type="submit" value="modificar" /></center>
			</form>
			</div>
	<?php
} else if($modificacion == "Eliminar"){
	$queryEliminacion="delete from clientes where id_cliente = (select id_cliente from clientes where nombre = '$nombreamodificar')";
    $resultadoEliminacion=pg_query($conexion,$queryEliminacion) or die ("Error en la consulta");
	?>
	<center><h1>Cliente <?php echo"".$nombreamodificar."";?> fue eliminado del sistema...</h1></center>
	
	<?php
}
?>
</body>
<footer>
    </footer>
</html>