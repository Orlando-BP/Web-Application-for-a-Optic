<?php
require_once ('conexion.php');
$conexion=conectarBD();
$nombre = $_POST["nombre"];
$Consultadebusqueda = "select * from view_cliente_graduacion where position('$nombre' in nombre)>0;";
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
        <a href="clientes.php">Clientes</a>
		<a href="Productos.php">Productos</a>
        <a class="active" href="buscarCliente.html">Buscar Cliente</a>
        <a href="registroClientes.html">Registro de Clientes</a>
		<a href="nueva_venta.html">Nueva Venta</a>
    </div>
    <div class="imagenmove">
        <h1><marquee><img src="imagenes/barba1.png"></marquee></h1>
    </div>
	
	<div>
        <form method="POST" action="buscarCliente.php" class="buscar">
            <center><h2><em>Ingresa</em></h2></center>
			<center><table class="reg">
			<tr>
			<th>
            <label for="nombre">Nombre el nombre o apellido del cliente <span><em>(requerido)</em></span></label>
			<input type="text" name="nombre" class="form-input" required />
			</th>
			</tr></table></center>
            <center> <input class="form-btn" name="submit" type="submit" value="Buscar" /></center>
			
        </form>
    </div>
	
<?php
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
				<tr>
				<th>
				<label for="modificacion">Eliminar cliente</label>
				<input type="radio" name="modificacion" class="form-input" value="Eliminar"  />
				</th>
				</tr>
				</table></center>
				<input type="hidden" name="nombreamodificar" value="<?php echo $nombreamodificar ?>" />
				<center> <input class="form-btn" name="submit" type="submit" value="modificar" /></center>
				</form>
			<?php } ?> </div> <?php
		} else{ echo"
		<center><h1>No se encontro cliente en la base de datos...</h1></center>";
		}
?>