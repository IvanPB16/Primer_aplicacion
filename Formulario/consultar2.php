<html>
    <head>
      <meta charset="utf-8">
    </head>
    <body>
      <?php

        $nombre = $_POST['nombre'];

        $servidor = 'localhost';
        $usuario = 'ejemplo';
        $password = '123456789_';
        $baseDatos = 'peliculas';

          $conexion = mysql_connect($servidor,$usuario,$password)
          or die('No se puedo conectar a la base de datos');

            echo '<p>Conexión exitosa!!!</p>';

            mysql_select_db($baseDatos)
            or die ('No se puede establecer la conexción');

              $consulta = "Select * from registro where nombre = '$nombre'";

            $resultado = mysql_query($consulta)
            or die('Consulta fallida: '.mysql_error());

            echo"<table>\n";
              while ($datos = mysql_fetch_array($resultado,MYSQL_ASSOC)) {
                echo "\t<tr>\t";
                  foreach ($datos as $col_value) {
                    echo "\t<td>\t".$col_value."</td>\n";
                  }
                  echo "\t</tr>\n";
              }
            echo "</table>\n";

            mysql_free_result($resultado);

            mysql_close();
      ?>

      <a href='/TrabajoFinal/index.html'>Regresar</a>
    </body>
  <html>
