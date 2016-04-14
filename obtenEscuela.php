<?php
header("Content-Type: text/html;charset=utf-8");
require_once('conexionh.php');
$conexion=new conexion();
$conexion->conectar();

	echo"<style type='text/css'>
		a:hover{color:#cb9d01;}
	  p {
		font-family:Century Gothic, sans-serif;
		font-size:11%;
		color: #fff;
		}

		p4{
		font-family:Century Gothic, sans-serif;
		font-size:12%;
		color: #fff;
		}

		
		.headers{
		font-size:9px;
		color: #000066;
		}
		
		.tablin{
		font-size:9px;
		color: #fff;
		}
		
		div.tabla_centro{
		text-align: center;
		}

		div.tabla_centro table {
		margin: 0 auto;
		text-align: center;
		}			
		
	</style>";

	$q = $_GET['q'];
	$e = $_GET['e'];
	
	if($q!=null){
		echo "<b>Los alumnos que a continuación aparecen han usado al menos una vez algún paquete didáctico</b>";
		echo "<table border='1' class='headers' align='center' width='100%' cellpadding='0' cellspacing='0'>
			<tr>
				<th width='5%'>Cuenta</th>
				<th width='5%'>Plantel</th>
				<th width='9%'>Nombre</th>
				<th width='5%'>Grupo</th>
				<th width='3%'>Be+</th>
				<th width='3%'>A / An</th>
				<th width='5%'>WH questions</th>
				<th width='5%'>Possessive Adjectives</th>
				<th width='5%'>Family Members</th>
				<th width='5%'>Prepositions of time</th>		
				<th width='5%'>There Is/Are</th>
				<th width='5%'>Q Verb Be – Simple Present</th>
				<th width='5%'>Q Simple Present</th>
				<th width='5%'>Q Articles a and an</th>
				<th width='5%'>Q Wh- Questions</th>
				<th width='5%'>Q Possessive Adjectives</th>
				<th width='5%'>Q Family</th>
				<th width='5%'>Q Prepositions of Time</th>
				<th width='5%'>Q There is / are</th>
			</tr>
		</table>";
		
		$sql="SELECT * FROM `BDalumnos2014` WHERE Plantel='".$q."' and ( p1>0 OR p5>0 OR p6>0 OR p7>0 OR p8>0 OR p16>0 OR p7e>0 OR p1q>0 OR p2q>0 OR p3q>0 OR p4q>0 OR p5q>0 OR p6q>0 OR p7q>0 OR p8q>0)";
		$sql=$conexion->consulta($sql);
		while($row=mysql_fetch_array($sql)){
			echo "<table border='1' class='tablin' align='center' width='100%' cellpadding='0' cellspacing='0'>		
				<tr>
				  <td width='5%'>".$row['Cuenta']."</td>
				  <td width='5%'>".$row['Plantel']."</td>
				  <td width='9%'>".$row['Nombre']."</td>
				  <td width='5%'>".$row['Grupo']."</td>
				  <td width='3%'>".$row['p1']."</td>
				  <td width='3%'>".$row['p7']."</td>
				  <td width='5%'>".$row['p6']."</td>
				  <td width='5%'>".$row['p5']."</td>
				  <td width='5%'>".$row['p8']."</td>
				  <td width='5%'>".$row['p7e']."</td>
				  <td width='5%'>".$row['p16']."</td>
				  <td width='5%'>".$row['p1q']."</td>
				  <td width='5%'>".$row['p2q']."</td>
				  <td width='5%'>".$row['p3q']."</td>
				  <td width='5%'>".$row['p4q']."</td>
				  <td width='5%'>".$row['p5q']."</td>
				  <td width='5%'>".$row['p6q']."</td>
				  <td width='5%'>".$row['p7q']."</td>
				  <td width='5%'>".$row['p8q']."</td>
				</tr>	
			</table>";
		}//Fin del while	
	}//Fin del if $q
	
	else if($e!=null){
		echo "<table border='1' class='headers' align='center' width='10%' cellpadding='0' cellspacing='0'>
			<tr>
				<th width='100%'>Inscritos ".$e."</th>
			</tr>
		</table>";
		
		$sql1="SELECT COUNT(*) as Total FROM BDalumnos2014 where Plantel='".$e."'";
		$sql1=$conexion->consulta($sql1);
		while($row=mysql_fetch_array($sql1)){
			echo "<table border='1' class='tablin' align='center' width='10%' cellpadding='0' cellspacing='0'>		
				<tr>
				  <td width='100%'>".$row['Total']."</td>
				</tr>	
			</table>";
		}
	}//Fin del else if $e

$conexion->desconectar();
?>