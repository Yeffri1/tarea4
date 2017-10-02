<?php
session_start(); 
include('conexion.php');

$conexion = conexion::obj();

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
$username = $_POST['txtcorreo'];
$password = $_POST['txtpass'];
$sql = "SELECT * FROM user_tarea4 WHERE Correo = '$username' and Clave='$password'";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {     
 
 $row = $result->fetch_array(MYSQLI_ASSOC);
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (90 * 60);
?>

 
 <!doctype html>
 <html>
 
 <head>
 <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="bootstrap\css\bootstrap-theme.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
 
 <body>
 
 <center>
 
 <h1 class="h1">
 <?php  echo "Bienvenido! " . $_SESSION['username'];  ?>
 </h1>
 
 <button class="btn btn-success">
 <a  href="inicio.php">Ir a Panel de Control</a>
 </button> 
 
 </center>
 
 </body>

 </html>
 
 <?php
}
 else { 
   echo "<center><h2 class='h2'>Username o Password estan incorrectos.</h2></center>";

   echo "<center><button><a href='index.php'>Volver a Intentarlo</a></button></center>";
   
 }
 ?>

 
 
 
 
 
 