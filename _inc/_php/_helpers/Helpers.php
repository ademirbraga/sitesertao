<?php

class Helpers {
	
	/*
	 * Monta o breadcrumb e retorna uma matriz com os dados
	 */
	public static function trail($steps = array(), $addHome = false) {
		
		if (empty ( $steps ))
			return array ();
		
		$homeLabel = 'txt_painel_principal';
		$homeLink = WWW_ROOT;
		
		$trail = new Trail ( $addHome, $homeLabel, $homeLink );
		
		foreach ( $steps as $title => $link )
			$trail->addStep ( $title, $link );
		
		return $trail->path;
	
	}
	
	public static function getTimeInterval($intervalo = 15, $horaInicial = 0, $horaFinal = 2400) {
		
		// intervalo de tempo. Ex.: 08:00, 08:15, 08:30, 08:45
		$x = $intervalo;
		// quantidade de vezes que o intervalo pode ser chamado em uma hora.
		$y = @round ( 60 / $x - 1 );
		// contador do sistema
		$contador = 1;
		
		// prevenindo para que nÃ£o ultrapasse 24:00 horas
		if ($horaFinal > 2400)
			$horaFinal = 2400;
		
		for($i = $horaInicial; $i < $horaFinal; $i ++) {
			
			$current = substr ( $i, - 2 );
			
			if ($i === 0) {
				$horas ['00:00'] = '00:00';
			} elseif (($current == ($x * $contador) || $current == 00) && $current != false) {
				
				if ($i < 99)
					$hora = '00' . $i;
				elseif ($i > 99 && $i < 999)
					$hora = '0' . $i;
				else
					$hora = $i;
				
				if ($contador >= $y)
					$contador = 1;
				elseif ($current != 00)
					$contador ++;
				
				$horario = substr ( $hora, 0, 2 ) . ':' . substr ( $hora, - 2 );
				
				$horas [$horario] = $horario;
			
			}
		
		}
		
		if ($horaFinal > $horario)
			$horas [substr ( $horaFinal, 0, 2 ) . ':' . substr ( $horaFinal, - 2 )] = substr ( $horaFinal, 0, 2 ) . ':' . substr ( $horaFinal, - 2 );
		
		return $horas;
	
	}
	/**
	 * Converte um timestamp para formato de hora:minuto:segundo, a mesma funï¿½ï¿½o que o SEC_TO_TIME do mysql.
	 * @param integer $timestamp
	 * @return string
	 */
	public static function sec_to_time($timestamp = 0) {
		
		$hora_formatada = '00:00:00';
		
		if ($timestamp != 0) {
			
			$hours = floor ( $timestamp / 3600 );
			$minutes = floor ( $timestamp % 3600 / 60 );
			$seconds = $timestamp % 60;
			
			$hora_formatada = self::zeroFill ( $hours ) . ':' . self::zeroFill ( $minutes ) . ':' . self::zeroFill ( $seconds );
		}
		
		return $hora_formatada;
	
	}
	/**
	 * Converte um formato de hora:minuto:segundo para timestamp, a mesma funï¿½ï¿½o que o TIME_TO_SEC do mysql.
	 * @param string $hour
	 * @param string $time
	 * @return integer
	 */
	public static function time_to_sec($time, $format = 'H:i:s') {
		
		$hours = $mins = $secs = 0;
		
		if (isset ( $time )) {
			
			if ($format == 'i:s') {
				list ( $mins, $secs ) = explode ( ':', $time );
			} else if ($format == 'H:i:s') {
				list ( $hours, $mins, $secs ) = explode ( ':', $time );
			}
			
			$hours *= 3600;
			$mins *= 60;
		
		}
		
		return $hours + $mins + $secs;
	}
	
	/**
	 * Preenche um número com zeros a esquerda
	 * @param int $number
	 * @param int $length - tamanho que deve ficar a string; ps.: ignora caso já tenha o tamanho desejado;
	 */
	public static function zeroFill($number = 0, $length = 2) {
		return str_pad ( $number, $length, "0", STR_PAD_LEFT );
	}
	
	public static function recursive_utf8_encode(&$array) {
		if (isset ( $array ) && ! empty ( $array ) && is_array ( $array )) {
			array_walk_recursive ( $array, create_function ( '&$item, $key', '$item = utf8_encode((string)$item);' ) );
		} else {
			return false;
		}
	}
	
	public static function recursive_utf8_decode(&$array) {
		if (isset ( $array ) && ! empty ( $array ) && is_array ( $array )) {
			array_walk_recursive ( $array, create_function ( '&$item, $key', '$item = utf8_decode((string)$item);' ) );
		} else {
			return false;
		}
	}
	/**
	 * Formata o dado recebendo as configurações no mesmo padrão do colModel do jqgrid
	 * @param unknown_type $value
	 * @param unknown_type $options
	 * @return unknown|string
	 */
	public static function formatter($value, $options) {
		
		if (! isset ( $options ['formatter'] )) {
			return $value;
		}
		
		$dado = '';
		
		switch ($options ['formatter']) {
			
			case 'date' :
				if (isset ( $options ['formatoptions'] )) {
					extract ( $options ['formatoptions'], EXTR_PREFIX_ALL, 'opt' );
					
					if (! isset ( $opt_srcformat )) {
						$opt_srcformat = 'd/m/Y H:i:s';
					}
					if ($opt_srcformat == 's') {
						if ($opt_newformat == 'H:i:s') {
							$dado = self::sec_to_time ( $value );
						} else {
							$objDate = new DateTime ( );
							$objDate->setTimestamp ( $value );
							$dado = $objDate->format ( $opt_newformat );
						}
					} else {
						//PARA FUNCIONAR NA VERSAO ABAIXO DE 5.3.0
						$objDate = new DateTime();
						
						//FUNCIONA NO PHP 5.3.5
						//$objDate = DateTime::createFromFormat ( $opt_srcformat, $value );
						if ($objDate) {
							$dado = $objDate->format ( $opt_newformat );
						}
					
					}
				}
				break;
			case 'currency' :
				
				//padrão R$ 9.999,99
				$opt_prefix = 'R$ ';
				$opt_decimalPlaces = 2;
				$opt_decimalSeparator = ',';
				$opt_thousandsSeparator = '.';
				
				if (isset ( $options ['formatoptions'] )) {
					extract ( $options ['formatoptions'], EXTR_PREFIX_ALL, 'opt' );
				}
				
				$dado = $opt_prefix . number_format ( $value, $opt_decimalPlaces, $opt_decimalSeparator, $opt_thousandsSeparator );
				
				break;
		}
		
		return $dado;
	}
	
	/**
     
	 * @name smartyAssign
	 * 
	 * @param object $smarty
	 * @param array $arDisplay 
	 * 
	 * @desc: Metodo para enviar todos os dados via smarty,
	 * para evitar que varias chamdas a este metodo sejam utilizados
	 * nos aplicativos, utiliza-se somente uma chamada deste metodo para tal.
	 */
	public static function smartyAssign($smarty, $arDisplay = array()) {
		foreach ( $arDisplay as $key => $display )
			$smarty->assign ( $key, $display );
	}
	
	/**
	 * @param string $url
	 * @param array/string $post
	 */
	public static function curl_post($url, $post = null, $cookie) {
		
		if (isset ( $url ) && ! empty ( $url )) {
			
			if (isset ( $post ) && ! is_array ( $post )) {
				parse_str ( $post, $post );
			}
			
			//open connection
			$ch = curl_init ( $url );
			
			curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 5 );
			curl_setopt ( $ch, CURLOPT_TIMEOUT, 5 );
			curl_setopt ( $ch, CURLOPT_MAXREDIRS, 2 );
			curl_setopt ( $ch, CURLOPT_FRESH_CONNECT, 1 );
			
			//set the url, number of POST vars, POST data
			curl_setopt ( $ch, CURLOPT_HEADER, 0 );
			curl_setopt ( $ch, CURLOPT_COOKIE, $cookie );
			
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, TRUE );
			curl_setopt ( $ch, CURLOPT_USERAGENT, $_SERVER ['HTTP_USER_AGENT'] );
			curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, TRUE );
			
			if (isset ( $post )) {
				curl_setopt ( $ch, CURLOPT_POST, count ( $post ) );
				curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post );
			}
			
			//execute post
			$result = curl_exec ( $ch );
			
			//close connection
			curl_close ( $ch );
			
			return $result;
		}
		
		return false;
	
	}
	
	/**
	 * 
	 * Adiciona indices necessários para o funcionamento do jquery ui autocomplete no seu array de dados     
	 * @param array $dados Registros são passados por referência
	 * @param array $identidade
	 * @return boolean|boolean
	 * @example Helpers::formatToAutoComplete($contextos, array('id' => 'cod_contexto', 'label' => 'nom_contexto', 'value' => 'nom_contexto'));
	 * @Atenção Se o array de registros já tiver os indices id, label e value, os valores serï¿½o sobreescritos; 
	 */
	public static function formatToAutoComplete(&$dados, $identidade) {
		
		if (isset ( $dados ) && ! empty ( $dados ) && is_array ( $dados )) {
			
			$id = isset ( $identidade ['id'] ) ? $identidade ['id'] : 0;
			$label = isset ( $identidade ['label'] ) ? $identidade ['label'] : 0;
			$value = isset ( $identidade ['value'] ) ? $identidade ['value'] : 0;
			
			foreach ( $dados as $k => &$dado ) {
				
				$dado ['id'] = isset ( $dado [$id] ) ? $dado [$id] : NULL;
				
				$dado ['label'] = isset ( $dado [$label] ) ? $dado [$label] : NULL;
				
				if (isset ( $dado [$value] )) {
					$dado ['value'] = $dado [$value];
				} else if (isset ( $dado [$label] )) {
					$dado ['value'] = $dado [$label];
				} else {
					$dado ['value'] = NULL;
				}
			}
			
			return true;
		}
		return false;
	}
	
	/**
	 * Preenche a hora seguindo a formatação desejada
	 * @param string $format_
	 * @param string $value_
	 * @example Helpers::timeFill( 'H:i:s', '9' ) retorna '09:00:00'
	 */
	public static function timeFill($format_ = 'H:i:s', $value_ = '00:00:00') {
		
		$vals = explode ( ':', $value_ );
		
		switch ($format_) {
			case 'H:i:s' :
				
				$h = (isset ( $vals [0] ) ? self::zeroFill ( $vals [0] ) : '00');
				$m = (isset ( $vals [1] ) ? self::zeroFill ( $vals [1] ) : '00');
				$s = (isset ( $vals [2] ) ? self::zeroFill ( $vals [2] ) : '00');
				
				return "{$h}:{$m}:{$s}";
				
				break;
			case 'H:i' :
				
				$h = (isset ( $vals [0] ) ? self::zeroFill ( $vals [0] ) : '00');
				$m = (isset ( $vals [1] ) ? self::zeroFill ( $vals [1] ) : '00');
				
				return "{$h}:{$m}";
				
				break;
		}
	}
	
	public static function jsonEncode($array) {
		self::recursive_utf8_encode ( $array );
		return utf8_decode ( json_encode ( $array ) );
	}
	
	/**
	 * 
	 * Checa de forma binária um array proposto para utilização em GoToIfTime
	 * @param array $check
	 * @param int $sum
	 * @return array
	 * 
	 */
	public static function checkBinFilter($check = array(), $sum) {
		
		if (is_array ( $check ) && ! empty ( $check )) {
			
			$check_result = array ();
			
			foreach ( $check as $k_check => $v_check ) {
				
				if ($v_check & $sum) {
					
					$check_result [$k_check] = $v_check;
				}
			}
		}
		
		return $check_result;
	}
	
	/**
	 * Limpa uma string, retira acentos, retira qualquer outro caracter diferente de números e letras
	 * @param string $string
	 * @return string $new_string
	 * @example Helpers::cleachString( 'Promoção 10' ) retorna 'Promocao10'
	 */
	public static function cleanString($string_) {
		$new_string = strtr ( $string_, 'ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½', 'aeiouaoc' );
		$new_string = preg_replace ( "[^A-Za-z0-9]", "", $new_string );
		return $new_string;
	}
	
	public static function removerAcentos($var) {
		
		$var = str_replace  ( array('Á','À','Â','Ã'), "A", $var );
		$var = str_replace  ( array('á','à','â','ã','ª'), "a", $var );
		$var = str_replace  ( array('É','È','Ê'), "E", $var );
		$var = str_replace  ( array('é','è','ê'), "e", $var );
		$var = str_replace  ( array('Ó','Ò','Ô','Õ'), "O", $var );
		$var = str_replace  ( array('ó','ò','ô','õ','º'), "o", $var );
		$var = str_replace  ( array('Ú','Ù','Û'), "U", $var );
		$var = str_replace  ( array('ú','ù','û'), "u", $var );
		$var = str_replace  ("Ç", "C", $var );
		$var = str_replace  ( "ç", "c", $var );
		return $var;
	}
	
	public static function print_pre($dados = array(), $label = "PRINT DADOS", $color = "red") {
		echo '<br>*********************************<br>' . $label . '<br>*********************************<br>';
		echo '<pre><font color="' . $color . '">';
		print_r ( $dados );
		echo '</font></pre>';
	}
	
	public static function sendMail($from = '', $to = '', $bcc = '', $cc = '', $subject = '', $msg = '') {
		$objEmail = new Email ( );
		$objEmail->set_mailtype($type = 'html');
		$objEmail->from ( $from, 'BHS Touche' );
		$objEmail->to ( $to );
		
		if (! empty ( $bcc )) {
			$objEmail->bcc ( $bcc );
		}
		
		$objEmail->subject ( $subject );
		$objEmail->message ( $msg );
		
		$ret = $objEmail->send ();
		
		if (! empty ( $objEmail->_debug_msg ) && $objEmail->showDebug) {
			echo var_dump ( $objEmail->_debug_msg );
			echo $objEmail->print_debugger ();
		}
		return $ret;
	}

/**
	 * @name SomarData
	 *
	 * @param <date> $data
	 * @param <int> $dias
	 * @param <int> $meses
	 * @param <int> $ano
	 * @return <date>
	 * @example 
	 * echo SomarData("04/04/2007", 1, 2, 1); => "05/06/2008"
	 */
	public static function SomarData($data, $dias, $meses, $ano)
	{
	   //passe a data no formato dd/mm/yyyy 
	   $data = explode("/", $data);
	   $newData = date("d/m/Y", mktime(0, 0, 0, $data[1] + $meses,$data[0] + $dias, $data[2] + $ano) );
	   return $newData;
	}

}

?>