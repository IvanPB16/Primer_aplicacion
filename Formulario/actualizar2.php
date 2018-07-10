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

	$id = $_POST['1'];
	$nombre = $_POST['2'];
	$cantidad = $_POST['3'];
	$date = $_POST['4'];

	//Instrucción para conectar al servidor de base de datos
	$conexion = mysql_connect($servidor,$usuario,$password)
	or die('No se pudo realizar la conexión: '.mysql_error());

	echo '<p>Conexión exitosa!!!</p>';

	mysql_select_db($baseDatos)
	or die('No se puede establecer la conexión con la base de datos');

	$consultaActualizar = "Update registro set nombre='$nombre', cantidad='$cantidad', fecha='$date' where id='$id'";
	$resultadoActualizar = mysql_query($consultaActualizar)
	or die('Consulta fallida: '.mysql_error());

	//mysql_free_result($resultadoEliminar);
	echo "<p>El registro se actualizó exitosamente</p>";

	mysql_free_result($resultadoActualizar);

	//Cerramos la conexión
	mysql_close();

?>
<a href = 'Actualizar.html'>Regresar</a>
</body>
</html>
