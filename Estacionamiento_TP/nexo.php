<?php
	date_default_timezone_set('America/Argentina/Buenos_Aires');


	if (isset($_POST['accion'])){


		$_patente 	= strtoupper($_POST['patente']);
		$_accion 	= $_POST['accion'];

		if($_accion=='Estacionar'){
		
				require_once('class\estacionamiento.php');
		
				$verificacion = estacionamiento::BuscarPatente($_patente);

				echo $verificacion;

				if($verificacion == FALSE){
				
						estacionamiento::Guardar($_patente);
						//header('location:Index.php');

						} else {

						header('location:Index.php?accion="error"');
				}

		}elseif($_POST['accion']=='Sacar'){

						header('location:Index.php?accion="yaesta"');
						require_once('class\estacionamiento.php');
						$retorno = estacionamiento::Sacar($_patente);
						echo $retorno;
						echo '<head><link rel="stylesheet" type="text/css" href="css\estilo.css"></head>
			  				  <script>
							  function vImprimir() {
				    				document.body.style.background = "#fff no-repeat right top";
								}
							  </script>
							  <div class="CajaInicio">
							  <form method="post" action="Index.php">
							  <input id="button" type="submit" value="Volver"    name="opcion">
							  <input id="button" type="submit" value="Imprimir"  name="opcion" onClick= "vImprimir(); window.print();">
							  </div>
							  </form>';
		}else{
				header('location:Index.php');
		}

	} 
	
//



?>