<!DOCTYPE html>
<html lang="en">
<head>
    <title>La Cura - Menu</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>

    <!--[if lt IE 9]>
    <html class="lt-ie9">
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a> 
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
 
    <script src='js/device.min.js'></script> 
</head>

<body>
<div class="page">
    <!--========================================================
                              HEADER
    =========================================================-->
    <header>

        <div id="stuck_container" class="stuck_container">
            <div class="container">

                <div class="brand">
                    <h1 class="brand_name">
                        <br>
                        <a href="index.html" class="titulo_cura_2">La Cura</a>
                    </h1>
                </div>

                <nav class="nav">
                    <ul class="sf-menu">
                    <li class="active">
                        <a href="index.html">Inicio</a>
                    </li>
                    <li>
                        <a href="index-1.html">Acerca</a>
                     
                    </li>
                    <li>
                        <a href="index-2.html">Quienes somos</a>
                    </li>
                    <li>
                        <a href="index-3-menu.php">Menu</a>
                    </li>
                    <li>
                        <a href="index-4.html">Administrador</a>
                    </li>
                </ul>
                </nav>
            </div>
        </div>

    </header>
    <!--========================================================
                              CONTENT
    =========================================================-->
    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><em>Nuestro</em>Menu</h2>

                <!--==================================================
                            MENU DE DESPLAZAMIENTO RAPIDO
                ===================================================-->
                <br />
                <div class="container_menu_rapido">
                    <nav class="menu_rapido">
                        <ul>
                            <li><a href="#entradas">Entradas</a></li>
                            <li><a href="#Camarones">Camarones</a></li>
                            <li><a href="#Filetes de pescado">Filetes de Pescado</a></li>
                            <li><a href="#Tostadas">Tostadas</a></li>
                            <li><a href="#Cockteles">Cockteles</a></li>
                            <li><a href="#Caldos y jugos">Caldos y Jugos</a></li>
                            <li><a href="#Tacos">Tacos</a></li>
                            <li><a href="#Bebidas">Bebidas</a></li>
                        </ul>   
                    </nav>
                    <a name="entradas"><br></a>
                </div>

                <?php

                    //conexion a la base de datos
                    $dbh = mysqli_connect("localhost", "admin", "admin") or die("ERROR AL CONECTAR: " . mysqli_error()) ;
                    //Seleccion de la BD
                    mysqli_select_db($dbh, "lacura") or die(mysqli_error()) ;
                    //Consulta
                    $query = "select distinct categoria from imagenes;";
                    //Ejecutamos la consulta
                    $resultado = @mysqli_query($dbh, $query) or die(mysqli_error());

                    

                    //Guarda la categoria en un arreglo. Ciclo para repetir por categoria
                    while ($categoria = mysqli_fetch_row($resultado)) {

                        $n = 0;//Contador para categoria
                        
                        //Consulta para jalar los datos de las imagenes
                        $query1 = "select * from imagenes where categoria = '".$categoria[$n]."';";
                        //Ejecuta la consulta query1
                        $resultado1 = @mysqli_query($dbh, $query1) or die(mysqli_error());
                        $contador = 0;//Cuenta las iteraciones y las imagenes insertadas

                        if ($categoria[$n] == "Entrada") {
                            while ($fila = mysqli_fetch_row($resultado1)) {
                                $ruta = "img-menu/".$fila[1];//Ruta de la imagen
                                $nombre = $fila[2];//Nombre del platillo
                                //$contador2 = 1;
                                $modulo = $contador % 3;

                                if ($modulo == 0) {
                                    echo "<div class='row box-2'>";
                                    if ($contador == 0) {
                                        echo "<h2>Entradas</h2>";
                                    }
                                    echo "<div class='grid_4'>";
                                    echo "<div class='img'><div class='lazy-img' style='padding-bottom: 76.21621621621622%;'>
                                    <img data-src='".$ruta."' alt=''></div></div>";
                                    echo "<h3>".$nombre."</h3>";
                                    echo "</div>";//Cierra el div de grid_4
                                } else {
                                    echo "<div class='grid_4'>";
                                    echo "<div class='img'><div class='lazy-img' style='padding-bottom: 76.21621621621622%;'>
                                    <img data-src='".$ruta."' alt=''></div></div>";
                                    echo "<h3>".$nombre."</h3>";
                                    echo "</div>";//Cierra el div de grid_4
                                }
                                $contador++;
                                if ($contador % 3 == 0) {
                                    echo "</div>";
                                }

                            }//Fin while de fila
                            if ($contador % 3 != 0) {
                                echo "</div>";
                            }
                        } else {
                            while ($fila = mysqli_fetch_row($resultado1)) {
                                $ruta = "img-menu/".$fila[1];//Ruta de la imagen
                                $nombre = $fila[2];//Nombre del platillo
                                //$contador2 = 1;
                                $modulo = $contador % 3;

                                if ($modulo == 0) {
                                    if ($contador == 0) {
                                        echo "<div class='container'>";
                                    }
                                    echo "<div class='row box-2'>";
                                    if ($contador == 0) {
                                        echo "<a name='".$categoria[$n]."'><br /></a>";
                                        echo "<br />";
                                        echo "<h2>".$categoria[$n]."</h2>";
                                    }
                                    echo "<div class='grid_4'>";
                                    echo "<div class='img'><div class='lazy-img' style='padding-bottom: 76.21621621621622%;'>
                                    <img data-src='".$ruta."' alt=''></div></div>";
                                    echo "<h3>".$nombre."</h3>";
                                    echo "</div>";//Cierra el div de grid_4
                                } else {
                                    echo "<div class='grid_4'>";
                                    echo "<div class='img'><div class='lazy-img' style='padding-bottom: 76.21621621621622%;'>
                                    <img data-src='".$ruta."' alt=''></div></div>";
                                    echo "<h3>".$nombre."</h3>";
                                    echo "</div>";//Cierra el div de grid_4
                                }
                                $contador++;
                                //$contador2++;
                                if ($contador % 3 == 0) {
                                    echo "</div>";//Cierra el div de las filas cuando la cantidad de imagenes por fila es 3
                                }
                            }//Fin while fila de else
                            if ($contador % 3 != 0) {
                                echo "</div>";//Cierra el div de las filas cuando la cantidad de imagenes por fila NO es 3
                            }
                            echo "</div>";//Cierra el div con la class="container"
                        }//Fin else
                        
                    }//Fin while para las categorias

?>
                

            </div>
        </section>
    </main>

    <!--========================================================
                              FOOTER
    =========================================================-->
    <footer>
        <div class="container">
            <ul>
                <li>
                    <a href="https://www.facebook.com/MariscosLacura/?fref=ts" class="fa fa-facebook" ><img src="recortadas/fb-logo.png" width="100" height="100"></a></li>
          
            </ul>
        </div>
       
    </footer>
</div>

<script src="js/script.js"></script>
</body>
</html>