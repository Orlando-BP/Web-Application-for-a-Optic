<?php
require_once ('conexion.php');
$conexion=conectarBD();
$id_cliente = $_POST["id_cliente"];

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

$modificarGraduacion = "update graduacion set
	esfericoIzqLejos = '$esfericoIzqLejos',
	esfericoIzqCerca = '$esfericoIzqCerca',
	esfericoDerLejos = '$esfericoDerLejos',
	esfericoDerCerca = '$esfericoDerCerca',
	cilindroIzqLejos = '$cilindroIzqLejos',
	cilindroIzqCerca = '$cilindroIzqCerca',
	cilindroDerLejos = '$cilindroDerLejos',
	cilindroDerCerca = '$cilindroDerCerca',
	ejeIzqLejos = '$ejeIzqLejos',
	ejeIzqCerca = '$ejeIzqCerca',
	ejeDerLejos = '$ejeDerLejos',
	ejeDerCerca = '$ejeDerCerca',
	distanciapupila = '$distanciapupila',
	altura = '$altura' 
	where id_cliente = $id_cliente";
	
$resultadograduacion = pg_query($conexion,$modificarGraduacion);
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
    <?php $query="select * from view_cliente_graduacion";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
	$numReg=pg_num_rows($resultado);
	if($numReg>0){
		?>
		<div class="group">
			<center><h2><em>Lista de Clientes</em></h2></center>
			<?php
			while($filas=pg_fetch_array($resultado)){
				$nombreamodificar = $filas["nombre"];
				?>
				<div class="individual">
				<center><table class="view">
				<tr><th>Nombre de Cliente: </th><td><?php echo"".$filas["nombre"]."";?></td></tr>
				<tr><th>telefono de Cliente: </th><td><?php echo"".$filas["telefono"]."";?></td></tr>
				</table></center>
				<center><table class="view">
				<tr><th colspan="4">Ojo derecho</th><th>DP</th><th>O</th><th colspan="4">Ojo Izquierdo</th></tr>
				<tr><th></th><th>ESF</th><th>CIL</th><th>EJE</th><td> <?php echo"".$filas["distanciapupila"]."";?></td><td><?php echo"".$filas["altura"]."";?></td><th></th><th>ESF</th><th>CIL</th><th>EJE</th></tr>
				<tr><th>Lejos</th><td><?php echo"".$filas["esfericoderlejos"]."";?></td><td><?php echo"".$filas["cilindroderlejos"]."";?></td><td><?php echo"".$filas["ejederlejos"]."";?></td><th colspan="2"></th><th>Lejos</th><td><?php echo"".$filas["esfericoizqlejos"]."";?></td><td><?php echo"".$filas["cilindroizqlejos"]."";?></td><td><?php echo"".$filas["ejeizqlejos"]."";?></td></tr>
				<tr><th>Cerca</th><td><?php echo"".$filas["esfericodercerca"]."";?></td><td><?php echo"".$filas["cilindrodercerca"]."";?></td><td><?php echo"".$filas["ejedercerca"]."";?></td><th colspan="2"></th><th>Cerca</th><td><?php echo"".$filas["esfericoizqcerca"]."";?></td><td><?php echo"".$filas["cilindroizqcerca"]."";?></td><td><?php echo"".$filas["ejeizqcerca"]."";?></td></tr>
				</table></center></div>
				<form method="POST" action="modificador.php" class="buscar">
				<center><table class="reg">
				<tr>
				<th>
				<label for="modificacion">Cambiar datos de cliente</label>
				<input type="radio" name="modificacion" class="form-input" value="Datos"  />
				</th>
				</tr>
				<tr>
				<th>
				<label for="modificacion">Cambiar graduacion de cliente</label>
				<input type="radio" name="modificacion" class="form-input" value="Graduacion"  />
				</th>
				</tr>
				</table></center>
				<input type="hidden" name="nombreamodificar" value="<?php echo $nombreamodificar ?>" />
				<center> <input class="form-btn" name="submit" type="submit" value="modificar" /></center>
				</form>
				
				
			<?php } ?> </div> <?php }else{echo"
		<center><h1>No hay Clientes en la base de datos...</h1></center>";
		?> <center><a href="registroClientes.html">Registra aqui un cliente</a></center>;
	<?php } ?>
</body>
<footer>
    </footer>
</html>
