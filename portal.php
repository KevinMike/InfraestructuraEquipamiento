<?
	include("conexion.php");
	header('Content-Type: text/html; charset=ISO-8859-1');

	if(!isset($_GET['nodo']))
	{
		header("Location: index.php");
		exit;
	}

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
					<br><br>
				<div class="logo">
					<a href="index.php" ><img  alt="Logo ESIS" src="images/logo.png" alt="" width='200' height='200' align='left' margin-top="10px" /></a>
					<div class="slider-text">
			   		<h2> INFRAESTRUCTURA Y EQUIPAMIENTO <br/>Escuela Academico profesional en Ingenieria en Informatica y Sistemas</h2>
	  	    </div>
				</div>
				<div class="clear"></div>
  		</div>  
  		<br><br>   
  		<div class="navigation">
  			<a class="toggleMenu" href="#">Menu</a>
				<ul class="nav">
					<li>
						<a href="index.php">Inicio</a>
					</li>
					<li>
						<a href="index.php#infra">Infraestructura</a>	
					</li>
					<li>
						<a href="portal.php?nodo=ambiente">Ambientes</a>
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
						<a href="portal.php?nodo=equipo">Equipo</a>
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

					  <ul>
						  <h3>Edificio</h3>

							<?
								$query="call contexto_edificio();";
								$result=$conexion->query($query);
								$infra=array();
								while($row = mysqli_fetch_row($result))
								{
									$infra[]=$row;
								}
								mysqli_free_result($result);
								$conexion->next_result();
							?>

							<?
								for ($i=0; $i<count($infra); $i++)
								{ 
							?>
									<li>
										<a <? echo "href='portal.php?nodo=".$_GET['nodo']."&contexto=edificio&filtro=".$infra[$i][1]."'"; ?> ><? echo $infra[$i][1]; ?></a>
									</li>
							<?
								}
							?>
				  	</ul>

					  <ul>
						  <h3>Facultad</h3>

							<?
								$query="call contexto_facultad();";
								$result=$conexion->query($query);
								$infra=array();
								while($row = mysqli_fetch_row($result))
								{
									$facu[]=$row;
								}
								mysqli_free_result($result);
								$conexion->next_result();
							?>

							<?
								for ($i=0; $i<count($facu); $i++)
								{ 
							?>
									<li>
										<a <? echo "href='portal.php?nodo=".$_GET['nodo']."&contexto=facultad&filtro=".$facu[$i][1]."'"; ?> ><? echo $facu[$i][1]; ?></a>
									</li>
							<?
								}
							?>
				  	</ul>

				  	<ul>
						  <h3>Finalidad</h3>

						  <?
								$query="call contexto_finalidad()";
								$result=$conexion->query($query);
								$final=array();
								while($row = mysqli_fetch_row($result))
								{
									$final[]=$row;
								}
								mysqli_free_result($result);
								$conexion->next_result();
							?>

							<?
								for ($i=0; $i<count($final); $i++)
								{ 
							?>
									<li>
										<a <? echo "href='portal.php?nodo=".$_GET['nodo']."&contexto=finalidad&filtro=".$final[$i][1]."'"; ?> ><? echo $final[$i][1]; ?></a>
									</li>
							<?
								}
							?>			  	 
				  	</ul>

				  	<?
							if($_GET["nodo"]=="equipo")
							{
						?>

								<ul>
								  <h3>Ambiente</h3>

								  <?
										$query="call contexto_ambiente()";
										$result=$conexion->query($query);
										$ambi=array();
										while($row = mysqli_fetch_row($result))
										{
											$ambi[]=$row;
										}
										mysqli_free_result($result);
										$conexion->next_result();
									?>

									<?
										for ($i=0; $i<count($ambi); $i++)
										{ 
									?>
											<li>
												<a <? echo "href='portal.php?nodo=".$_GET['nodo']."&contexto=ambiente&filtro=".$ambi[$i][1]."'"; ?> ><? echo $ambi[$i][1]; ?></a>
											</li>
									<?
										}
									?>			  	 
						  	</ul>

						<?
								$query="call supercontexto_especificacion()";
								$result=$conexion->query($query);
								$tipo=array();
								while($row = mysqli_fetch_row($result))
								{
									$tipo[]=$row;
								}
								mysqli_free_result($result);
								$conexion->next_result();
								for ($i=0; $i < count($tipo); $i++)
								{ 
						?>
								  <ul>
									  <h3><? echo $tipo[$i][1]; ?></h3>

										<?
											$query="call contexto_especificacion('".$tipo[$i][0]."');";
											$result=$conexion->query($query);
											$espe=array();
											while($row = mysqli_fetch_row($result))
											{
												$espe[]=$row;
											}
											mysqli_free_result($result);
											$conexion->next_result();
										?>

										<?
											for ($j=0; $j<count($espe); $j++)
											{ 
										?>
												<li>
													<a <a <? echo "href='portal.php?nodo=".$_GET['nodo']."&contexto=".$espe[$j][0]."&filtro=".$espe[$j][2]."'"; ?> ><? echo $espe[$j][1]; ?></a>
												</li>
										<?
											}
										?>
							  	</ul>

				  	<?
				  			}
				  		}
				  	?>

					</div>
				</div>
				
    	  <div class="content-bottom-right">
    	    <ul class="back-links">

    	    	<?
    	    		$c_ontexto='';
    	    		if(isset($_GET['contexto']))
    	    		{
    	    			if(is_numeric($_GET['contexto']))
    	    			{
    	    				$query="call nombre_contexto_tipo_especificacion('".$_GET['contexto']."');";
									$result=$conexion->query($query);
									while($row = mysqli_fetch_row($result))
									{
										$c_ontexto=$row[0];
									}
									mysqli_free_result($result);
									$conexion->next_result();
    	    			}
    	    			else
    	    			{
    	    				$c_ontexto=$_GET['contexto'];
    	    			}
    	    		}
    	    		else
    	    	?>
						<li><a href="#">Nodo: <? echo $_GET['nodo']; ?></a> ::</li>
						<li><a href="#">Contexto: <? echo $c_ontexto; ?></a> ::</li>
						<li><a href="#">Filtro: <? if(isset($_GET['filtro'])){echo $_GET['filtro'];} ?></a></li>
						<div class="clear"> </div>
					</ul>

					<?
						// $_GET["nodo"]="equipo";
						// $_GET["contexto"]="infraestructura";
						// $_GET["filtro"]="4";


						if ($_GET["nodo"]=="ambiente")
						{
							if (!isset($_GET["contexto"]))
							{
								$query="call ambiente_contexto_NULL()";
							}
							elseif ($_GET["contexto"]=="edificio")
							{
								$query="call ambiente_contexto_edificio('".$_GET["filtro"]."')";
							}
							elseif ($_GET["contexto"]=="facultad")
							{
								$query="call ambiente_contexto_facultad('".$_GET["filtro"]."')";
							}
							elseif ($_GET["contexto"]=="finalidad")
							{
								$query="call ambiente_contexto_finalidad('".$_GET["filtro"]."')";
							}
						}
						elseif ($_GET["nodo"]=="equipo")
						{
							if (!isset($_GET["contexto"]))
							{
								$query="call equipo_contexto_NULL()";
							}
							elseif ($_GET["contexto"]=="edificio")
							{
								$query="call equipo_contexto_edificio('".$_GET["filtro"]."')";
							}
							elseif ($_GET["contexto"]=="facultad")
							{
								$query="call equipo_contexto_facultad('".$_GET["filtro"]."')";
							}
							elseif ($_GET["contexto"]=="finalidad")
							{
								$query="call equipo_contexto_finalidad('".$_GET["filtro"]."')";
							}
							elseif ($_GET["contexto"]=="ambiente")
							{
								$query="call equipo_contexto_ambiente('".$_GET["filtro"]."')";
							}
							else
							{
								$query="call equipo_contexto_especificacion('".$_GET["contexto"]."','".$_GET["filtro"]."')";
							}
						}
						$result=$conexion->query($query);
						$nodo=array();
						while($row = mysqli_fetch_row($result))
						{
							$nodo[]=$row;
						}
						mysqli_free_result($result);
						$conexion->close();

						if(count($nodo)==0)
						{
							echo "0 resultados";
						}


						for ($i=0; $i < count($nodo); $i++)
						{ 
							if ($_GET["nodo"]=="ambiente")
							{

					?>

 					<div class="grid_1_of_4 images_1_of_4">
						<h4><a <? echo "href='portal.php?nodo=equipo&contexto=ambiente&filtro=".$nodo[$i][1]."'"; ?> ><? echo $nodo[$i][1]; ?></a></h4>
					  <a <? echo "href='portal.php?nodo=equipo&contexto=ambiente&filtro=".$nodo[$i][1]."'"; ?> ><img <? echo "alt='Foto del Ambiente: ".$nodo[$i][1]."'"; ?> <? echo "src='https://unjbg.herokuapp.com/media/".$nodo[$i][7]."'"; ?> /></a>
					  <br>
					  <small>Ubicado en <? echo $nodo[$i][2]; ?></small><br>
						<small>Facultad de <? echo $nodo[$i][3]; ?></small><br>
						<small>Piso <? echo $nodo[$i][4]; ?></small><br>
						<small>Finalidad <? echo $nodo[$i][5]; ?></small><br>
						<small>Capacidad <? echo $nodo[$i][6]; ?></small><br><br>
					  <div class="price-details">
				    	<div class="add-cart">								
								<h4><a <? echo "href='portal.php?nodo=equipo&contexto=ambiente&filtro=".$nodo[$i][1]."'"; ?> >Ver Equipos</a></h4>
							</div>
						</div>
						<div class="clear">
						</div>
					</div>

					<?
							}
							elseif ($_GET["nodo"]=="equipo")
							{
					?>

					<div class="grid_1_of_4 images_1_of_4">
						<h4><a><? echo $nodo[$i][2]; ?></a></h4>
					  <a><img <? echo "src='https://unjbg.herokuapp.com/media/".$nodo[$i][1]."'"; ?> <? echo "alt='Foto del Equipo: ".$nodo[$i][2]."'"; ?> /></a>
					  <br>
					  <small>Codigo Patrimonial <? echo $nodo[$i][3]; ?></small><br>
						<small>Fecha de Adquisición <? echo $nodo[$i][4]; ?></small><br><br>
					  <div class="price-details">
				    	<div class="add-cart">								
								
								<?
							  	$cont_exto='';
							  	$fil_tro='';
							  	if(isset($_GET['contexto']))
							  	{
							  		$cont_exto="&contexto=".$_GET['contexto'];
							  	}
							  	if(isset($_GET['filtro']))
							  	{
							  		$fil_tro="&filtro=".$_GET['filtro'];
							  	}
							  ?>

								<h4><a <? echo "href='preview.php?nodo=".$_GET['nodo'].$cont_exto.$fil_tro."&index=".$i."'"; ?> >Ver Detalles</a></h4>
							
							      </div>
						</div>
						<div class="clear">
						</div>
					</div>

					<?
							}
						}
					?>

				</div>
		    <div class="clear"></div>
		   	</div>
      </div>
    </div>
  </div>
  <br>
  <div class="footer">
  	<div class="wrap">	
			<div class="copy_right">
				<p>Copy rights (c). All rights Reseverd | ESIS - 2015</p>
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