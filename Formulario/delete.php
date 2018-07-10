<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <?php
      $nombre = $_POST['nombre']; // con esto se captura todo lo que el usuario ingresa

      $servidor = 'localhost';
      $usuario = 'ejemplo';
      $password = '123456789_';
      $baseDatos = 'peliculas';

      // Instrucción para conectar al servidor de base de datos.
      $conexion = mysql_connect($servidor,$usuario,$password)
      or die('No se pudo realizar la conexión:'.mysql_error());
      echo '<p>conexión exitosa!!!</p>';

      mysql_select_db($baseDatos)
      or die('No se puede establecer la conexión con la base de datos');

      $consulta = "Select * from registro where nombre = '$nombre'";

      $resultadoConsulta = mysql_query($consulta)
      or die ('Consulta fallida: '.mysql_error());

      if($existe = mysql_num_rows($resultadoConsulta) > 0){

      $consultaEliminar = "Delete from registro where nombre = '$nombre'";
      $resultadoEliminar = mysql_query($consultaEliminar)
      or die ('Consulta fallida: '.mysql_error());
      //mysql_free_result($resultadoEliminar);
      echo "Registro eliminado";
      }else{
        echo "El registro a eliminar es incorrecto  o no existe";
      }
      // liberamos el resultado de la consulta.
      mysql_free_result($resultadoConsulta);

      // Cerramos conexión
      mysql_close();
    ?>
    <a href='/TrabajoFinal/index.html'>Regresa</a>
  </body>
</html>
