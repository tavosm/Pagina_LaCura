<?php

	$ok = $_POST["login"];
	$usuario = trim($_POST["usuario"]);
	$contrasena = trim($_POST["contrasena"]);

	if ($usuario == "" || $contrasena == "") {
		echo "<script> alert('¡¡¡ERROR!!!\\nFAVOR DE LLENAR TODOS LOS CAMPOS PARA PODER ACCEDER.'); 
	location.href='index-4.html';
	</script>";
	} else{

	//Conexion con el servidor
	$dbh = mysqli_connect("localhost", "admin", "admin") or die("ERROR AL CONECTAR: " . mysqli_error());
	//Seleccionar la BD
	mysqli_select_db($dbh, 'lacura');

	//Consulta"
	$query = "select nombre_usuario, contrasena from usuarios where nombre_usuario = '".$usuario."' AND contrasena = '".$contrasena."';";

	//Ejecutar consulta
	$resultado = mysqli_query($dbh, $query) or die("ERROR AL EJECUTAR EL QUERY");

	//Devuelve un array con los valores de los campos si es verdadero
	$row = mysqli_fetch_row($resultado);


	if ($ok == "Acceder" && $row != null) {
		header("Location:index-5.html");
	} else {
		echo "<script> alert('¡¡¡ERROR!!!\\nEL USUARIO O LA CONTRASEÑA NO SON CORRECTOS.'); 
	location.href='index-4.html';
	</script>";
	}

}//Fin if para validar si los campos estan vacios

?>