<?php
include('usuarios.php');
$estado = "";
if($_POST){
	
	$nombre = $_POST['txtnombre'];
	$apellido = $_POST['txtapellido'];
	$correo = $_POST['txtcorreo'];
	$pss = $_POST['txtpassword'];
	$pss1 = $_POST['txtpassword_confirm'];
	
	if($pss==$pss1){
		
		$us = new usuarios();
		$us->nombre = $nombre;
		$us->apellido = $apellido;
		$us->correo= $correo;
		$us->clave= $pss;
		$estado=$us->guardar();
	}
	else{
		echo "Claves no concuerdan";
		echo "<a href='signup.php'>Intentar de nuevo</a>";
		$estado="ClavesError";
	}
	
}
?>

<!doctype html>
<html>
<head>
<title>Guardar usuario</title>
<link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.css" type="text/css" />
</head>
<body>
<center>
<h1 class="h1">
<?php
if($estado=="I")
{
  echo "Usuario Insertado Correctamente";
}
else if($estado=="U")
{
  echo "Usuario Actualizado Correctamente";
}
else if($estado=="N")
{
  echo "Error";
}
?>
</h1>
<button class="btn btn-info">
<?php
if($estado!="ClavesError")
{
  echo "<a href='index.php' class='btn btn-info'>Ir a login</a>";
}
else{
echo "<a style='background-color:red;' href='signup.php'>Intentar de nuevo</a>";
}
?>
</button>
</center>
</body>
</html>
