<?php
session_start();
include('Aportaciones.php');
$ap = new Aportaciones();
$err = isset($_GET['error'])? $_GET['error']:null;
$id_actualizar;
$correo;

	if($_SESSION["loggedin"] == true && isset($_SESSION['loggedin'])) {
		$correo=$_SESSION['username'];
	}

?>
<html>
<head>
<title>Entrar al sitio web</title>
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.css" type="text/css" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="page-wrapper">
			<div class="main-page">
				<div class="login-form">
					<h4>Login</h4>
					<h5><strong>Bienvenido</strong> favor logearse para empezar!</h5>
					<form name="login" action="checklogin.php" method="post">
					<?php
					if($err==1)
					{
						echo "<h1>Usuario o contraseña incorrecto</h1>";
					}
					else if($err==2)
					{
						echo "<h1>Debes iniciar seccion</h1>";
					}
					
					
					?>
						<input type="text" placeholder="Correo" name="txtcorreo" required>
						<input type="password" class="pass" name="txtpass" placeholder="Password" required>
						<div class="clearfix"></div>
						<input class="btn btn-info btn-block" type="submit" value="Sign in">
						
						<p class="center-block mg-t mg-b">No tienes una cuenta?
						<a href="signup.php">Registrate aqui!</a>
						</p>
					</form>
				</div>
		</div>	
	</div>	
</body>
	
</html>