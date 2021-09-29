<?php
function conectarBD(){
	$host="host=localhost";
	$port="port=5432";
	$dbname="dbname=OpticaBarba";
	$user="user=postgres";
	$password="password=BP123";
	
	$bd = pg_connect("$host $port $dbname $user $password");
	if(!$bd){
		echo "La cacaste mi pana: ".pg_last_error;
	} else {
		#echo "<h3>EXITO MI PANA</h3><hr>";
		return $bd;
	}
}
?>