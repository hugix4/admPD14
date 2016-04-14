<?php
require('secure_adpd.php');
require_once('conexionh.php');
$conexion=new conexion();
$conexion->conectar();
session_start();
?>
<html>
	<head>
		<link href="Favicon.ico" type="image/x-icon" rel="shortcut icon" />
		 <!--[if lt IE 9]> 
		<script type="text/javascript"> 
	   document.createElement("nav"); 
	   document.createElement("header"); 
	   document.createElement("footer"); 
	   document.createElement("section"); 
	   document.createElement("article"); 
	   document.createElement("aside"); 
	   document.createElement("hgroup"); 
		</script> 
		<![endif]-->
		<title>Coordinaci&oacute;n General de Lenguas UNAM</title>
		<link rel="stylesheet" href="css/hugixR.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="print.css" media="print" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			
			$('ul.tabs li').click(function(){
				var tab_id = $(this).attr('data-tab');

			$('ul.tabs li').removeClass('current');
			$('.tab-content').removeClass('current');

			$(this).addClass('current');
			$("#"+tab_id).addClass('current');
				})

			})
			
			function muestraInfo(str) {
			  if (str=="") {
				document.getElementById("txtMuestra").innerHTML="";
				return;
			  } 
			  if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
				  document.getElementById("txtMuestra").innerHTML=xmlhttp.responseText;
				}
			  }
			  xmlhttp.open("GET","obtenEscuela.php?q="+str,true);
			  xmlhttp.send();
			}
			
			function mInscritos(escuela) {
			  if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			  } else { // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
				  document.getElementById("numEn").innerHTML=xmlhttp.responseText;
				}
			  }
			  xmlhttp.open("GET","obtenEscuela.php?e="+escuela,true);
			  xmlhttp.send();
			}
		</script>
			
			
		</script>
				 
		<!--<div id="loop"><img border="0" alt="Universidad Nacional Aut&oacute;noma de M&eacute;xico, Coordinaci&oacute;n General de Lenguas" src="images/CGLh1a.png"  width="1200px" height="18%" align="center" border="0" usemap="#CGLh"/></a>
			<table border=0 width="100%"><tr><td align="center">
				<map name="CGLh"> 
					<area alt="Universidad Nacional Aut&oacute;noma de M&eacute;xico" shape="rect" coords="0,0,549,120" href="http://www.unam.mx">
					<area alt="Coordinaci&oacute;n General de Lenguas" shape="rect" coords="550,0,1300,120" href="http://www.cgl.unam.mx">
				</map>
			</table>
		</div>-->
	</head>	
	<body>
	
		<style>
			.container{
				width: 100%;
				margin: 0 auto;
			}
			ul.tabs{
				margin: 0px;
				padding: 0px;
				list-style: none;
			}
			ul.tabs li{
				background: #dbae18;
				color: #000;
				display: inline-block;
				padding: 10px 15px;
				cursor: pointer;
			}

			ul.tabs li.current{
				background: #3078ef;
				color: #fff;
			}

			.tab-content{
				display: none;
				background: #3078ef;
				padding: 15px;
			}

			.tab-content.current{
				display: inherit;
			}
			
			div.tabla_centro{
			text-align: center;
			}

			div.tabla_centro table {
			margin: 0 auto;
			text-align: center;
			}
			
			.tablin{
				font-size:11px;
				color: #fff;
				}
			
		</style> 
<!--****************************Esta es la sección destinada a la barra del menú principal de todo el portal********************************************-->	
		<div id="menu">			
			<ul class="menu">
				</br><b style="color: #000066;">Visor de paquetes didácticos</b>										
			</ul>
		</div>
		
		
	<!--****************************Termino de la sección de la barra del menú principal de todo el portal********************************************-->	

		<div id="wrapper"><!-- Aquí se envuelve todo el contenido de la página -->
			<section id="main"><!-- contenido principal y menus laterales -->				        		
				<br/>
				<div class="container">
					<ul class="tabs">
						<li class="tab-link current" data-tab="tab-1"><b>Resultados</b></li>
					</ul>
					<div id="tab-1" class="tab-content current">			
						<form align='center' id="examen" action="result.php" method="POST">
						
						<div class='tabla_centro'>
							<?php
							echo "<table border='1' class='tablin' align='center' width='30%' cellpadding='0' cellspacing='0'>
										<tr align='center'>
											<td width='50%'><font color='#000066'><b>Plantel</b></font></td>
											<td width='50%'><font color='#000066'><b>Total</b></font></td>
										</tr></table>";
							$sql0 = "select  plantel,sum(p1+p2+p3+p4+p5+p6+p7+p8+p9+p10+p11+p12+p13+p14+p15+p16+p17+p18+p19+p20+p21+p22+p23+p24+p25+p26+p27+p28+p29+p1c+p2c+p3c+p4c+p5c+p6c+p7c+p8c+p9c+p10c+p11c+p12c+p13c+p14c+p15c+p16c+p17c+p1e+p2e+p3e+p4e+p5e+p6e+p7e+p8e+p9e+p10e+p11e+p12e+p13e+p14e+p15e+p16e+p17e+p18e+p19e+p20e+p21e+p22e+p23e+p24e+p25e+p26e+p1e6+p2e6+P27E+p3e6+p4e6+p5e6+p6e6+p7e6+p8e6+p1q+p2q+p3q+p4q+p5q+p6q+p7q+p8q) as Total FROM BDalumnos2014 group by plantel order by Total asc";
							$sql0=$conexion->consulta($sql0);
							while($row0=mysql_fetch_array($sql0)){
								echo "<table border='1' class='tablin' align='center' width='30%' cellpadding='0' cellspacing='0'>
										<tr align='center'>
											<td width='50%'>".$row0["plantel"]."</td>
											<td width='50%'>".$row0["Total"]."</td>
										</tr></table>";
							}
							
							echo"<br/><form>
								<select name='users' onchange='muestraInfo(this.value)'>
									<option value=''>Elige una escuela:</option>
									<option value='ENEO'>ENEO</option>
									<option value='ENTS'>ENTS</option>
									<option value='FAD'>FAD</option>
									<option value='FCPYS'>FCPYS</option>
								</select>
								</form>
								<br/><br/>
								<div id='txtMuestra'><b>Aquí se mostrará la información.</b></div>";
							
							echo "<br/><br/><button type='button' onclick=mInscritos('ENEO')>#Inscritos ENEO</button>
											<button type='button' onclick=mInscritos('ENTS')>#Inscritos ENTS</button>
											<button type='button' onclick=mInscritos('FAD')>#Inscritos FAD</button>							
											<button type='button' onclick=mInscritos('FCPYS')>#Inscritos FCPYS</button>";
							echo "<br/><br/><div id='numEn'><b>Aquí se muestran los inscritos de la ENEO.</b></div>";
							
							
							echo "<br/><br/><button type='button'><a href='saliradpd.php' style='color:black'>Cerrar Sesión</a></button>";
							
							?>				
						</div>
					</div>	<!--Tab 1 -->
				</div><!-- container --><br/><br/>
			
			
			
			
			</section><!-- Este es el fin tanto de las barras laterales como de el contenido-->	
			<footer>
				<section id="footer-area">
					<section id="footer-outer-block">
							<aside class="footer-segment">
										<ul>									
											<p class="foot">Hecho en M&eacute;xico, <a href="http://www.unam.mx">Universidad Nacional Aut&oacute;noma de M&eacute;xico (UNAM)</a>, todos los derechos reservados 2009 - 2014. Esta p&aacute;gina puede ser reproducida con fines no lucrativos, siempre y cuando se cite la fuente completa y su direcci&oacute;n electr&oacute;nica, y no se mutile. De otra forma requiere permiso previo por escrito de la instituci&oacute;n.<a href="creditos.html">Cr&eacute;ditos</a></p>
											
										</ul>
							</aside><!-- primer columna del footer -->		
					</section><!-- Aqui se termina el footer editable -->
				</section><!-- Fin del espacio del footer -->
			</footer>
		</div><!-- Fin de la "envoltura" -->
	<!--Ingeniero Hugo Luna a.k.a. hugix4-->
	</body>
</html>