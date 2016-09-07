<html>
<head>
	<title>Programacion III - Clase IV - Mauro Aquino</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/css" href="animacion.css">
</head>
<body>

	<div class="CajaInicio animated bounceIn">

		<form id="FormIngreso" action="nexo.php" method="post">
			<input type="text" name="patente">
			<input class="MiBotonUTNMenuInicio" type="submit" value="Estacionar" name="accion"> 
			<input class="MiBotonUTNMenuInicio" type="submit" value="Leer" name="accion">
			<input class="MiBotonUTNMenuInicio" type="submit" value="Sacar" name="accion">
		</form>

	</div>

</body>
</html>

<?php

	require_once("nexo.php");

	/* PARA CAMBIAR DE MANERA DINAMICA UN ATRIBUTO EN EL TAG
	<body style="background: <?php echo $_GET['Color']; ?>" >*/

?>