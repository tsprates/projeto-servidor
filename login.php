<?php

session_start();

if ($_POST && ($_POST['username'] == 'test') && ($_POST['password'] == 'test'))
{
	$_SESSION['session_id'] = $_POST['session_id'];
	header('Location: list.php');
}
else
{
	$_SESSION['session_msg'] = '<div class="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Warning!</strong> Usuário não encontrado.
		</div>';
	header('Location: index.php');
}

//var_dump($_SESSION);
