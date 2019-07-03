


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio de sesion</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="login-page">
		<div class="form">
	<form class="login-form" action="" method="POST">
		
		<input type="text" name="user" required="" placeholder="usuario" />
		<br>

		<input type="password" name="clave" required=""/ placeholder="clave">
		<br>
		<button type="submit" value="Ingresar">Ingresar </button>
	</form>
	</div>
	</div>
	<?php
		if(isset($_POST['user'])&&isset($_POST['clave'])){
			require_once "php/connect.php";
			require_once "procesos/login.php";
		}
	?>
</body>
</html>