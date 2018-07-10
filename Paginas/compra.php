<?php
  if(isset($_POST['nombre']) && !empty($_POST['nombre']) &&
     isset($_POST['cantidad']) && !empty($_POST['cantidad']) &&
     isset($_POST['fecha']) && !empty($_POST['fecha'])
  ){

    $servidor = 'localhost';
    $usuario = 'ejemplo';
    $password = '123456789_';
    $baseDatos = 'peliculas';

    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $date = $_POST['fecha'];

    $conexion = mysql_connect($servidor,$usuario,$password) or die
    ('Problemas de conexión con la base de Datos');

    $dB = mysql_select_db($baseDatos,$conexion)
    or die('Problemas de conexión') ;

    if(!$dB){
      die("No se puede utilizar la base de dato".mysql_error($conexion));
    }else{
      mysql_query("INSERT INTO registro (nombre,cantidad,fecha) VALUES('$nombre','$cantidad','$date')",$conexion);

      echo "<p>Datos insertados en la base de datos!!!</p>";
      echo "<p>Pulsa <a href='../index.html'>aquí</a> para comprar nuevamente</p>";

      }
    }else{
        echo "<p>Problemas al insertar los datos</p><br>";
      }
?>
