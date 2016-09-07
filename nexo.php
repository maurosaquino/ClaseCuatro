<?php

	if (isset($_POST['accion'])){


		$_patente 	= $_POST['patente'];
		$_accion 	= $_POST['accion'];

		if($_accion=='Estacionar'){
		
		require_once('estacionamiento.php');
		estacionamiento::Guardar($_patente);

		header('location:Index.php');

		}elseif($_accion=="Leer"){

		require_once('estacionamiento.php');
		$_milistado = array();
		$_milistado = estacionamiento::Leer();
		var_dump($_milistado);
		echo '<form method="post" action="Index.php">
			  <input type="submit" value="Volver">
			  </form>';

		}else{

		require_once('estacionamiento.php');
		estacionamiento::Sacar($_patente);
		echo '<form method="post" action="Index.php">
			  <input type="submit" value="Volver">
			  </form>';

		}


	}


?>