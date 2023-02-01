<?php
	session_start();
	
	if(isset($_POST["enviar"])){
		$_SESSION["usuario"]=$_POST["usuario"];
	}
?>
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Iniciar sesión</title>
		<link rel="stylesheet" type="text/css" href="estiloIniciarSesion.css"/>
	</head>
	<body>
	<form action="paginaIniciarSesion.php" method="POST">
	<br><br>
	<img src="imagenes/iconofoto.png" class="img">
	<p class="sesion">Iniciar sesión</p>
				<?php
					if(!isset($_POST["enviar"])){
						}
					else{
							header("Location:paginaPrincipal.php");
						}
				?>
		<div>
			<table>
			<tr>
				<td><input type="text" name="usuario" placeholder="Usuario" class="input1"></td>
			</tr>
			<tr>
				<td><input type="password" name="contraseña" placeholder="Contraseña" class="input"></td>
			</tr>
			</table><br><br><br>
			<input type="submit" name="enviar" class="enviar">
		</div>
		<p><br><a href="paginaInicial.php">Volver atrás</a></p>
	</form>
	</body>
</html>