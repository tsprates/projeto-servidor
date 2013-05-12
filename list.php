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

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">

			<div class="row">
				<div class="span12">
					<div class="offset11 span1">
						<a href="logout.php" class="btn btn-danger btn-mini"><i class="icon-off"></i> Sair</a>
					</div>
				</div>
				<div class="span12">
					<h3 class="muted">Projeto de Monografia</h3>
				</div>
			</div>

			<hr>

			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th>Data</th>
					<th>Tel.</th>
					<th>Lat.</th>
					<th>Lng.</th>
					<th>Opções</th>
				</tr>
				<?php

				$sql = "
SELECT
id, data_registro, telefone, latitude, longitude
FROM
coordenadas";

				$stmt = $db->prepare($sql);
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

				//var_dump($result);

				foreach ($result as $i)
				{
					echo '<tr>';
					echo '<td>'.date('H:i:s d/m/Y', strtotime($i['data_registro'])).'</td>';
					echo '<td>'.$i['telefone'].'</td>';
					echo '<td align="right">'.$i['latitude'].'</td>';
					echo '<td align="right">'.$i['longitude'].'</td>';
					echo '<td><a href="map.php?id='.$i['id'].'" class="btn btn-info"><i class="icon-eye-open"></i> Ver mapa</a></td>';
					echo '</tr>';
				}
				?>
			</table>

			<hr>

			<div class="footer">
				<p>
					&copy; Company 2013
				</p>
			</div>

		</div>
		<!-- /container -->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>
