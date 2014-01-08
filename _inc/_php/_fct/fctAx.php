<?php

function utf_iso(&$a) {

	if (is_array ( $a )) {

		foreach ( $a as $k => $v ) {

			if (! is_array ( $v )) {

				$a [$k] = utf8_decode ( $a [$k] );

			} else {

				utf_iso ( $a [$k] );

			}

		}

	} else {

		

		$a = utf8_decode ( $a );

	}

	return $a;

}



/**

 * Convert de ISO para UTF

 */

function iso_utf(&$a) {

	if (is_array ( $a )) {

		foreach ( $a as $k => $v ) {

			if (! is_array ( $v )) {

				$a [$k] = utf8_encode ( $a [$k] );

			} else {

				iso_utf ( $a [$k] );

			}

		}

	} else {

		

		$a = utf8_encode ( $a );

	

	}

	return $a;

}



/**

 * Transforma todos os itens de um array para utf8

 * @param array $array

 * @return boolean

 */

function recursive_utf8_encode(&$array){

	if(isset($array) && !empty($array) && is_array($array)){

		array_walk_recursive($array, create_function('&$item, $key', '$item = utf8_encode((string)$item);'));

	}else{

		return false;

	}		

}



function asm_event_queues( $e, $parameters, $server, $port ) {

	global $queue_details,$parada;

	if( sizeof( $parameters ) )  {

		if( $parameters['Event'] == "QueueMember" )

			$queue_details[] = $parameters;

		if( $parameters['Event'] == "QueueStatusComplete" )

			$parada = "aa";

	}

}



function get_queues(&$obj)  {

	$obj->add_event_handler("QueueMember","asm_event_queues");

	$obj->add_event_handler("QueueMemberStatus","asm_event_queues");

	$obj->add_event_handler("QueueStatusComplete","asm_event_queues");

	global $queue_details;

	global $parada;

	while(!$parada)  {

		$obj->QueueStatus();

	}

	return $queue_details;

}
function calendario ($mes,$ano){
    // Primeiro dia do mes
    $primeiro_dia = mktime(0, 0, 0, $mes, 1,$ano);
    // Numero de dias no mes corrente
    $num_dias = date('t', $primeiro_dia);
    // O primeiro dia cai no dia da semana
    $pri_dia_sem = date('w', $primeiro_dia);
    /**
    * Digamos que neste mes X o primeiro dia começa na Quarta e tem 30 dias
    * A estrutura do Array ficará:
    * $calendario = array(
    * 0 => array( NULL, NULL, NULL, 1, 2, 3, 4),
    * 1 => array( 5, 6, 7, 8, 9, 10, 11),
    * 2 => array( 12, 13, 14, 15, 16, 17, 18),
    * 3 => array( 19, 20, 21, 22, 23, 24, 25),
    * 4 => array( 26, 27, 28, 29, 30, NULL, NULL)
    * );
    */

    if($pri_dia_sem > 0){
    $calendario = array(0 => array_fill(0, $pri_dia_sem, NULL));
    }

    $dia = 1;
    $semana = 0;
    $dia_semana = $pri_dia_sem;
    while ($dia <= $num_dias) {
    if ($dia_semana >= 7) {
    $dia_semana = 0;
    $semana++;
    }
    $calendario[$semana][$dia_semana] = $dia;

    $dia++;

    $dia_semana++;

    }
    if($dia_semana < 7){
    $calendario[$semana] += array_fill($dia_semana, 7-$dia_semana, NULL);
    }
    return $calendario;
}
?>