<?php

session_start();

if (empty($_SESSION['session_id']))
{
	$_SESSION['session_not_found'] = true;
	//header('Location: index.php');
}
else
{
	$_SESSION['session_not_found'] = false;
}

//var_dump($_SESSION);

include 'db.php';

$id_map = $_GET['id'];
$sql = "
SELECT
id, data_registro, telefone, latitude, longitude
FROM
coordenadas
WHERE
id = ?";

$stmt = $db->prepare($sql);
$stmt->bindParam(1, $id_map, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Projeto Monografia</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Projeto de Monografia - API de geolocalização do Android">
		<meta name="author" content="Thiago Silva">

		<!-- Le styles -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<style type="text/css">
			body {
				padding-top: 20px;
				padding-bottom: 40px;
			}
			.table th {
				color: white !important;
				background-color: black !important;
				text-align: center;
			}
		</style>
		
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">
			
			<div class="row">
				<div class="span12">
					<div class="offset11 span1"><a href="logout.php" class="btn btn-danger btn-mini"><i class="icon-off"></i> Sair</a></div>
				</div>
				<div class="span12">
					<h3 class="muted">Projeto de Monografia</h3>
				</div>
			</div>
			
			<hr>

			<div class="row">
				<div class="span3"><a href="list.php" class="btn btn-info"><i class="icon-chevron-left"></i> Voltar</a></div>
				<div class="span3"><strong>Tel.</strong> <?php echo $result['telefone']; ?></div>
				<div class="span3"><strong>Lat.</strong> <?php echo $result['latitude']; ?></div>
				<div class="span3"><strong>Lng.</strong> <?php echo $result['longitude']; ?></div>
			</div>
			
			<br />
				
			<div class="row">
				
				
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
											$(function() {
							var map;
							var lat, lng; 
							
							lat = <?php echo $result['latitude']; ?>;
							lng = <?php echo $result['longitude']; ?>
								;

								function initialize() {
									var mapDiv = document.getElementById('google_maps');
									map = new google.maps.Map(mapDiv, {
										center : new google.maps.LatLng(lat, lng),
										zoom : 16,
										mapTypeId : google.maps.MapTypeId.ROADMAP,
										streetViewControl : false
									});

									google.maps.event.addListenerOnce(map, 'tilesloaded', addMarker(lat, lng));
								}


								google.maps.event.addDomListener(window, 'load', initialize);

								function addMarker(lat, lng) {
									return function() {
										var latLng = new google.maps.LatLng(lat, lng);
										var marker = new google.maps.Marker({
											position : latLng,
											map : map
										});
									};
								}

								});
				</script>
				<div class="span12">
					<div id="google_maps" style="width: 100%; height: 400px; border: 1px solid #ccc;"></div>
				</div>
			</div>

			<hr>

			<div class="footer">
				<p>
					&copy; Company 2013
				</p>
			</div>

		</div>
		<!-- /container -->
	</body>
</html>
