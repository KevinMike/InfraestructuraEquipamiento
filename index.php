<?
	header('Content-Type: text/html; charset=ISO-8859-1');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>INFRAESTRUCTURA Y EQUIPAMIENTO </title>
		<meta charset="ISO-8859-1">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
								<img src="images/boton.png" alt="" width='200' height='200' align='left' margin-top="10px" />
								<h1><a href="index.html" id="logo">INFRAESTRUCTURA Y EQUIPAMIENTO </a></h1>
								<h2><a href="portal.html" id="logo">E.A.P Ingenieria en Informatica y Sistemas </a></h2>
								<hr />
								
							</header>
							<footer>
								<a href="#infra" class="button circled scrolly">Edificios</a><a href=""> - </a>
								<a href="portal.php?nodo=ambiente" class="button circled scrolly">Ambientes</a><a href=""> - </a>
								<a href="portal.php?nodo=equipo" class="button circled scrolly">Equipos</a>
							</footer>
						</div>

					<!-- Nav -->
						
			<!-- Carousel -->
				<section class="carousel" id='infra'>
					<br>
						<br>
						<br>
					<br>
					<h2>Edificios</h2>
					<br>
					<br>
					<br>
					<br>
					<div class="reel">
						
						<?
							include("conexion.php");

							$query="select * from infraestructura;";
							$result=$conexion->query($query);
							$infra=array();
							while($row = mysqli_fetch_row($result))
							{
								$infra[]=$row;
							}
							mysqli_free_result($result);
							$conexion->close();
						?>

						<?
							for ($j=0; $j < 2; $j++) {
							for ($i=0; $i < count($infra); $i++)
							{ 
						?>
								<article>
									<a href="#" class="image featured"><img <? echo "src='https://unjbg.herokuapp.com/media/".$infra[$i][5]."'"; ?> alt="" /></a>
									<header>
										<h3><a href="#"><? echo $infra[$i][1]; ?></a></h3>
									</header>
									<p>Perteneciente a la Facultad de <? echo $infra[$i][2]; ?></p>
									<p>Nro de Pisos: <? echo $infra[$i][3]; ?></p>
									<p>Fecha de Construcción: <? echo $infra[$i][4]; ?></p>
									<footer>
										<a <? echo "href='portal.php?nodo=ambiente&contexto=edificio&filtro=".$infra[$i][1]."'"; ?> class="button circled scrolly">Ambientes</a>
									</footer>
								</article>
						<?
							}}
						?>
				
						
					</div>
				</section>

		
			
							
		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.dropotron.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/jquery.onvisible.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>

	</body>
</html>