<?php

session_start();
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
		<style type="text/css">
			body {
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #f5f5f5;
			}

			.form-signin {
				max-width: 300px;
				padding: 19px 29px 29px;
				margin: 0 auto 20px;
				background-color: #fff;
				border: 1px solid #e5e5e5;
				-webkit-border-radius: 5px;
				-moz-border-radius: 5px;
				border-radius: 5px;
				-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
				-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
				box-shadow: 0 1px 2px rgba(0,0,0,.05);
			}
			.form-signin .form-signin-heading, .form-signin .checkbox {
				margin-bottom: 10px;
			}
			.form-signin input[type="text"], .form-signin input[type="password"] {
				font-size: 16px;
				height: auto;
				margin-bottom: 15px;
				padding: 7px 9px;
			}

		</style>
		<link href="css/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>

	<body>

		<div class="container">

			<form class="form-signin" action="login.php" method="post">
				<h2 class="form-signin-heading">Seja Bem-Vindo!</h2>

				<?php
				// usuário não encontrado na sessão
				if (empty($_SESSION['session_id']) && !empty($_SESSION['session_msg']))
				{
					echo $_SESSION['session_msg'];
					unset($_SESSION['session_id'], $_SESSION['session_msg']);
				}
				?>

				<input type="text" class="input-block-level" name="username" placeholder="User">
				<input type="password" class="input-block-level" name="password" placeholder="Password">
				<button class="btn btn-large btn-primary" type="submit">
					OK
				</button>
				<input type="hidden" name="session_id" value="<?php echo rand(); ?>" />
			</form>

		</div>
		<!-- /container -->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>
