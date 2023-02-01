<?php
	session_start();
	
	if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Principal 1</title>
		<link rel="stylesheet" type="text/css" href="estiloPaginaPrincipal.css"/>
	</head>
	<body>
	<form action="paginaPrincipal.php" method="POST">
		<div>
			<h1>Bienvenido/a, <?php echo $_SESSION["usuario"] ?> </h1>
			<h2>¿Qué desea hacer?</h2>
		</div>
		<br><br><br>
		<input type="submit" name="insertar" value="Insertar" class="botonInsertar">
		<input type="submit" name="modificar" value="Modificar" class="botonModificar"><br>
		<input type="submit" name="borrar" value="Borrar" class="botonBorrar">
		<input type="submit" name="listar" value="Listar" class="botonListar"><br>
		<input type="submit" name="buscar" value="Buscar" class="botonBuscar">
		<input type="submit" name="cerrar" value="Cerrar sesión" class="botonCerrar">
		<br><br><br>
<?php
		include "libreriaPrincipal.php";
	}else{
		echo "<h2>No existe la sesión.</h2>";
		echo "<p><br><a href='paginaIniciarSesion.php'>Iniciar sesión</a></p><br><br>";
	}
?>
	</form>
	</body>
</html>