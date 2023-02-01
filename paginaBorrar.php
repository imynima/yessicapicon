<?php
include("libreriaGeneral.php");

	session_start();

	if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Borrar</title>
		<link rel="stylesheet" type="text/css" href="estiloBorrar2.css"/>
	</head>
	<style>
	</style>
	<body>
	<form action="paginaBorrar.php" method="POST" enctype="multipart/form-data">
	<br><br><div class="header">
		<h1>Eliminar películas o series</h1>
	</div>
	<div><br><hr><br>
		<?php
			$server="localhost";
			$user="root";
			$pass="";
			$database="yessicapicon";
			$link = mysqli_connect($server,$user,$pass);
			mysqli_select_db($link,$database);

			borrar($link);
		?>
		<br><br></div>
		<p><br><a href="paginaPrincipal.php" class='inicio'>Volver al inicio</a></p>
	<?php
	}else{
		echo "<h2>No existe la sesión.</h2>";
		echo "<p><br><a href='paginaIniciarSesion.php'>Iniciar sesión</a></p><br><br>";
	}
	?>
	</form>
	</body>
</html>