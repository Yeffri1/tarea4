<?php  
 $cn = mysqli_connect($_POST['txtservidor'],$_POST['txtUsuario'],$_POST['txtPassword']);
if($_POST && $cn==true)
{
   $informacion = "<?php
	  define('DB_HOST','{$_POST['txtservidor']}');
      define('DB_NAME','{$_POST['txtdb']}');
      define('DB_USER','{$_POST['txtUsuario']}');
      define('DB_PASS','{$_POST['txtPassword']}');?> ";
    file_put_contents("config.php",$informacion);
	
	  $sql = "CREATE DATABASE IF NOT EXISTS {$_POST['txtdb']};";
	  mysqli_query($cn,$sql);
	
	  $sql1 = "use {$_POST['txtdb']};";
	  mysqli_query($cn,$sql1);

	 
	 $respuesta=tabla_existe('aportaciones');
	 if($respuesta)
	 {
		  $sql2 = "Delete from aportaciones;";
		   mysqli_query($cn,$sql2);
	 }
	 else{
		 
		 	$sql3 = "CREATE TABLE `aportaciones` (
            `Id` int(10) NOT NULL auto_increment,
			`CorreoUser` varchar(50) NOT NULL,
            `Empresa` varchar(50) NOT NULL,
            `RNC` varchar(50) NOT NULL,
            `Color` varchar(50) NOT NULL,
            `Aportacion` int(10) NOT NULL,
            `CantEmpleado` int(10) NOT NULL,
            `Nomeclatura` varchar(1) NOT NULL,
            `Tamano` varchar(50) NOT NULL,
            `Comentario` varchar(100) NOT NULL,
             PRIMARY KEY  (`Id`),
             UNIQUE KEY `Empresa` (`Empresa`,`RNC`))
			 ENGINE=MyISAM  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=23;"; 
      mysqli_query($cn,$sql3);
	}
	
	$respuesta=tabla_existe('user_tarea4');
	 if($respuesta)
	 {
		  $sql4 = "Delete from`user_tarea4`;";
		   mysqli_query($cn,$sql4);
	 }
	 else{
	
		$sql5 = "CREATE TABLE `user_tarea4` (
  `Id` int(10) NOT NULL auto_increment,
  `Nombre` varchar(50) collate ascii_bin NOT NULL,
  `Apellido` varchar(50) collate ascii_bin NOT NULL,
  `Correo` varchar(50) collate ascii_bin NOT NULL,
  `Clave` varchar(50) collate ascii_bin NOT NULL,
  PRIMARY KEY  (`Id`),
  UNIQUE KEY `Correo` (`Correo`)
) ENGINE=MyISAM  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=11 ;"; 
mysqli_query($cn,$sql5);
}
		

  echo"<script>window.location='signup.php'</script>";
 
 
} 
else if(!$cn){
	 
	  echo"<script>window.location='intalador_error.php'</script>";
 }
 else{
	 echo"No hubo post <a href='intalador_error.php' >Intentar de nuevo</a>";
 }

 function tabla_existe($tableName)
{
	require_once 'conexion.php';
	$query = "SELECT COUNT(*) FROM $tableName";
    $result = mysqli_query(conexion::obj(),$query);
	$num_rows = mysqli_num_rows($result);
	if($num_rows)
	{
		return TRUE;
	}
	else
	{

		return FALSE;
	}

}

?>