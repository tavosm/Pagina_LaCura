<?php

/*ESTE SCRIPT ES PARA AGREGAR UN USUARIO PARA QUE PUEDA CUMPLIR CON FUNCIONES DE ADMINISTRADOR*/

$ok = $_POST['registrar'];
$nombre = trim($_POST['n-user']);//Nombre del usuario
$contrasena = trim($_POST['contrasena']);
$contrasena2 = trim($_POST['contrasena2']);

$patron1 = '/[A-Z]/';//Al menos una letra mayuscula
$patron2 = '/[a-z]/';//Al menos una letra minuscula
$patron3 =  '/[0-9]/';//Al menos un numero
$patron4 = '/[\W]/';//Al menos un caracter especial, no toma en cuenta el guion bajo(_)

$v1 = preg_match($patron1, $contrasena);//Validacion, regresa true si se encontro coincidencia
$v2 = preg_match($patron2, $contrasena);//Validacion, regresa true si se encontro coincidencia
$v3 = preg_match($patron3, $contrasena);//Validacion, regresa true si se encontro coincidencia
$v4 = preg_match($patron4, $contrasena);//Validacion, regresa true si se encontro coincidencia

if ($nombre == "" || $contrasena == "" || $contrasena2 == "") {
	echo "<script>
		alert('ERROR. DEBE LLENAR TODOS LOS CAMPOS.');
		location.href='index-5.html';
		</script>";
		 
} else {
	if (strlen($nombre) < 3) {
		echo "<script>
		alert('ERROR. EL NOMBRE DEL USUARIO DEBE TENER AL MENOS 3 CARACTERES.');
		location.href='index-5.html';
		</script>";
	} else {
		if ($contrasena != $contrasena2) {
			echo "<script>
			alert('ERROR. LAS CONTRASEÑAS NO COINCIDEN.');
			location.href='index-5.html';
			</script>";
		} else {
			if (strlen($contrasena) < 8 || (!$v1 || !$v2 || !$v3 || !$v4)) {
				echo "<script>
				alert('¡¡¡¡¡ERROR!!!!!\\nLA CONTRASEÑA DEBE DE TENER AL MENOS 8 CARACTERES.\\nDEBE TENER AL MENOS UNA LETRA MAYUSCULA.". 
					"\\nDEBE TENER AL MENOS UNA LETRA MINNUSCULA.\\nDEBE TENER AL MENOS UN NUMERO Y AL MENOS UN CARACTER ESPECIAL.');
				location.href='index-5.html';
				</script>";
			} else {
				if ($ok == "Registrar" && $nombre != null && $contrasena != null && $contrasena2 != null) {
					//Conexion con el servidor
					$dbh = mysqli_connect("localhost", "admin", "admin") or die("ERROR AL CONECTAR: " . mysqli_error());

					//Seleccionar la BD
					mysqli_select_db($dbh, 'lacura');

					//Instruccion
					$query = "insert into usuarios (nombre_usuario, contrasena) values('".$nombre."','".$contrasena."');";

					//Ejecutar instruccion
					$resultado = mysqli_query($dbh, $query) or die("ERROR AL EJECUTAR EL QUERY");

					echo "<script>
					alert('USUARIO AGREGADO CORRECTAMENTE.');
					location.href='index-5.html';
					</script>";
				}
			}
		}
	}
}
?>