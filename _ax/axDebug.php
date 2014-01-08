<?php

session_start();

ob_start();

define("WWW_ROOT", "../");



require_once(WWW_ROOT."_inc/_php/config.inc.php");

require_once(WWW_ROOT."_inc/_php/geral.inc.php");

require_once (INCLUDE_PHP_FUNC . "/fctAx.php");



if(isset($_POST) && !empty($_POST)){

	if(!empty($_POST['nom_senha']) && isset($_POST['nivel']) && $_POST['nom_senha'] == '1webtupi123'){

		$_SESSION['debug'] = array_sum($_POST['nivel']);

		echo '{"resposta":"yes","dbg":""}';

		

	}else 

		echo '{"resposta":"no","dbg":""}';

}else{

	unset($_SESSION['debug']);

	$smarty->assign("debug",(isset($_SESSION['debug']) ? 1 : 0));

	$smarty->display("tplDebug.htm");

}



?>