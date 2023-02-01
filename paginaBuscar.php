<?php
include("libreriaGeneral.php");

	session_start();

	if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Buscar</title>
		<link rel="stylesheet" type="text/css" href="estiloBuscar2.css"/>
	</head>
	<body>
	<form name="proyecto" action="paginaBuscar.php" method="POST" enctype="multipart/form-data">
	<br><br><div class="header">
		<h1>Busque su serie o película</h1>
	</div>
	<div>
		<h2>¿Qué desea buscar?</h2>
		<input type="text" name="datos" value=
		'<?php
			if(isset($_POST["datos"])){
				echo $_POST["datos"];
			}
		?>'>
		<br><p><input type="submit" name="buscar" value="Buscar" class="buscar"/></p>
        <br>
	 <?php
		if(isset($_POST['buscar'])){          
			if(empty($_POST['datos'])){		
				echo "<br><span>Debe escribir una serie o una película existente.</span>";
			}else{
				$server="localhost";
				$user="root";
				$pass="";
				$database="yessicapicon";;
				$link = mysqli_connect($server,$user,$pass);
				mysqli_select_db($link,$database);
				
				buscar($link);
            }
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
	</form>
	</body>
</html>