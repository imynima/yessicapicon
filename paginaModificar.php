<?php
include("libreriaGeneral.php");

	session_start();

	if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html lang="es"><meta charset="UTF-8">
	<head>
		<title>Modificar</title>
		<link rel="stylesheet" type="text/css" href="estiloModificar.css"/>
	</head>
	<body>
	<form action="paginaModificar.php" method="POST" enctype="multipart/form-data">
	<br><br><div class="header">
		<h1>Modificar películas o series</h1>
	</div>
	<div>
		<div class="divselect">
		<select name="seleccion" class="select">
            <option value='0'>Seleccione:</option>
                <?php
                $server = "localhost";
				$user = "root";
			    $pass = "";
		        $database = "yessicapicon";
		        $link = mysqli_connect($server,$user,$pass);
				mysqli_select_db($link,$database);
				
                $seleccion = "SELECT * FROM peliserie";
				$resultado = mysqli_query($link,$seleccion);
				
				while($fila = mysqli_fetch_array($resultado)){
					echo "<option value='".$fila['codigo']."'>".$fila['nombre']."</option>";
				}
                            
                ?>
        </select><br>	
		<p><input type="submit" name="seleccionar" value="Seleccionar"/></p>
		</div><br>
	</form>
<?php

		if (isset($_POST['seleccionar'])){
			if(empty($_POST['seleccion'])){
				echo "<br><span>Debe seleccionar una película o serie.</span>";
			}else{
?>
	<form name="modificar" action="paginaModificar2.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Código</th>
				<td><input type="text" name="codigo" readonly value=
				'<?php
					modificar($link,'codigo',$_POST["seleccion"]);
                 ?>'/></td>
			</tr>
			<tr>
				<th>Nombre</th>
				<td><input type="text" name="nombre" required value=
				'<?php
					modificar($link,'nombre',$_POST["seleccion"]);
                 ?>'></td>
			</tr>
			<tr>
				<th>Vista</th>
				<td><input type="radio" name="vista" value="si" required>Sí
				<input type="radio" name="vista" value="no">No</td>
			</tr>
			<tr>
				<th>Puntuación</th>
				<td><input type="number" name="puntuacion" placeholder="Número entre 0 y 10" value=
				'<?php 
					modificar($link,'puntuacion',$_POST["seleccion"]);
				?>'></td>
			</tr>
			<tr>
				<th>Comentario</th>
				<td><textarea name="comentario" class="textarea" value=
				'<?php
					modificar($link,'comentario',$_POST["seleccion"]);
                 ?>'></textarea></td>
			</tr>
			<tr>
				<th>Fecha finalización</th>
				<td><input type="date" name="fecha" class="fecha" value=
				'<?php
					modificar($link,'fecha',$_POST["seleccion"]);
                 ?>'></td>
			</tr>
			<tr>
				<th>Imagen</th>
				<td><input type="file" name="foto" class="foto" required value=
				'<?php
					modificar($link,'foto',$_POST["seleccion"]);
                 ?>'></td>
			</tr>
		</div>
		</table>
	<br><p><input type="submit" name="mandar" value="Modificar" class="modificar"/></p><br>
<?php			
			
			}
			
		}
?>
	<p><br><a href="paginaPrincipal.php">Volver al inicio</a></p>
<?php
	}else{
		echo "<h2>No existe la sesión.</h2>";
		echo "<p><br><a href='paginaIniciarSesion.php'>Iniciar sesión</a></p><br><br>";
	}
?>
	</form>
	</body>
</html>