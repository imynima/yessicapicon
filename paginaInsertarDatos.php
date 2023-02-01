<?php
include("libreriaGeneral.php");
	session_start();
	
	if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Insertar datos</title>
		<link rel="stylesheet" type="text/css" href="estiloInsertarDatos.css"/>
	</head>
	<body>
	<br><br><div class="header">
		<h2>Introduzca los datos de su serie o película</h2>
	</div>
	<div>
		<form action="paginaInsertarDatos.php" method="POST" enctype="multipart/form-data">
	<br><hr>
		<table>
			<tr>
				<td class="titulo">Código:</td>
				<td><input type="text" name="codigo" required class="input"></td>
			</tr>
			<tr>
				<td class="titulo">Nombre:</td>
				<td><input type="text" name="nombre" required class="input"></td>
			</tr>
			<tr>
				<td class="titulo">Vista: </td>
				<td><input type="radio" name="vista" value="Sí" required class="vista">Sí<br>
				<input type="radio" name="vista" value="No" class="vista">No</td>
			</tr>
			<tr>
				<td class="titulo">Puntuación:</td> 
				<td><input type="number" name="puntuacion" class="input"></td>
			</tr>
				<td class="titulo">Comentario:</td> 
				<td><textarea name="comentario" class="input"></textarea></td>
			</tr>
			<tr>
				<td class="titulo">Fecha finalización:</td>
				<td><input type="date" name="fecha" class="input" ></td>
			</tr>
			<tr>
				<td class="titulo">Insertar foto:</td>
				<td><input type="file" name="foto" required class="input"></td>
			</tr>
		
		</table>
		<br><br>
		<input type="submit" name="enviar" value="Insertar datos" class="enviar"><br>
		
		</form>
	<hr>
	</div>
	<?php
		if(isset($_POST["enviar"])){
			$codigoDB = $_POST["codigo"];
			$nombreDB = $_POST["nombre"];
			$vistaDB = $_POST["vista"];
			$puntuacionDB = $_POST["puntuacion"];
			$comentarioDB = $_POST["comentario"];
			$fechaDB = $_POST["fecha"];
			$fotoDB = $_FILES["foto"]["name"];
			
			insertar($codigoDB,$nombreDB,$vistaDB,$puntuacionDB,$comentarioDB,$fechaDB,$fotoDB,$link);
		}
	?>
	</div>
	<p><br><a href="paginaPrincipal.php" class='inicio'>Volver al inicio</a></p>
	<?php
	}else{
		echo "<h2>No existe la sesión.</h2>";
		echo "<p><br><a href='paginaIniciarSesion.php'>Iniciar sesión</a></p><br><br>";
	}
	?>
	</div>
	</body>
</html>