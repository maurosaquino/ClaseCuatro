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
			<input id="button" type="submit" value="Leer" name="accion"> 
			<input id="button" type="submit" value="Sacar" name="accion"> 
			</div>
		</form>
		<BR>

	</div>

</body>
</html>

<?php
	
	if(isset($_REQUEST['accion'])){
	echo '<script> window.onload = window.open ("error.html","mywindow","menubar=0,resizable=1,width=550,height=450");</script>';
	}
	
	require_once('class\estacionamiento.php');
				
	$listautos = array();
	$listautos = estacionamiento::Leer();
	estacionamiento::GenerarTabla($listautos);

	include('C:\xampp\htdocs\ClaseCuatro\Estacionamiento_TP\html\listado.html');

?>