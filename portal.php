<?
	include("conexion.php");

	$_GET["nodo"]="ambiente";
	$_GET["contexto"]="infraestructura";
	$_GET["id_filtro"]="1";
?>

<!DOCTYPE HTML>
<head>
<title>Infraestructura y Equipamiento - ESIS - UNJBG</title>
<meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
<script src="js/jquery.openCarousel.js" type="text/javascript"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
</head>
<body>
	<div class="header">
  	<div class="wrap">
			<div class="header_top">
				<div class="logo">
					<a href="index.html" ><img src="images/logo.png" alt="" width='200' height='200' align='left' margin-top="10px" /></a>
					<div class="slider-text">
			   		<h2> INFRAESTRUCTURA Y EQUIPAMIENTO <br/>Escuela Academico profesional en Ingenieria en Informatica y Sistemas</h2>
	  	    </div>
				</div>
				<div class="clear"></div>
  		</div>     
  		<div class="navigation">
  			<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li>
						<a href="index.php">Inicio</a>
					</li>
					<li>
						<a href="#">Infraestructura</a>	
					</li>
					<li>
						<a href="#">Ambientes</a>
						<!--<ul>
							<li>
								<a href="#">Por Finalidad</a>
								<ul>
									<li><a href="#">Académica</a></li>
									<li><a href="#">Proyección Social</a></li>
									<li><a href="#">Administrativa</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Por Edificio</a>
								<ul>
									<li><a href="#">Edificio 1</a></li>
									<li><a href="#">Edificio 2</a></li>
									<li><a href="#">Edificio 3</a></li>
								</ul>
							</li>
						</ul>-->
					</li>
					<li>
						<a href="#">Equipo</a>
						<!--<ul>
							<li>
								<a href="#">Finalidad</a>
								<ul>
									<li><a href="#">Academica</a></li>
									<li><a href="#">Proyeccion Social</a></li>
									<li><a href="#">Administrativa</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Por Edificio</a>
								<ul>
									<li><a href="#">Edificio 1</a></li>
									<li><a href="#">Edificio 2</a></li>
									<li><a href="#">Edificio 3</a></li>
								</ul>
							</li>
							<li>
								<a href="#">Por Ambiente </a>
								<ul>
									<li><a href="#">Ambiente 1</a></li>
									<li><a href="#">Ambiente 2 </a></li>
									<li><a href="#">Ambiente 3</a></li>
								</ul>
							</li>
						</ul>-->
					</li>
					<li></li> <!-- <li></li> para que aparezca la rayita naranja -->
				</ul>
  		</div>
   	</div>
  </div>
  <div class="main">
 	  <div class="content_bottom">
 	    <div class="wrap">
 	    	<div class="content-bottom-left">
					<div class="categories">
					  
						<?
							if($_GET["nodo"]=="ambiente")
							{
						?>
					  
					  <ul>
						  <h3>Infraestructura</h3>

							<?
								$query="call ver_facultades();";
								$result=$conexion->query($query);
								$infra=array();
								while($row = mysqli_fetch_row($result))
								{
									$infra=$row;
								}
								mysqli_free_result($result);
								$conexion->next_result();
							?>

							<?
								for ($i=0; $i<count($infra); $i++)
								{ 
							?>
									<li>
										<a href="#"><? echo $infra[$i]; ?></a>
									</li>
							<?
								}
							?>

				  	</ul>

				  	<ul>
						  <h3>Finalidad</h3>

						  <?
								$query="call ver_finalidades();";
								$result=$conexion->query($query);
								$final=array();
								while($row = mysqli_fetch_row($result))
								{
									$final=$row;
								}
								mysqli_free_result($result);
								$conexion->next_result();
							?>

							<?
								for ($i=0; $i<count($final); $i++)
								{ 
							?>
									<li>
										<a href="#"><? echo $final[$i]; ?></a>
									</li>
							<?
								}
							?>
				  	 

				  	</ul>

				  	<?
				  		}
				  	?>




					</div>
				</div>
    	  <div class="content-bottom-right">
    	    <ul class="back-links">
						<li><a href="#">Inicio</a> ::</li>
						<li><a href="#">Product Page</a> ::</li>
						<li>Product Name</li>
						<div class="clear"> </div>
					</ul>
 					<div class="grid_1_of_4 images_1_of_4">
						<h4><a href="preview.html">Whirlpool LTE5243D 3.4 CuFt.... </a></h4>
					  <a href="preview.html"><img src="images/product-img1.jpg" alt="" /></a>
					  <div class="price-details">
				    	<div class="add-cart">								
								<h4><a href="preview.html">More Info</a></h4>
							</div>
						</div>
						<div class="clear">
						</div>
					</div>	


					<div class="grid_1_of_4 images_1_of_4">
						<h4><a href="preview.html">Whirlpool LTE5243D 3.4 CuFt.... </a></h4>
					  <a href="preview.html"><img src="images/product-img1.jpg" alt="" /></a>
					  <div class="price-details">
				    	<div class="add-cart">								
								<h4><a href="preview.html">More Info</a></h4>
							</div>
						</div>
						<div class="clear">
						</div>
					</div>

					<div class="grid_1_of_4 images_1_of_4">
						<h4><a href="preview.html">Whirlpool LTE5243D 3.4 CuFt.... </a></h4>
					  <a href="preview.html"><img src="images/product-img1.jpg" alt="" /></a>
					  <div class="price-details">
				    	<div class="add-cart">								
								<h4><a href="preview.html">More Info</a></h4>
							</div>
						</div>
						<div class="clear">
						</div>
					</div>	
				</div>
		    <div class="clear"></div>
		   	</div>
      </div>
    </div>
  </div>
  <div class="footer">
  	<div class="wrap">	
			<div class="copy_right">
				<p>Copy rights (c). All rights Reseverd | ESIS - 2015</p>
		  </div>	
		 	<div class="footer-nav">
		  	<ul>
		   		<li><a href="contact.html">Contact Us</a> : </li>
		   	</ul>
		  </div>		
    </div>
  </div>
  <script type="text/javascript">
		$(document).ready(function()
		{			
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
  <a href="#" id="toTop"> </a>
  <script type="text/javascript" src="js/navigation.js"></script>
</body>
</html>