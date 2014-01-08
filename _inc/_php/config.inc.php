<?php

error_reporting(0);

require_once 'bd.inc.php';

require_once 'constantes.inc.php';



//require_once("configImagem.inc.php");
//require_once("config_cliente.inc.php");



/* * *****************************************************************

 *    CONFIGURACOES DO AMBIENTE.

 * ****************************************************************** */

if (!defined("LINHASPORPAGINA"))
    define("LINHASPORPAGINA", 50);

if (!defined("ISADMINISTRADOR"))
    define("ISADMINISTRADOR", false);

if (!defined("EXIBIR_ICONE"))
    define("EXIBIR_ICONE", false);

/**

 * Define o padrao de codificacao de caracteres

 */
if (!defined("XAJAX_DEFAULT_CHAR_ENCODING"))
    define('XAJAX_DEFAULT_CHAR_ENCODING', 'ISO-8859-1');





/**

 * Define se a aplicacao esta em ambiente de DESENVOLVIMENTO, HOMOLOGACAO ou PRODUCAO.

 */
define('AMBIENTE', 'desenvolvimento');

define('DBPADRAO', 'padrao');



/**

 * diret�rio raiz da aplica��o

 */
if (!defined("WWW_ROOT"))
//    define("WWW_ROOT","D://PROJETOS//");
define("WWW_ROOT", "../");
//define("WWW_ROOT","D://PROJETOS//");



if (!defined("WWW"))
    define("WWW", WWW_ROOT);



if (isset($_SERVER['HTTP_HOST']) && !empty($_SERVER['HTTP_HOST']))
    if (!defined("URL_SITE"))
        define("URL_SITE", "http://" . $_SERVER['HTTP_HOST'] . "/");

/**

 * Caminho para o diretorio de Documentacaoes

 */
if (!defined("PATH_DOCUMENTACAO"))
    define("PATH_DOCUMENTACAO", WWW_ROOT . "doc");

/**

 * Caminho para o diret�rio de includes

 */
if (!defined("PATH_INCLUDE"))
    define("PATH_INCLUDE", WWW_ROOT . "_inc");



/**

 * Caminho para o diret�rio de aplicacoes

 */
if (!defined("PATH_APP"))
    define("PATH_APP", WWW . "_app");





/**

 * Caminho para o diret�rio de arquivos php

 */
if (!defined("PATH_INCLUDE_PHP"))
    define("PATH_INCLUDE_PHP", PATH_INCLUDE . "/_php");



/**

 * Caminho para o diretorio de helpers

 */
if (!defined('HELPERS'))
    define('HELPERS', PATH_INCLUDE_PHP . '/_helpers');

/**

 * Caminho para o diretorio de arquivos css

 */
if (!defined("PATH_INCLUDE_CSS"))
    define("PATH_INCLUDE_CSS", PATH_INCLUDE . "/_css");



if (!defined("PATH_INCLUDE_JS"))
    define("PATH_INCLUDE_JS", PATH_INCLUDE . "/_js");



/**

 * Caminho para o diret�rio de bibliotecas php

 */
if (!defined("INCLUDE_PHP_LIB"))
    define("INCLUDE_PHP_LIB", PATH_INCLUDE_PHP . "/_libs");



/**

 * Caminho para o diret�rio de classes php

 */
if (!defined("INCLUDE_PHP_CLASS"))
    define("INCLUDE_PHP_CLASS", PATH_INCLUDE_PHP . "/_class");



/**

 * Caminho para o diret�rio de funcioes php

 */
if (!defined("INCLUDE_PHP_FUNC"))
    define("INCLUDE_PHP_FUNC", PATH_INCLUDE_PHP . "/_fct");

/**

 * Defi��o para include da biblioteca ADODB

 */
if (!defined("INCLUDE_ADODB"))
    define("INCLUDE_ADODB", INCLUDE_PHP_LIB . "/adodb/adodb.inc.php");

/**

 * Defi��o para include da biblioteca Smarty

 */
if (!defined("INCLUDE_SMARTY"))
    define("INCLUDE_SMARTY", INCLUDE_PHP_LIB . "/smarty/libs/Smarty.class.php");



if (!defined("DIR_SMARTY"))
    define("DIR_SMARTY", WWW);

/**

 * Defi��o para include da biblioteca nusoap

 */
if (!defined("INCLUDE_NUSOAP"))
    define("INCLUDE_NUSOAP", INCLUDE_PHP_LIB . "/nusoap/nusoap.php");



/**

 * Defi��o do caminho do diret�rio de Logs

 */
if (!defined("PATH_LOG_DIR"))
    define("PATH_LOG_DIR", WWW . "_logs");



/**

 * Defi��o do caminho do diret�rio de Logs

 */
if (!defined("PATH_LOG_SQL"))
    define("PATH_LOG_SQL", PATH_LOG_DIR . "/logs/Sql");



/**

 * Caminho para o diret�rio de uploads

 */
if (!defined("PATH_UPLOAD"))
    define("PATH_UPLOAD", WWW . "uploads");



/**

 * caminho completo da aplicacao,

 * utilizado para o caso de leitura de arquivos no mysql

 * como em telefones

 */
if (!defined("PATH_ROOT"))
    define("PATH_ROOT",WWW_ROOT.APLICACAO."/");
//define("PATH_ROOT", "/home/f3teccom/public_html/" . APLICACAO . "/");
//define("PATH_ROOT","D://PROJETOS/".APLICACAO."/");


if (!defined("PATH_UPLOAD_SITE"))
    define("PATH_UPLOAD_SITE", PATH_ROOT."/site/imagens/");

if (!defined("WWW_UPLOAD_SITE"))
    define("WWW_UPLOAD_SITE", URL_SITE.APLICACAO."/site/imagens/");

if (!defined("PATH_UPLOAD_TABELA"))
    define("PATH_UPLOAD_TABELA", PATH_ROOT."/site/_uploads/");

if (!defined("WWW_UPLOAD_TABELA"))
    define("WWW_UPLOAD_TABELA", URL_SITE.APLICACAO."/site/_uploads/");


if (!defined("PATH_EXPORT"))
    define("PATH_EXPORT", WWW . "export");



/**

 * Para redirecionamento de paginas n�o disponiveis

 */
if (!defined("MANUTENCAO"))
    define("MANUTENCAO", false);



if (!defined("CONSTRUCAO"))
    define("CONSTRUCAO", false);



//Define a permissao do arquivo.
//Se for igual a zero a p�gina possui acesso p�blico

if (!defined("SIS_PERMISSAO"))
    define("SIS_PERMISSAO", 0); //Acesso p�blico



if (!defined("REDIR_MODE"))
    define("REDIR_MODE", PHP_REDIR); //Acesso p�blico





    
//Define o layout

if (!defined("SKIN"))
    define("SKIN", "");



if (!defined("MENU_THEME"))
    define("MENU_THEME", "ThemePanel");



/**

 * Defi��o do caminho do diret�rio de Imagens

 */
if (!defined("IMAGES"))
    define("IMAGES", WWW . "img" . SKIN);



if (!defined("IMAGES_ICONS"))
    define("IMAGES_ICONS", IMAGES . '/icons');



if (!defined('JS'))
    define('JS', PATH_INCLUDE . '/_js');



require_once(INCLUDE_PHP_CLASS . "/Log.php");

require_once(INCLUDE_PHP_CLASS . "/Loader.php");



//formata o path completo at� a pasta raiz do sistema

if (!defined("PATH_COMPLETO_BASE")) {

    $arrCaminho = explode("_inc", __FILE__);

    define("PATH_COMPLETO_BASE", str_replace("\\", "/", $arrCaminho[0]));
}





$includeDirs = array(
    INCLUDE_PHP_LIB,
    INCLUDE_PHP_CLASS,
    HELPERS
);



Loader::includeDir($includeDirs);

//carrega o helper smarty para todos os aplicativos

Loader::helper('smarty');

spl_autoload_register(array('Loader', 'loadClass'));

$path = INCLUDE_PHP_LIB . '/';

set_include_path(get_include_path() . PATH_SEPARATOR . $path);



define('DBCONFIG', PATH_INCLUDE_PHP . '/adapters.xml');



/*

  function __autoload($class_name) {

  if(is_file(INCLUDE_PHP_CLASS."/".$class_name . '.class.php'))

  require_once (INCLUDE_PHP_CLASS."/".$class_name . '.class.php');

  // else

  //	require_once (INCLUDE_PHP_LIBS."/".$class_name . '.php');

  } */



setlocale(LC_ALL, array('pt_BR', 'ptb'));

date_default_timezone_set('America/Sao_Paulo');
?>