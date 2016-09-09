<html>
<head>
	<title>Programacion III - Clase IV - Mauro Aquino</title>
	<link rel="stylesheet" type="text/css" href="css\estilo.css">
	<link rel="stylesheet" type="text/css" href="css\animacion.css">
</head>
<body>

	<div class="CajaInicio animated bounceIn">

		<form action="nexo.php" method="post">
		<h1>SISTEMA DE INGRESO DE ESTACIONAMIENTO</h1>

			<input type="text" placeholder="Ingrese patente..." name="patente" required><BR><BR>
			<div id="MiBotonUTNMenuInicio">
			<input id="button" type="submit" value="Estacionar" name="accion">   
			<input id="button" type="submit" value="Sacar" name="accion"> 
			</div>
		</form>
		<BR>

	</div>

</body>
</html>

<?php
	
	if(isset($_REQUEST['accion'])){

		$var = $_REQUEST['accion'];
		$var = str_replace('"','',$var);

		if ($var == "errorestacionar"){

		echo '<script> window.onload = window.open ("html/error.html","mywindow","menubar=0,resizable=1,width=550,height=450");</script>';

		unset($_REQUEST['accion']);
		unset($var);

		}elseif($var == "errorsacar"){

		echo '<script> window.onload = window.open ("html/error.html","mywindow","menubar=0,resizable=1,width=550,height=450");</script>';

		unset($_REQUEST['accion']);
		unset($var);

		}elseif($var == "guardado"){

		echo '<script> window.onload = window.open ("html/guardado.html","mywindow","menubar=0,resizable=1,width=550,height=450");</script>';

		unset($_REQUEST['accion']);
		unset($var);	

		}

	}
	
	require_once('class\estacionamiento.php');
				
	$listautos = array();
	$listautos = estacionamiento::Leer();
	estacionamiento::GenerarTabla($listautos);

	include('html\listado.html');

?>