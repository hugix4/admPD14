<?php
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

	echo "<table border='1' class='headers' align='center' width='10%' cellpadding='0' cellspacing='0'>
		<tr>
			<th width='100%'>Inscritos</th>
		</tr>
	</table>";
	$e = $_GET['e'];
	$sql1="SELECT COUNT(*) as Total FROM BDalumnos2014 where Plantel='".$e."'";
	$sql1=$conexion->consulta($sql1);
	while($row=mysql_fetch_array($sql1)){
		echo "<table border='1' class='tablin' align='center' width='10%' cellpadding='0' cellspacing='0'>		
			<tr>
			  <td width='100%'>".$row['Total']."</td>
			</tr>	
		</table>";
	}

$conexion->desconectar();
?>