<?php

	class estacionamiento{


	static function Guardar($patente){

		$_fecha = date('Y-m-d H:i:s');
		$_renglon = $patente . "=>" . $_fecha . "\n";

		//APERTURA DEL ARCHIVO: fopen(nombre_archivo,tipo_atributo_lectura_escritura_y_si_sobreescribe)
		$miarchivo = fopen("estacionados.txt","a");

		//ESCRITURA DEL ARCHIVO: fwrite(puntero_al_archivo,parametro_de_Escritura) 
		fwrite($miarchivo,$_renglon);

		//CIERRE DE ARCHIVO
		fclose($miarchivo);


	}


	static function Leer(){

		$listadoautos = array();

		$miarchivo=fopen("estacionados.txt","r");

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
		
		foreach($_listadoestacionados as $_auto){

			if($_auto[0] == $patente){

				$_inicio = $_auto[1];
				$_ahora = date('Y-m-d H:i:s');

				$_diferencia = strtotime($_ahora) - strtotime($_inicio);

				//SE GUARDA EN TICKET.TXT
				$_importe = $_diferencia * 10;
				
				echo "$_importe <br>";

			}
					
		}


	}







	}


?>