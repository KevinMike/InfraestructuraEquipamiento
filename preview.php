<?
	$_GET['nodo']='equipo';
	//$_GET['index']='1';
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
	<title> Infraestructura y Equipamiento - ESIS - UNJBG</title>
	<meta http-equiv="Content-Type" content="text/html"; charset="ISO-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
	<script src="js/jquery.openCarousel.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	<link href="css/easy-responsive-tabs.css" rel="stylesheet" type="text/css" media="all"/>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
          });
		});
	</script>		
	<link rel="stylesheet" href="css/etalage.css">
	<script src="js/jquery.etalage.min.js"></script>
	<script>
		jQuery(document).ready(function($){

			$('#etalage').etalage({
				thumb_image_width: 300,
				thumb_image_height: 400,
				source_image_width: 900,
				source_image_height: 1200,
				show_hint: true,
				click_callback: function(image_anchor, instance_id){
					alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
				}
			});

		});
	</script>
	<script src="js/star-rating.js" type="text/javascript"></script>
</head>
<body>
	<div class="header">
		<div class="wrap">
			<div class="header_top">
				<br><br>
				<div class="logo">
					<a href="index.html" ><img src="images/logo.png" alt="" width='200' height='200' align='left' margin-top="10px" /></a>
					<div class="slider-text">
						<h2> INFRAESTRUCTURA Y EQUIPAMIENTO <br/>Escuela Academico profesional en Ingenieria en Informatica y Sistemas</h2>
					</div>
				</div>
				<div class="clear"></div>
				<br><br>
			</div>     
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
									<li><a href="#">AcadÃ©mica</a></li>
									<li><a href="#">ProyecciÃ³n Social</a></li>
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
	<!------------End Header ------------>
	<div class="main">

		<div class="wrap">
			<div class="content_bottom">
				<div class="section group">

					<div class="content-bottom-left">
							<div class="categories">

							  <?
									if($_GET["nodo"]=="equipo")
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
									$conexion->next_result(); 
								?>

							  <ul>

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

								  <h3><center>
								  	
								  <?
								  	if($_GET['index']!='0')
								  	{
								  ?>
								  	
								  	<a <? echo "href='preview.php?nodo=".$_GET['nodo'].$cont_exto.$fil_tro."&index=".($_GET['index']-1)."'"; ?> > <font color="white"><<<</font> </a> 
								  	

								  <?
								  	}
								  	else
								  	{
								  ?>
								  		 <a> <font color="black"><<<</font> </a> 
								  <?
								  	}
								  		echo "  ".($_GET['index']+1)."  /  ".(count($nodo))."  ";

								  ?> 
								  	
								  <?
								  	if($_GET['index']!=(count($nodo)-1))
								  	{
								  ?>

								  	<a <? echo "href='preview.php?nodo=".$_GET['nodo'].$cont_exto.$fil_tro."&index=".($_GET['index']+1)."'"; ?> > <font color="white">>>></font> </a> 

								  <?
								  	}
								  	else
								  	{
								  ?>
								  		<a> <font color="black">>>></font> </a> 
								  <?
								  	}
								  ?>

								  </center></h3>
								</ul>


								<hr>
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
												<a <? echo "href='preview.php?nodo=".$_GET['nodo']."&contexto=edificio&filtro=".$infra[$i][1]."&index=0'"; ?> ><? echo $infra[$i][1]; ?></a>
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
												<a <? echo "href='preview.php?nodo=".$_GET['nodo']."&contexto=facultad&filtro=".$facu[$i][1]."&index=0'"; ?> ><? echo $facu[$i][1]; ?></a>
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
												<a <? echo "href='preview.php?nodo=".$_GET['nodo']."&contexto=finalidad&filtro=".$final[$i][1]."&index=0'"; ?> ><? echo $final[$i][1]; ?></a>
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
														<a <? echo "href='preview.php?nodo=".$_GET['nodo']."&contexto=ambiente&filtro=".$ambi[$i][1]."&index=0'"; ?> ><? echo $ambi[$i][1]; ?></a>
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
															<a <a <? echo "href='preview.php?nodo=".$_GET['nodo']."&contexto=".$espe[$j][0]."&filtro=".$espe[$j][2]."&index=0'"; ?> ><? echo $espe[$j][1]; ?></a>
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
							<li><a href="#">Nodo: <? echo $_GET['nodo']; ?></a> ::</li>
						<li><a href="#">Contexto: <? if(isset($_GET['contexto'])){echo $_GET['contexto'];} ?></a> ::</li>
						<li><a href="#">Filtro: <? if(isset($_GET['filtro'])){echo $_GET['filtro'];} ?></a></li>
							<div class="clear"> </div>
						</ul>
						<div class="product-details">	
							<div class="grid images_3_of_2">
								<ul id="etalage">
									<li>
										<a href="optionallink.html">
											<img class="etalage_thumb_image" <? echo "src='https://unjbg.herokuapp.com/media/".$nodo[$_GET['index']][1]."'"; ?> />
											<img class="etalage_source_image" <? echo "src='https://unjbg.herokuapp.com/media/".$nodo[$_GET['index']][1]."'"; ?> title="XXX" />
										</a>
									</li>
								</ul>
							</div>
							<div class="desc span_3_of_2">
								<br><br><br><br><br><br><br><br>
								<h2><? echo $nodo[$_GET['index']][2]; ?></h2>
								<div class="price">
									<p>Código Patrimonial: <span><? echo $nodo[$_GET['index']][3]; ?></span></p>
								</div>
								<div class="available">
									<ul>
										<li><span>Fecha de Adquisición: </span> &nbsp; <? echo $nodo[$_GET['index']][4]; ?></li>
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="product_desc">	
							<div id="horizontalTab">
								<ul class="resp-tabs-list">
									<li>Especificaciones</li>
									<div class="clear"></div>
								</ul>
								<div class="resp-tabs-container">
									<div class="product-specifications">
										<ul>
											
											<?
												$query="call ver_especificaciones('".$nodo[$_GET['index']][0]."');";
												$result=$conexion->query($query);
												$table=array();
												while($row = mysqli_fetch_row($result))
												{
													$table[]=$row;
												}
												mysqli_free_result($result);
												$conexion->next_result();
												for ($i=0; $i < count($table); $i++)
												{ 
											?>

											<li><span class="specification-heading"><? echo $table[$i][1]; ?></span> <span><? echo $table[$i][2]; ?></span><div class="clear"></div></li>

											<?
												}
											?>

										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<br><br><br>
</div>

<script type="text/javascript">
	$(document).ready(function() {			
		$().UItoTop({ easingType: 'easeOutQuart' });

	});
</script>
<a href="#" id="toTop"> </a>
<script type="text/javascript" src="js/navigation.js"></script>
</body>
</html>

