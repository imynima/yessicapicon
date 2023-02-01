<DOCTYPE html>
<html lang="es">
	<head>
	</head>
	<style>
	body{text-align:center;
		 background-color:#9abcc9;
	    }
	h1{color:white;
	   border:3px ridge grey;
	   margin-left:35%;
	   width:30%;
	  }
	</style>
	<body>
<?php
include("libreriaGeneral.php");    
 
            if (isset($_POST['mandar'])){
				$codigo=$_POST["codigo"];
                $nombre=$_POST['nombre'];
                $vista=$_POST['vista'];
                $puntuacion=$_POST['puntuacion'];
				$comentario=$_POST['comentario'];
				$fecha=$_POST['fecha'];
				$foto=$_FILES['foto']['name'];
				
				$update="UPDATE peliserie SET nombre = '$nombre' WHERE codigo = '$codigo'";
                mysqli_query($link,$update);

				$update="UPDATE peliserie SET vista = '$vista' WHERE codigo = '$codigo'";
                mysqli_query($link,$update);

				$update="UPDATE peliserie SET puntuacion = '$puntuacion' WHERE codigo = '$codigo'";
                mysqli_query($link,$update);
				
				$update="UPDATE peliserie SET comentario = '$comentario' WHERE codigo = '$codigo'";
                mysqli_query($link,$update);
				
				$update="UPDATE peliserie SET fecha = '$fecha' WHERE codigo = '$codigo'";
                mysqli_query($link,$update);
				
				$nombre=$_FILES['foto']['name'];
				$origen=$_FILES["foto"]["tmp_name"];
				$destino=$_SERVER["DOCUMENT_ROOT"]."/yessicaPicon/imagenesSubidas/".$_FILES['foto']['name'];
				move_uploaded_file($origen,$destino);
				$update="UPDATE peliserie SET foto = '$foto' WHERE codigo = '$codigo'";
				mysqli_query($link,$update);
				echo "<img src='imagenes/tirapelicula3.png'><img src='imagenes/tirapelicula3.png'>";
					echo "<h1>Modificando los datos...<br>";
					echo "Espere un momento</h1>";
				echo "<img src='imagenes/tirapelicula3.png'><img src='imagenes/tirapelicula3.png'>";
                echo "<meta http-equiv='refresh' content='3; url=paginaListar.php'/>";
            }  
?>
</body>
</html>