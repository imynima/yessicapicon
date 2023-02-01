<?php
include("libreriaGeneral.php");
	session_start();
	
	
	if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Listar</title>
		<link rel="stylesheet" type="text/css" href="estiloListar2.css"/>
	</head>
	<body>
		<br><br><div class="titulo">
			<h2>Listado de películas y series</h2>
		</div>
		<div>
		<?php
			$server="localhost";
			$user="root";
			$pass="";
			$database="yessicapicon";
			$link = mysqli_connect($server,$user,$pass);
			mysqli_select_db($link,$database);
			$seleccion = "SELECT * FROM peliserie";
			$resultado = mysqli_query($link,$seleccion);
			$fila = mysqli_fetch_assoc($resultado);
			 
			listar($fila,$resultado);
		?>
		</div>
		<p><br><a href="paginaPrincipal.php" class='inicio'>Volver al inicio</a></p>
	<?php
	}else{
		echo "<h2>No existe la sesión.</h2>";
		echo "<p><br><a href='paginaIniciarSesion.php'>Iniciar sesión</a></p><br><br>";
	}
	?>
	</body>
</html>