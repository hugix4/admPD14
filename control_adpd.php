<?php
include('conexionh.php');
$conexion=new conexion();
$conexion->conectar();
session_start();
//Se verifica el usuario y su contraseña   
$Cuenta = $_POST[Cuenta];
//*********************************************************************************


$sql = "select Cuenta from BDalumnos2014 where Cuenta =".$Cuenta;	
    $sql=$conexion->consulta($sql);	
	if(mysql_num_rows($sql)>0){	
		$con=mysql_fetch_array($sql);
		if($con[Cuenta]==$Cuenta){
			$_SESSION["a1"]="1";
			$_SESSION["Cuenta"]=$Cuenta;
			$_SESSION["Nombre"]=$con[Nombre];
			 header("Location:admPD.php");
		}		
		else{
			header("Location:admPD.html?DatosIncorrectos");		
		}
		
	}
	else{
			header("Location:admPD.html?NoseEncuentranLosDatos");
			}
	
?>