<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php
		$servidor = 'localhost';
		$usuario = 'ejemplo';
		$password = '123456789_';
		$baseDatos = 'peliculas';

	$nombre = $_POST['nombre'];
	//Instrucción para conectar al servidor de base de datos
	$conexion = mysql_connect($servidor,$usuario,$password)
	or die('No se pudo realizar la conexión: '.mysql_error());
	echo '<p>Conexión exitosa!!!</p>';
	mysql_select_db($baseDatos)
	or die('No se puede establecer la conexión con la base de datos');

	$consulta = "Select * From Registro where nombre = '$nombre'";

	$resultadoConsulta = mysql_query($consulta)
	or die('Consulta fallida: '.mysql_error());

	//Comprobar que realmente existen registros con base en el filtro
	if ($existe = mysql_num_rows($resultadoConsulta) > 0){
		if($datos = mysql_fetch_array($resultadoConsulta,MYSQL_ASSOC)) {
			echo "<form name='actualizar' action='actualizar2.php' method='post'>";
			$nombre = 1;
			foreach ($datos as $col_value) {
				echo "<input type='text' placeholder='".$col_value."' name='".$nombre."'/>";
				$nombre = $nombre + 1;
			}
			echo "<br><br><input type='submit' value='Actualizar' />";
			echo "</form>";
		}
	}else{
		echo "<p>El registro que deseas actualizar no existe o es incorrecto el nombre introducido</p>";
	}

	mysql_free_result($resultadoConsulta);

	//Cerramos la conexión
	mysql_close();

?>
<a href = 'Actualizar.html'>Regresar</a>
</body>
</html>
