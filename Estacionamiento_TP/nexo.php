<?php

	if (isset($_POST['accion'])){


		$_patente 	= $_POST['patente'];
		$_accion 	= $_POST['accion'];

		if($_accion=='Estacionar'){
		
		require_once('class\estacionamiento.php');
		estacionamiento::Guardar($_patente);

		header('location:Index.php');

		}elseif($_POST['accion']=='Leer'){

				header('location:Index.php');

		}else{

		require_once('class\estacionamiento.php');
		$retorno = estacionamiento::Sacar($_patente);
		echo $retorno;
		echo '<form method="post" action="Index.php">
			  <input type="submit" value="Volver">
			  </form>';

		}


	}


?>