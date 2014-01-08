<?php

/**

* Arquivo de constates da aplicacao. 

* 

* File:    constantes.inc.php 

* @autor  WebTupi

* @version 1.0.0

* @package sitebhstouche

*/



//Evita que esse arquivo seja incluido mais de uma vez

if(!defined("__CONSTANTES__"))

	define("__CONSTANTES__", 1);

else exit; 



/**********************************************************

*    CONSTANTES PERMANENTES. ASSIM QUE DEFINIDAS 

*    ADEQUADAMENTE NAO DEVEM SER ALTERADAS. 

*    RECOMENDA-SE UTILIZAR DEFINICOES NO LUGAR DAS 

*    DECLARACOES DE VARIAVEIS GLOBAIS. 

***********************************************************/



/**

* Definicao dos ambitentes. A aplicacao deve ser traTada de forma generica,

* independente do ambiente. Ao se colocar um aplicativo em producao, 

* somente o arquivo de configuracao deve ser alterado, se necessario.

*/

if(!defined("APLICACAO")) 

	define("APLICACAO", "sitesertao"); 

	

if(!defined("DESENVOLVIMENTO")) 
	define("DESENVOLVIMENTO", 0); 

if(!defined("HOMOLOGACAO")) 
	define("HOMOLOGACAO", 1); 

if(!defined("PRODUCAO")) 
	define("PRODUCAO", 2); 


/**

* Diretorio raiz do servidor Web

*/

define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);

/**

* Agente Usuario que esta acessando a aplicacao

*/

if( isset($_SERVER['HTTP_USER_AGENT']) && !empty($_SERVER['HTTP_USER_AGENT']) )

define("HTTP_USER_AGENT", $_SERVER['HTTP_USER_AGENT']);

/**

* Endereco IP do servidor

*/

if( isset($_SERVER['SERVER_ADDR']) && !empty($_SERVER['SERVER_ADDR']) )

define("SERVER_ADDR", isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR']);



/**

* Endereco IP do cliente

*/

if( isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) )

define("REMOTE_ADDR", $_SERVER['REMOTE_ADDR']);



if( isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI']) )

define("REQUEST_URI", $_SERVER['REQUEST_URI']);



define("SERVER_INFO", @base64_encode(implode(" | \n",$_SERVER)));



/**

* Niveis de debug da aplicacao 

*/

define("INFO", 1);

/**

* Exibe erros.		

*/

define("ERRO", 2);

/**

* Exibe mensagens resultantes de execucao de queries.

*/

define("SQL", 4);



define("XAJAX", 8);

/**

* Exibe todas as mensagens.

*/

define("TODOS", INFO | ERRO | SQL | XAJAX);



/* Mostrar menu de Limites */



if(!defined("MOSTRAR_LIMITES")) 

	define("MOSTRAR_LIMITES", false);

	

/**

* Definicoes de sessï¿½o

*/



define("CHAVE_AUTENTICACAO", "sxxfxcd2acf342d4234526faca");



define("ERRO_LOGIN", 1);

define("ERRO_ACESSO", 2);

define("ERRO_ACESSO_EXPIRADO", 3);

define("ERRO_ACESSO_NEGADO", 4);

define("ERRO_PERMISSAO", 5);

define("ERRO_GERACAO_BOLETO", 6);

define("ERRO_ACESSO_CANCELADO", 7);

define("ERRO_VAZIO", 8);

define("AVISO_LIMITACAO",9);

define("ERRO_POPUP",10);



$INFO_ERRO[ERRO_LOGIN] = "Login e senha n&atilde;o correspondem! Por favor, tente novamente.";

$INFO_ERRO[ERRO_ACESSO] = "Acesso negado!";

$INFO_ERRO[ERRO_ACESSO_EXPIRADO] = "Sess&atilde;o expirada.";

$INFO_ERRO[ERRO_PERMISSAO] = "Acesso n&atilde;o autorizado para o perfil deste usu&aacute;rio!";

$INFO_ERRO[ERRO_ACESSO_NEGADO] = "Acesso negado! Falha na autentica&ccedil;&atilde;o da sess&atilde;o.";

$INFO_ERRO[ERRO_GERACAO_BOLETO] = "Boleto n&atilde;o identificado!";

$INFO_ERRO[ERRO_ACESSO_CANCELADO] = "Seu acesso esta bloqueado no sistema!";

$INFO_ERRO[ERRO_VAZIO] = "Sem sess&atilde;o!";

$INFO_ERRO[AVISO_LIMITACAO] = "ï¿½ permitido somente com o usuario administrador do sistema.";



define("INFO_ERRO_LOGIN", "Login e senha n&atilde;o correspondem! Por favor, tente novamente.");

define("INFO_ERRO_ACESSO", "Acesso negado!");

define("INFO_ERRO_PERMISSAO", "Acesso n&atilde;o autorizado para o perfil deste usu&aacute;rio!");

define("INFO_ERRO_ACESSO_EXPIRADO", "Sess&atilde;o expirada.");

define("INFO_ERRO_ACESSO_NEGADO", "Acesso negado! Chave da sess&atilde;o n&atilde;o confere.");

define("INFO_ERRO_GERACAO_BOLETO", "Boleto n&atilde;o identificado!");

define("INFO_ERRO_ACESSO_CANCELADO", "Seu acesso esta bloqueado no sistema.!");



define("AJAX_REDIR", 1);

define("JS_REDIR", 2);

define("PHP_REDIR", 3);





/**

* Modulo CRM

*/

define("PF", "F"); //Pessoa fisica

define("PJ", "J"); //Pessoa juridica



/**

* Definicoes de Filtros

*/

define("F_NONE", "none");

define("F_SELECT", "select");

define("F_TEXT", "text");

define("F_DATE", "date");

define("F_FLOAT", "float");

define("FOP_IGUAL", "igual");

define("FOP_DIFERENTE", "diferente");

define("FOP_CONTEM", "contendo");

define("FOP_NCONTEM", "ncontendo");

define("FOP_COMECO", "inicio");

define("FOP_FIM", "fim");

define("FOP_MAIOR", "maior");

define("FOP_MENOR", "menor");

define("FOP_ENTRE", "entre");



/**

* Mensagens de Erro

*/

define("MSG_ERRO_CADASTRO", "Erro Fatal: Cadastro n&atilde;o pode ser realizado.");

define("MSG_ERRO_EDICAO", "Erro Fatal: Cadastro n&atilde;o pode ser atualizado.");

define("MSG_ERRO_ALREADY_EXISTS", "Este cadastro j&aacute; existe!");

define("MSG_ERRO_NOTHING", "Nenhum cadastro foi realizado!");



/**

* Mensagens de Sucesso

*/

define("MSG_SUCESSO_CADASTRO", "Cadastro realizado com sucesso!");

define("MSG_SUCESSO_EDICAO", "Cadastro atualizado com sucesso!");



if(!defined("NOME_DIR_WEB")) 

	define("NOME_DIR_WEB", "sitesertao"); 



/**

* Modos de edicao

*/



define( "VISUALIZAR", 1 );

define( "LISTAR", 2 );

define( "CADASTRAR", 4 );

define( "EDITAR", 8 );

define( "EXCLUIR", 16 );

define( "CANCELAR", 32 );

define( "IMPORTAR", 64 );

define( "EXPORTAR", 128 );

//define( "CADASTRAR", 2 ); 

//define( "ATUALIZAR", 64 );



?>

