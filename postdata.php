<?php
//  Grava no banco de dados os dados enviados pelo Android.
// ============================
// autor: Thiago Silva
// data:  08/05/2013

// timzone 
date_default_timezone_set('America/Sao_Paulo');
setlocale (LC_ALL, 'pt_BR');

include 'db.php';

header('Content-Type', 'application/json');

if ($_POST && (isset($_POST['api']) && $_POST['api'] == 'teste'))
{
	$sql = sprintf("INSERT 
		INTO 
			coordenadas(telefone, longitude, latitude, data_registro) 
		VALUES
			(?, ?, ?, '%s');", date('Y-m-d H:i:s'));
			
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
		$_POST['telefone'], 
		$_POST['longitude'], 
		$_POST['latitude'])
	);
	
	$return = "true";
} 
else 
{
	$return = "false";
}

// json return
echo json_encode(array('result' => $return));
