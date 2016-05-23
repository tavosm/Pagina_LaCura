<?php

$ok = $_POST['eliminar'];
$nombre = trim($_POST['p-eliminar']);//Platillo a eliminar

if ($nombre == "") {
	echo "<script> alert('FAVOR DE LLENAR TODOS LOS CAMPOS.'); 
	location.href='index-5.html';
	</script>";
} else {



if ($ok == "Eliminar" && $nombre != null) {

	//Conexion con el servidor
	$dbh = mysqli_connect("localhost", "admin", "admin") or die("ERROR AL CONECTAR: " . mysqli_error());

	//Seleccionar la BD
	mysqli_select_db($dbh, 'lacura');

	//Guardamos el nombre de la imagen en una variable
	$query2 = "select nombre_imagen, nombre_platillo from imagenes where nombre_platillo = '".$nombre."';";
	//Ejcutar query
	$consulta = mysqli_query($dbh, $query2) or die("ERROR AL EJECUTAR LA CONSULTA");

	//Guardo el nombre de la imagen en un arreglo
	$ni = mysqli_fetch_row($consulta);

	if ($ni[0] == "" && $ni[1] == "") {
		echo "<script type='text/javascript'> alert('ERROR. NO EXISTE EL PLATILLO');
		location.href='index-5.html';</script>";
	} else {
		//Instruccion
		$query = "delete from imagenes where nombre_platillo = '".$nombre."';";
		//Ejecutar query
		$operacion = mysqli_query($dbh, $query) or die("ERROR AL EJECUTAR EL QUERY");

		if ($operacion && $consulta) {
			unlink('img-menu/'.$ni[0]);//Borrar imagen del directorio
			echo "<script type='text/javascript'> alert('PLATILLO ELIMINADO CORRECTAMENTE');
			location.href='index-5.html';</script>";
			//header("Location:index-5.html");

		}
	}

	
}//Fin if para ejecutar consulta

}//Fin else 

?>