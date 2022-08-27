<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Agregue</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,700,700i|Open+Sans:400,700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css1/estilos2.css">
	<link rel="stylesheet" href="whatsapp.css">
	<link rel="stylesheet" href="Productos/index2">
<body>
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=3244172455&text=Hola,%20bienvenidos" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
<header class="Tituloosm">       
<div class="barra">
				<h2>Categorias<img src="img/menu.png" alt=""  width="50" height="50"></h2>
           <ul>
              <p><li><a class="active" href="index1.php">Inicio</a></li></p>
              <p><li><a href="index.php">Salir</a></li></p>
			
</center></ul>
</div> 
</header>
<header>
	<article class="#">
			<footer class="row justify-content-center redes-sociales">
							
							<p class="#">E BUSINESS CJ</p> 					
</header>
<main class="container">
		<div class="row nosotros justify-content-center">
			<div class="col-12 text-center">
			
				<h3 class="titulo">Agregue, modifique o elimine</h3>
				
			</div>
		</div>

			
		
	</div>
	<div class="container-fluid">
		<section class="contacto row justify-content-center">
			<div class="col-12 col-md-9 text-center">
				<h2 class="subtitulo"></h2>
			</div>

	

			
	<div class="row productos">
			<article class="col-12 text-center">
				
				<p class="titulo">Agregar, modificar o eliminar producto:</p>
				
			</article>

			<div class="col-12">
				<div class="row justify-content-center">
					
						
							

					<div class="todo">
            <div id="cabecera">
			<img src="#" class="img-fluid" alt="">
            </div>

            <div id="contenido">
                <table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
                    <thead><center>
                        <th>No.</th>
                        <th>Id</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th><a href="nuevo_prod1.php"><button type="button" class="btn btn-info">Nuevo</button></a></th>
                    <center></thead>
</main>
<div id="footer">
                <img src="img/fondo.jpg" id="">
            </div>
</div>
            
<?php include "conexion.php";
$sentencia = "SELECT * FROM productos";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion)); 
while($fila = $resultado->fetch_assoc()){
    echo "<tr>";
        echo "<td>"; echo $fila['no']; echo "</td>";
        echo "<td>"; echo $fila['id_producto']; echo "</td>";
        echo "<td>"; echo $fila['nombre']; echo "</td>";
        echo "<td>"; echo $fila['descripcion']; echo "</td>";
        echo "<td><a href='modif_prod1.php?no=".$fila['no']."'> <button type='button' class='btn btn-success'>Modificar</button></a></td>";
        echo "<td><a href='eliminar_prod.php?no=".$fila['no']."'> <button type='button' class='btn-danger'>Eliminar</button></a></td>";
        echo "</tr>";
    }
    
?>
			</div>
        </div>
	</main>


            
                
            
	
	<script src="js1/main.js"></script>
	
</body>

</html>
