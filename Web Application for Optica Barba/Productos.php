<?php
require_once ('conexion.php');
$conexion=conectarBD();
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
		<a class="active" href="Productos.php">Productos</a>
        <a href="buscarCliente.html">Buscar Cliente</a>
        <a href="registroClientes.html">Registro de clientes</a>
		<a href="nueva_venta.html">Nueva Venta</a>
    </div>
    <div class="imagenmove">
        <h1><marquee><img src="imagenes/barba1.png"></marquee></h1>
    </div>
    <?php $query="select * from productos";
    $resultado=pg_query($conexion,$query) or die ("Error en la consulta");
	$numReg=pg_num_rows($resultado);
	if($numReg>0){
		?>
		<div class="group">
			<center><h2><em>Lista de Productos</em></h2></center>
			<?php
			while($filas=pg_fetch_array($resultado)){
				?>
				<div class="individual">
				<center><table class="view">
				<tr><th>Nombre de Producto: </th><td><?php echo"".$filas["nombre"]."";?></td></tr>
				<tr><th>Cantidad: </th><td><?php echo"".$filas["cantidad"]."";?></td></tr>
				</table></center>
				
			<?php } ?> </div> <?php }else{echo"
		<center><h1>No hay Clientes en la base de datos...</h1></center>";
		?> <center><a href="registroClientes.html">Registra aqui un cliente</a></center>;
	<?php } ?>
</body>
<footer>
    </footer>
</html>
