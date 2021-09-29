<?php
require_once ('conexion.php');
$conexion=conectarBD();
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$esfericoDerLejos = $_POST["esfericoDerLejos"];
$cilindroDerLejos = $_POST["cilindroDerLejos"];
$ejeDerLejos = $_POST["ejeDerLejos"];
$esfericoIzqLejos = $_POST["esfericoIzqLejos"];
$cilindroIzqLejos = $_POST["cilindroIzqLejos"];
$ejeIzqLejos = $_POST["ejeIzqLejos"];
$esfericoDerCerca = $_POST["esfericoDerCerca"];
$cilindroDerCerca = $_POST["cilindroDerCerca"];
$ejeDerCerca = $_POST["ejeDerCerca"];
$esfericoIzqCerca = $_POST["esfericoIzqCerca"];
$cilindroIzqCerca = $_POST["cilindroIzqCerca"];
$ejeIzqCerca = $_POST["ejeIzqCerca"];
$distanciapupila = $_POST["distanciapupila"];
$altura = $_POST["altura"];

$tipo = $_POST["tipo"];
$material = $_POST["material"];
$extra = $_POST["extra"];
$armazon = $_POST["armazon"];
$color = $_POST["color"];
$tamano = $_POST["tamano"];
$observaciones = $_POST["observaciones"];

$total = $_POST["total"];

$insertarClientes = "insert into clientes(nombre,telefono) values ('$nombre','$telefono')";
$resultadoclientes = pg_query($conexion,$insertarClientes);
$insertarGraduacion = "insert into graduacion(
	id_Cliente,
	esfericoIzqLejos,
	esfericoIzqCerca,
	esfericoDerLejos,
	esfericoDerCerca,
	cilindroIzqLejos,
	cilindroIzqCerca,
	cilindroDerLejos,
	cilindroDerCerca,
	ejeIzqLejos,
	ejeIzqCerca,
	ejeDerLejos,
	ejeDerCerca,
	distanciapupila,
	altura) 
	select id_cliente,'$esfericoIzqLejos',
	'$esfericoIzqCerca',
	'$esfericoDerLejos',
	'$esfericoDerCerca',
	'$cilindroIzqLejos',
	'$cilindroIzqCerca',
	'$cilindroDerLejos',
	'$cilindroDerCerca',
	'$ejeIzqLejos',
	'$ejeIzqCerca',
	'$ejeDerLejos',
	'$ejeDerCerca',
	'$distanciapupila',
	'$altura'from clientes where nombre = '$nombre'
	";
$resultadograduacion = pg_query($conexion,$insertarGraduacion);

$insertarlentes = "insert into lentes (tipo, material, extra, armazon, color, tamano, observaciones) values ('$tipo', '$material', '$extra', '$armazon', '$color', '$tamano', '$observaciones')";

$resultadolentes = pg_query($conexion,$insertarlentes);

$insertarventa = "insert into ventas (id_cliente, id_lentes, fecha, total) select id_cliente,(select id_lentes from lentes order by id_lentes desc limit 1) ,now(), '$total' from clientes where nombre = '$nombre'";

$resultadoventa = pg_query($conexion,$insertarventa);

?>
<!DOCTYPE html>
<HTML LANG="sp">
<html>
<head>

    <title> Optica Barba </title>
    <link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="estilo_mensaje.css">
    <style>
        body {
            margin: 0;
        }

        body {
            background-image: url("imagenes/fondoazul1.png");
        }
    </style>

</head>

<body text="black">
<script> alert("Usuario Registrado!!");</script>
    <div class="topnav">
        <center><img src="imagenes/ija.png"></center>
        <a href="index.html">Inicio</a>
        <a href="clientes.php">Clientes</a>
		<a href="Productos.php">Productos</a>
        <a href="buscarCliente.html">Buscar Cliente</a>
        <a class="active" href="registroClientes.html">Registro de clientes</a>
		<a href="nueva_venta.html">Nueva Venta</a>
    </div>
    <div class="imagenmove">
        <h1><marquee><img src="imagenes/barba1.png"></marquee></h1>
    </div>

    <div>
        <form method="POST" action="registroClientes.php">
            <center><h2><em>Registro de cliente</em></h2></center>
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
			<center><table class="reg">
			<tr><th colspan="4">Ojo derecho</th><th>DP</th><th>O</th><th colspan="4">Ojo Izquierdo</th></tr>
			<tr><th></th><th>ESF</th><th>CIL</th><th>EJE</th><td><input type="text" name="distanciapupila" class="peque-input" required /></td><td><input type="text" name="altura" class="peque-input" required /></td><th></th><th>ESF</th><th>CIL</th><th>EJE</th></tr>
			<tr><th>Lejos</th><td><input type="text" name="esfericoDerLejos" class="peque-input" required /></td><td><input type="text" name="cilindroDerLejos" class="peque-input" required /></td><td><input type="text" name="ejeDerLejos" class="peque-input" required /></td><th colspan="2"></th><th>Lejos</th><td><input type="text" name="esfericoIzqLejos" class="peque-input" required /></td><td><input type="text" name="cilindroIzqLejos" class="peque-input" required /></td><td><input type="text" name="ejeIzqLejos" class="peque-input" required /></td></tr>
			<tr><th>Cerca</th><td><input type="text" name="esfericoDerCerca" class="peque-input" required /></td><td><input type="text" name="cilindroDerCerca" class="peque-input" required /></td><td><input type="text" name="ejeDerCerca" class="peque-input" required /></td><th colspan="2"></th><th>Lejos</th><td><input type="text" name="esfericoIzqCerca" class="peque-input" required /></td><td><input type="text" name="cilindroIzqCerca" class="peque-input" required /></td><td><input type="text" name="ejeIzqCerca" class="peque-input" required /></td></tr>
			</table></center>
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
            <center> <input class="form-btn" name="submit" type="submit" value="¡¡Registrar!!" /></center>
        
		</form>
    </div>

    
</body>
<footer>
    </footer>
</html>