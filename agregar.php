<?php
//Insertar imagen en la BD 'imagenes' desde el formulario

$ok = $_POST['agregar'];
$nombrep = trim($_POST['nombre']);//Nombre del platillo
$categoria = trim($_POST['categoria']);
//Datos de la imagen almacenados en un arreglo
$_FILES['imagen']['name']; //Nombre del archivo que se va a subir
$_FILES['imagen']['type']; //Tipo de archivo que se va a subir
$_FILES['imagen']['tmp_name'];//Donde esta almacenado el archivo que se va a subir
$_FILES['imagen']['size']; //Tamaño en bytes del archivo que se va a subir
$_FILES['imagen']['error']; //Codigo de error que resultaria en la subida


if($nombrep == "" || $categoria == "" || $_FILES['imagen']['name'] == ""){

	echo "<script> alert('FAVOR DE LLENAR TODOS LOS CAMPOS Y ELEGIR UNA IMAGEN.'); 
	location.href='index-5.html';
	</script>";

} else {

	if ($ok == "Agregar" && $nombrep != null && $categoria != null) {
		//Conexion con el servidor
		$dbh = mysqli_connect("localhost", "admin", "admin") or die("ERROR AL CONECTAR: " . mysqli_error());

		//Seleccionar la BD
		mysqli_select_db($dbh, 'lacura');

		$consulta = "select nombre_platillo from imagenes where nombre_platillo = '".$nombrep."' and nombre_imagen = '".$_FILES['imagen']['name']."';";

		$r2 = mysqli_query($dbh, $consulta) or die("ERROR AL EJECUTAR LA CONSULTA");

		$f1 = mysqli_num_rows($r2);

		if ($f1 != "") {
			echo "<script type='text/javascript'> alert('¡¡¡AVISO!!!\\n EL PLATILLO YA SE ENCUENTRA EN EL MENU.\\n".
							"NO PUEDE AGREGAR DOS PLATILLOS CON EL MISMO NOMBRE O LA MISMA IMAGEN.');
						location.href='index-5.html';</script>";
		} else {
			if ($_FILES['imagen']['error'] > 0) {
			echo "ERROR AL SUBIR LA IMAGEN.";
		} else{
			//Array para verificar la extension del archivo
			$permitidos = array("image/jpg", "image/jpeg", "image/png");

			//Verificar que el tipo de archivo este entre los permitidos
			if (in_array($_FILES['imagen']['type'], $permitidos)) {
				//Ruta donde guardaremos la imagen, el directorio debe estar en el mismo lugar que el script
				$ruta = 'img-menu/'.$_FILES['imagen']['name'];

				

				//Comprobamos si la imagen ya esta en el directorio para no volverla a copiar
				if (!file_exists($ruta)) {
					//Movemos el archivo desde la ruta temporal hacia el directorio
					//Guardamos el resultado del proceso de mover el archivo (0,1)
					$resultado = @move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);//@ obliga a PHP a no mostrar error o advertencia
					if ($resultado) {
						$nombre = $_FILES['imagen']['name'];//Nombre del archivo/imagen
						$query = "insert into imagenes (nombre_imagen, nombre_platillo, categoria) values 
						('$nombre', '$nombrep', '$categoria');";
						//Ejecutamos el query
						@mysqli_query($dbh, $query) or die("ERROR AL EJECUTAR EL QUERY");
						echo "<script type='text/javascript'> alert('PLATILLO AGREGADO CORRECTAMENTE');
						location.href='index-5.html';</script>";
						//header("Location:index-5.html");
					} else{
						echo "ERROR AL MOVER EL ARCHIVO.";
					}
				} else {
					echo "<script type='text/javascript'> alert('¡¡¡AVISO!!!\\n EL PLATILLO YA SE ENCUENTRA EN EL MENU.\\n".
							"NO PUEDE AGREGAR DOS PLATILLOS CON EL MISMO NOMBRE O LA MISMA IMAGEN.');
						location.href='index-5.html';</script>";
				}
			} else {
				echo "ERROR, EL TIPO DE ARCHIVO NO ES VALIDO.";
			}
		}
		}

/*
		$consulta = "select nombre_imagen, nombre_platillo from imagenes;";
				$r2 = mysqli_query($dbh, $consulta) or die("ERROR AL EJECUTAR LA CONSULTA");
				while ($f1 = mysqli_fetch_row($r2)) {
					if ($f1[1] == $nombrep || $f1[0] == $_FILES['imagen']['name']) {
						echo "<script type='text/javascript'> alert('¡¡¡AVISO!!!\\n EL PLATILLO YA SE ENCUENTRA EN EL MENU.\\n
							NO PUEDE AGREGAR DOS PLATILLOS CON EL MISMO NOMBRE O LA MISMA IMAGEN.');
						location.href='index-5.html';</script>";
						//header("Location:index-5.html");
					}
				}
*/
		
	}
}//Fin else js
?>