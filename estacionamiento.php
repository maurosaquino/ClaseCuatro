<?php

	class estacionamiento{


	static function Guardar($patente){

		$_fecha = date('Y-m-d H:i:s');
		$_renglon = $patente . " " . $_fecha . "\n";

		//APERTURA DEL ARCHIVO: fopen(nombre_archivo,tipo_atributo_lectura_escritura_y_si_sobreescribe)
		$miarchivo = fopen("estacionados.txt","a");

		//ESCRITURA DEL ARCHIVO: fwrite(puntero_al_archivo,parametro_de_Escritura) 
		fwrite($miarchivo,$_renglon);

		fclose($miarchivo);

	}






	}


?>