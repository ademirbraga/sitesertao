<?php

require_once 'bootstrap.php';
require_once 'controle_path.php';
require_once _LIB_ . '/Loader.php';

ob_start("ob_gzhandler");

$includeDirs = array(
	_LIB_,
	_SMARTY_,
	_LIB_ . DIRECTORY_SEPARATOR . 'mail',
	_LIB_ . DIRECTORY_SEPARATOR . 'banco'
);

Loader::includeDir( $includeDirs );

spl_autoload_register( array( 'Loader', 'loadClass' ) );

$smarty = new Smarty;
$smarty->template_dir = 'templates';
$smarty->compile_dir  = 'templates_c';

$page = null;
$param = null;

$errors = array();

if( isset( $_GET['page'] ) ) {

	$_controller = new ArrayObject( explode( "/", $_GET['page'] ), ArrayObject::ARRAY_AS_PROPS );
	$_controller = $_controller->getIterator();

	$page = $_controller->valid() ? $_controller->current() : null;

	$_controller->next();

	$param = $_controller->valid() ? $_controller->current() : null;

}

if( null !== $page ) {

	switch( $page ):

		case 'fale-conosco';

			$conteudo = 'fale-conosco';

			break;

		case 'bastidores';

			$conteudo = 'bastidores';

			break;
	
		case 'clientes';

			$conteudo = 'clientes';

			break;

		case 'promocoes';

			$conteudo = 'promocoes';

			break;

		case 'servicos';

			$conteudo = 'servicos';

			break;

		case 'gset';

			$conteudo = 'gset';

			break;
	
		case 'anuncie';

			$conteudo = 'anuncie';

			break;

		case 'cobertura';

			$conteudo = 'cobertura';

			break;

	endswitch;

}
else {

	$conteudo = 'home';

}

$smarty->assign( '_web_', _WEB_ );
$smarty->assign( '_js_', _WEB_ . '/js' );
$smarty->assign( '_css_', _WEB_ . '/css' );
$smarty->assign( '_imagens_', _WEB_ . '/imagens' );
$smarty->assign( '_media_', _WEB_ . '/media' );

$conteudo = $smarty->fetch( $conteudo . '.html' );

$smarty->assign('conteudo', $conteudo);

$smarty->display('index.html');