<?php

class estacionamiento{


	static function Guardar($patente){

		$_fecha = date('Y-m-d H:i:s');
		$_renglon = $patente . "=>" . $_fecha . "\n";

		//APERTURA DEL ARCHIVO: fopen(nombre_archivo,tipo_atributo_lectura_escritura_y_si_sobreescribe)
		$miarchivo = fopen('C:\xampp\htdocs\ClaseCuatro\Estacionamiento_TP\txt\estacionados.txt',"a");

		//ESCRITURA DEL ARCHIVO: fwrite(puntero_al_archivo,parametro_de_Escritura) 
		fwrite($miarchivo,$_renglon);

		//CIERRE DE ARCHIVO
		fclose($miarchivo);
	}

	static function Leer(){

		$_listadoautos = array();

		$miarchivo = fopen('C:\xampp\htdocs\ClaseCuatro\Estacionamiento_TP\txt\estacionados.txt',"r");

		//file end of file "feof()" dice si finalizò el archivo, retorna true (si el archivo termino) o false si el archivo no se acabo.

		while (!feof($miarchivo)){

			//cada vuelta lee un renglon con "fgets()"
			//explode() separa el string por un caracter especial especificado
			$_renglon=fgets($miarchivo);
			$_auto=explode("=>",$_renglon);
			
			if($_auto[0]!=""){
			
				$_listadoautos[]=$_auto;
			}
		}

			fclose($miarchivo);

		return $_listadoautos;
	}

	static function Sacar($patente){

		$_listadoestacionados=estacionamiento::Leer();
		$_remover = false;

		foreach($_listadoestacionados as $_auto){

			if($_auto[0] == $patente){

				$_inicio = $_auto[1];
				$_inicio = str_replace("\n","",$_inicio);
				$_ahora = date('Y-m-d H:i:s');
				$_diferencia = strtotime($_ahora) - strtotime($_inicio);

				$_importe = round((($_diferencia/3600) * 80),2);
				
				estacionamiento::Facturar($patente,$_inicio,$_importe,$_ahora);

				$_remover = true;

			}
		}

		if ($_remover == true){


			$miarchivo = fopen('C:\xampp\htdocs\ClaseCuatro\Estacionamiento_TP\txt\estacionados.txt',"w");
			
			foreach($_listadoestacionados as $_auto){	
				
				if($_auto[0]!="" && $_auto[0]!=$patente){
				
						$_renglon = $_auto[0]."=>".$_auto[1];		
						fwrite($miarchivo,$_renglon);
				}

			}

			fclose($miarchivo);
			
			$ticket = estacionamiento::Ticket($patente,$_inicio,$_importe,$_ahora);
			return $ticket;
		}
	}

	static function Facturar($auto,$ingreso,$importe,$egreso){

		$fexists = file_exists('C:\xampp\htdocs\ClaseCuatro\Estacionamiento_TP\txt\facturacion.csv');

		$miarchivo = fopen('C:\xampp\htdocs\ClaseCuatro\Estacionamiento_TP\txt\facturacion.csv',"a");


		if($fexists==FALSE){

			$_renglon = "Patente; Hora_Ingreso ; Hora_Egreso ; Importe_Cobrado \n";
			fwrite($miarchivo,$_renglon);
		}

		$_renglon = $auto.";".$ingreso.";".$egreso.";".$importe."\n";

		fwrite($miarchivo,$_renglon);

		fclose($miarchivo);
	}

	static function  Ticket($auto,$ingreso,$importe,$egreso){

		$ticket = '<div>
		<table>
		  <tr><th>ESTACIONAMIENTO UTNFRA</th></tr>
		  <tr><td>TICKET</td></tr>
		  <tr><td>PATENTE:'. $auto.'<br></td></tr>
		  <tr><td>INGRESO:'. $ingreso.'<br></td>
		  <td>EGRESO :'. $egreso. '<br></td></tr>
		  <tr><td>IMPORTE: $'.$importe.'</td></tr>
		</table>  
		  </div>';	

		  return $ticket;
	}

	static function GenerarTabla($listautos){

		$miarchivo = fopen('C:\xampp\htdocs\ClaseCuatro\Estacionamiento_TP\html\listado.html',"w");
 	
 		$renglon ='<table>
		<tr><th>PATENTE</th><th>INGRESO</th></tr>
		<tr>';

		foreach($listautos as $auto){

		  $renglon = $renglon . '<td>'.$auto[0].'</td><td>'.$auto[1].'</td></tr>';
		  
		 } 

		$renglon = $renglon . '</table></div>';


		fwrite($miarchivo,$renglon);

		fclose($miarchivo);
	}

	static function BuscarPatente($patente){

		$miarchivo = fopen('./txt/estacionados.txt',"r");

		while (!feof($miarchivo)){

			$_renglon=fgets($miarchivo);
			$_auto=explode("=>",$_renglon);
			
			echo $_auto[0];

			if($_auto[0]==$patente){
				
				fclose($miarchivo);
				return TRUE;
			
			} else {

				
				
			}
		}
		fclose($miarchivo);
		return FALSE;

	}


}


?>