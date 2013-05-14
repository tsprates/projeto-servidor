<?php
//  Grava no banco de dados os dados enviados pelo Android.
// ============================
// autor: Thiago Silva
// date: 08/05/2013

// object $db
include 'db.php';

header('Content-Type', 'application/json');

if ($_POST && (isset($_POST['api']) && $_POST['api'] == 'teste'))
{
	$sql = "INSERT 
		INTO 
			coordenadas(telefone, longitude, latitude) 
		VALUES
			(?, ?, ?);";
			
	$stmt = $db->prepare($sql);
	$stmt->execute(array($_POST['telefone'], $_POST['longitude'], $_POST['latitude']));
	
	echo "true";
} 
else 
{
	echo "false";
}
