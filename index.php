<?php
	session_start();
?>	
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Inicio</title>
		<link rel="stylesheet" type="text/css" href="estiloInicial.css" />
	</head>
	<body>
	<form action="index.php" method="POST">
		<div class="texto">
		<h1>Haz que el listado de tus <br> series y películas se mantengan <br> por tiempo ilimitado</h1>
			<p>Introduzca sus series y películas favoritas en esta nueva plataforma <br> para poder guardar
			sus momentos favoritos. Más del 90% de los usuarios <br> quedan satisfechos con este nuevo método para poder ordenar <br> fácilmente sus series y películas vistas o pendientes por ver.</p>
		</div>
			<img src="imagenes/gifanimadopelicula.gif"><br>
		<div class="divAcceder">
			<input type="submit" name="acceder" value="Acceder mediante usuario" class="acceder">
		</div>
		<?php
		if(isset($_SESSION["usuario"])){
			if(isset($_POST["acceder"])){
				header("Location:paginaPrincipal.php");
			}
		}else{
			if(isset($_POST["acceder"])){
				header("Location:paginaIniciarSesion.php");
			}
		}
		?>
	</form>
	</body>
</html>