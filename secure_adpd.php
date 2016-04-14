<?php
//inicio la sesión
session_start();
//comprueba que el usuario sea válido
if($_SESSION["a1"]!="1"){
	//si no existe, se dirige a la página de inicio 
	header("Location:admPD.html");
	//salimos del script
	exit();
}
?>