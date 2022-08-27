<?php session_start();?>
<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
//sesion_destroy();
//print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="css1/estilos2.css">
	<link rel="stylesheet" href="whatsapp.css">
	<link rel="stylesheet" href="Productos/index2">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<title>Carrito de compras</title>
</head>
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
            <li><a class="active" href="sala.php">Sala</a></li>
			<li><a class="active" href="gamers.php">Gamers</a></li>
            <li><a class="active" href="habita.php">Habitacion</a></li>
            <li><a class="active" href="cocina.php">Cocina</a></li>
			<li><a class="active" href="estudio.php">Estudio</a></li>
            <p><li><a href="index.php">Salir</a></li></p>
			
        </center></ul>
</header>

<?php 

$carrito_mio=$_SESSION['carrito'];
$_SESSION['carrito']=$carrito_mio;

// contamos nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
    if($carrito_mio[$i]!=NULL){ 
    $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    $totalcantidad += $total_cantidad;
    }}}
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Todos los productos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
           <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END NAVBAR -->



<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
<div class="modal-body">
<div>
<div class="p-2">
<ul class="list-group mb-3">
<?php
if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){
						
            ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span   style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> $</span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">Total (COP)</span>
							<strong  style="text-align: left; color: #000000;"><?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}}}
							echo $total; ?> $</strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->





<!-- ARTICULOS -->
<!-- ESTUDIO -->

<div class="row" style="justify-content: center;">

<div class="separador text-center text-white">
<h5 class="texto"><br>ESTUDIO <img src="img/icons/estudio.png" alt=""></h5>
	</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1350000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 1" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/estudio1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio en madera Lannister</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 110 X ALTO: 85 X PROFUNDO: 48
			Escritorio en madera Lannister en color Duna. Escritorio moderno elaborado 
			en madera procesada con enchapado melánico.
               <br>Precio $1'350'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1550000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 2" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/estudio2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio en madera Mikasa</h5>
                        <p class="card-text">Descripción 
                        NCHO: 101.5 X ALTO: 88.6 X PROFUNDO: 50
			Escritorio en madera con espacio para impresora, ideal para hogares y oficinas.
                <br>Precio $1'550'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1550000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 3" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/estudio3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio Biblioteca Galicia</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 120 X ALTO: 115 X PROFUNDO: 40
			Escritorio con Biblioteca Galicia, cuenta con varios comportamientos ideales para libros, 
			Revistas o Artículos Decorativos
               <br>Precio $1'550'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1200000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 4" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/estudio4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mix escritorio y repisa en madera sencillo</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 80.44 X ALTO: 73 X PROFUNDO: 40
			Mix escritorio en madera sencillo con un cajón con puerta abatible
                        y una repisa con dos entrepaños fijos, la puedes poner repisa pared o repisa piso.
                <br>Precio $1'200'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<!-- SALA -->
<div class="separador text-center text-white">
<h5 class="texto"><br>SALA <img src="img/icons/sala.png" alt=""></h5>
	</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1350000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 5" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/sala1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio en madera Lannister</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 160 X ALTO: 59 X PROFUNDO: 40
			Urban para TV 65" cuenta con un entrepaño ideal para consolas y dos compartimientos 
			a los extremos con puertas abatibles, el soporte en sus patas metálicas le da un toque moderno.
               <br>Precio $1'350'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1250000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 6" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/sala2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mesa TV 65"</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 160 X ALTO: 48.9 X PROFUNDO: 35
			Mueble para televisor hasta 65" pulgadas, con varios compartimiento ideal para consolas, parlantes de sonido y artículos decorativos.
			Acabado con recubrimiento melaminico por dentro y por fuera, resistente al calor, a la humedad y a los rayones, apariencia moderna, 
			mayor duración. Este producto cuenta con 5 años de garantía.
                <br>Precio $1'250'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1150000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 7" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/sala3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mesa flotante TV Good</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 120 X ALTO: 35 X PROFUNDO: 30
			Mesa flotante TV Good, cuenta con dos compartimientos perfectos para guardas objetos 
			y un entrepaño ideal para articulos decorativos.
               <br>Precio $1'150'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1350000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 8" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/sala4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mesa TV Flat TV 65"</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 160 X ALTO: 50 X PROFUNDO: 40
			Mueble para televisor hasta 65" pulgadas, con compartimiento intermedio para consolas, cajon lateral. 
			Acabado con recubrimiento melaminico por dentro y por fuera, resistente al calor, a la humedad y a los rayones, 
			apariencia moderna, mayor duracion. Este producto cuenta con 5 años de garantia.
                <br>Precio $1'350'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>

<!-- GAMERS -->

<div class="separador text-center text-white">
<h5 class="texto"><br>GAMERS <img src="img/icons/gamers.png" alt=""></h5>
	</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1250000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 9" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/game1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio Gamer Morfeo 150</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 150 X ALTO: 76,9 X PROFUNDO: 60CM
						
			El escritorio morfeo cuenta con una amplia superficie de trabajo, con una base de 150 cm, 
			área de almacenamiento lateral y espacio para torre que permite colocar de múltiples formas
               <br>Precio $1'250'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1450000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 10" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/game2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio Gamer Trinity</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 120X 77 X 60,2
								
			Escritorio novedoso con modulo para torre que permite colocarlo de múltiples formas, 
			es decir configuración izquierda o derecha
                <br>Precio $1'450'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1100000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 11" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/game3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio Gamer</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 120 X ALTO: 88 X PROFUNDO: 52
			Escritorio Gamer cuenta con dos compartimentos en los que se pueden organizar diferentes 
			objetos que se requieran para las tareas o trabajo diario. tiene un cajón con correderas metálicas,
			un área de almacenamiento cerrado con puerta abatible.
               <br>Precio $1'100'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1500000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 12" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/game4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Escritorio Gamer Max</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 150 X ALTO: 88 X PROFUNDO: 52
			El escritorio Gamer tiene una amplia superficie de trabajo, cuenta con una base hasta para dos monitores de 32 pulgadas cada uno,
                        tiene un cajón con correderas metálicas, un área de almacenamiento cerrado con puerta abatible.
                <br>Precio $1'500'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<!-- HABITACION -->
<div class="separador text-center text-white">
<h5 class="texto"><br>HABITACION <img src="img/icons/habita.png" alt=""></h5>
	</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1600000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 13" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/habita1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Nido Multifuncional</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 233.4 X ALTO: 96.5 X PROFUNDO: 96.3
									
			Cama nido multifuncional, cuenta con dos camas para colchones de 90 cm Ancho x 190 cm largo x 
                        altura máxima 18 cm (No Incluido), soporte para tv y escritorio extensible.
               <br>Precio $1'600'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1300000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 14" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/habita2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Cama Alcala</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 200 X ALTO: 200 X PROFUNDO: 50
			Closet 4 puertas, 4 cajones, tubos metalicos superiores, 4 entrepaños modulares. Las puertas y cajones vienen con sistema push to open. Amplio espacio para almacenamiento.
			Ideal para tu hogar. El mueble es fabricado en MDP con recubrimiento melaminico de alta resistencia y tiene 5 años de garantía.
                <br>Precio $1'300'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1300000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 15" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/habita3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Closet Burdeos</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 200 X ALTO: 200 X PROFUNDO: 50
                        Cama doble de 1.40 mts con almacenamiento superior, para colchón de 140 cm Ancho * 190 cm Largo (No incluido), incluye 2 mesas de noche con cajón y nicho, 2 espacios para colgar
			ropa con tendero móvil, y un cajón superior con entrepaño, 2 puertas abatibles y 2 puertas corredizas, la cama No es abatible.
               <br>Precio $1'300'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1450000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 16" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/habita4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Base Cama Flotante Bali 100</h5>
                        <p class="card-text">Descripción 
                        Base Cama Flotante Bali 100 para colchón de 100 cm ancho * 190 cm largo (no incluido).
                <br>Precio $1'450'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>
<!-- SALA -->
<div class="separador text-center text-white">
<h5 class="texto"><br>COCINA <img src="img/icons/cocina.png" alt=""></h5>
	</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1200000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 17" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/cocina1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mueble Auxiliar Torre para Microondas</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 60,2 X ALTO: 170 X PROFUNDO: 43,3
			Mueble Auxiliar Microondas con entrepaños ajustables y puertas abatibles.
               <br>Precio $1'200'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1300000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 18" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/cocina2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mueble Superior para Microondas</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 60 X ALTO: 70,3 X PROFUNDO: 39,7
			Mueble de cocina para Microondas con almacenamiento superior, cuenta 
                        con una puerta abatible con brazo neumático para fácil apertura, no incluye electrodomésticos.
                <br>Precio $1'300'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1050000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 19" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/cocina3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mueble Superior de Cocina</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 150 X ALTO: 60.2 X PROFUNDO: 31.5
			Mueble Superior de Cocina con opcion de armar en el lado Izquierdo o Derecho cuenta con espacio para campana. Elaborado con madera tipo MDP,
			acabado con recubrimiento melaminico por dentro y por fuera, resistente al calor, a la humedad y a los rayones.
               <br>Precio $1'050'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>



<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="cart.php">
        <input name="precio" type="hidden" id="precio" value="1000000" />
        <input name="titulo" type="hidden" id="titulo" value="articulo 20" />
        <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
        <img src="img/cocina4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Mueble Auxiliar Alicante</h5>
                        <p class="card-text">Descripción 
                        ANCHO: 60X ALTO: 168,9 X PROFUNDO: 40,5
			Mueble auxiliar diseñado para almacenar utensilios de cocina, alimentos, ropa hogar, cobijas, toallas y más, cuenta con 2 puertas,
			1 entrepaño fijo y 4 móviles.
                <br>Precio $1'000'000</p>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                </div>
        </form>
</div>


</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>