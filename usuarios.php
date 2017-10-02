<?php
include('conexion.php');

class Usuarios{
	
	public $id;
	public $nombre;
	public $apellido;
	public $correo;
    public $clave;
	
	function _get($atributo){
		
		if(isset($this->$atributo))
		{
			return $this->atributo;
		}
		else{
			return 'N/A';
		}
		
	}
	function _set($atributo,$valor){
		
		if(isset($this->$atributo))
		{
			$this->$atributo=$valor;
		}
		else{
			echo "No existe el atributo {$atributo}";
		}
		
	}
	function guardar()
	{   
	    $estado = "N";
		$cn = conexion::obj();
		
		if($cn->connect_error){
			die('Error al conectar' . $cn->connect_error);
		}
		$sql = "Select * from user_tarea4 where Correo='{$this->correo}';";
		$result = $cn->query($sql);
         
		 if ($result->num_rows > 0) 
		{
			$sql_actualizar = "Update user_tarea4 set Nombre='{$this->nombre}',Apellido='{$this->apellido}',Clave='{$this->clave}' where Correo='{$this->correo}';";
			mysqli_query(conexion::obj(),$sql);
			$estado="U";
		}
		else{
			
		 $sql = "INSERT INTO `user_tarea4` (`Nombre` ,`Apellido` ,`Correo` ,`Clave`)VALUES('{$this->nombre}','{$this->apellido}','{$this->correo}','{$this->clave}');";
		 mysqli_query(conexion::obj(),$sql);
		 $estado="I";
		}
		return $estado;
		
	}
	
	
} 


?>