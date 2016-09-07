<?php

	if (isset($_POST['accion'])){


		$_patente 	= $_POST['patente'];
		$_accion 	= $_POST['accion'];

		if($_accion=='Estacionar'){
		
		require_once('estacionamiento.php');
		estacionamiento::Guardar($_patente);

		}


		header('location:Index.php');
	}


?>