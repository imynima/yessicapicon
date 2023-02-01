<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "yessicapicon";
$link = mysqli_connect($server,$user,$pass);		
mysqli_select_db($link,$database);


function insertar($codigoDB,$nombreDB,$vistaDB,$puntuacionDB,$comentarioDB,$fechaDB,$fotoDB,$link){
		try {
			$insercion = "INSERT INTO peliserie VALUES('$codigoDB','$nombreDB','$vistaDB','$puntuacionDB','$comentarioDB','$fechaDB','$fotoDB')";
			$resultado=mysqli_query($link,$insercion);
											
			if($resultado){
				echo "<span style='color:#A4E086'><br>¡Datos introducidos han sido registrados con éxito!</span>";
			}
					
			}catch(Exception $e){
				echo "<span style='color:#F67471'> ¡Datos duplicados! Intente con otro código</span>";
			}			
			
	$origen=$_FILES["foto"]["tmp_name"];
	$destino=$_SERVER["DOCUMENT_ROOT"]."/yessicaPicon/imagenesSubidas/".$_FILES['foto']['name'];
			
	move_uploaded_file($origen,$destino);
}	
		

function borrar($link){
		$seleccion = "SELECT * FROM peliserie";
		$resultado = mysqli_query($link,$seleccion);
		$fila = mysqli_fetch_assoc($resultado);
		
	if($fila>0){
	echo "<table>";
			echo "<th>Código</th>";
			echo "<th>Nombre</th>";
			echo "<th>Vista</th>";
			echo "<th>Puntuación</th>";
			echo "<th>Comentario</th>";
			echo "<th>Fecha finalización</th>";
			echo "<th>Imagen</th>";
			echo "<th>Borrar</th>";
			echo "<th>Modificar</th>";
			
            while($fila){
				echo "<tr>";
				echo "<td><strong>".$fila['codigo']."</strong></td>
				<td><strong>".$fila['nombre']."</strong></td>
				<td>".$fila['vista']."</td>
				<td>".$fila['puntuacion']."</td>
				<td>".$fila['comentario']."</td>
				<td>".$fila['fecha']."</td>
				<td><img src=imagenesSubidas/".$fila['foto']." class='foto'/></td>
				<td><button type='submit' name='borrar' value='".$fila['codigo']."' method='post'><img width='35' src='imagenes/borrar.png'></button></td>
				<td><a href='paginaModificar.php'><img src='imagenes/iconomodificar.png' width='35'></a></td>";
				echo "</tr>";
				
				if(isset($_POST["borrar"])){
					$codigo=$_POST["borrar"];
				}
				$fila=mysqli_fetch_assoc($resultado);
			}
            echo "</table>";
	}else{
		echo "<span>No hay nada en la base de datos.</span><br>";
	}
	if(isset($_POST['borrar'])){
		$borrar="DELETE FROM peliserie WHERE codigo = '".$codigo."'";
		$resultado = mysqli_query($link,$borrar);
	}
}
	
	
function modificar($link,$seccion,$accion){
		$seleccion="SELECT $seccion FROM peliserie WHERE codigo = '$accion'";
		$resultado = mysqli_query($link,$seleccion);
		$fin=mysqli_fetch_assoc($resultado);
		echo $fin[$seccion];
}


function listar($fila,$resultado){
	if($fila>0){
	 echo "<table>";
			echo "<th>Código</th>";
			echo "<th>Nombre</th>";
			echo "<th>Vista</th>";
			echo "<th>Puntuación</th>";
			echo "<th>Comentario</th>";
			echo "<th>Fecha finalización</th>";
			echo "<th>Imagen</th>";
			
            while($fila){
				echo "<tr>";
				echo "<td><strong>".$fila['codigo']."</strong></td>
				<td><strong>".$fila['nombre']."</strong></td>
				<td>".$fila['vista']."</td>
				<td>".$fila['puntuacion']."</td>
				<td>".$fila['comentario']."</td>
				<td>".$fila['fecha']."</td>
				<td><img src=imagenesSubidas/".$fila['foto']." class='foto'/></td>";
				echo "</tr>";
				$fila=mysqli_fetch_assoc($resultado);
				}
            
            echo "</table>";
	}else{
		echo "<h1>No hay nada en la base de datos.</h1>";
	}
}


function buscar($link){
	$datos=$_POST["datos"];
	$seleccion = "SELECT * FROM peliserie WHERE nombre = '$datos'";
	$resultado = mysqli_query($link,$seleccion);
	$fila = mysqli_fetch_array($resultado);
	
	if($datos==$fila['nombre']){
		listar($fila,$resultado);
		echo "<p><br><br><br><a href='paginaModificar.php' class='mod'>Click aquí para modificar</a>";
		echo "<a href='paginaBorrar.php' class='borr'>Click aquí para borrar</a></p>";
	}else{
		echo "<br><span>No existe esa película o serie. Inténtelo de nuevo.</span><br>";
	}
}
?>