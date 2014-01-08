<?php

//Define a permissao do arquivo

//ob_start();

// Diretorio raiz

if (! defined ( "WWW_ROOT" ))

	define ( "WWW_ROOT", "../" );

	// Arquivo de constantes, configuracao e inicializacao

include (WWW_ROOT . "/_inc/_php/geral.inc.php");

require_once INCLUDE_PHP_FUNC . "/fctAx.php";

//$_SESSION ['debug'] = SQL;

$modulo = $get ['modulo'];



$objLista = new Lista ( $modulo );

$objLista->setModulo ();

$campos = $objLista->getCampos ();

$id = $objLista->getId ();


// A linha abaixo seta o nome do modulo com linguagem

$NomModulo = $lng [$objLista->getNomeModulo ()];



$_SESSION ['atualizar_em'] = (@$_SESSION ['atualizar_em']) ? @$_SESSION ['atualizar_em'] : '30';

$arrAtualizar = array ('30' => '30 seg', '60' => '1 Min', '120' => '2 Min', '300' => '5 Min', '1800' => '30 Min', '3600' => '1 Hora' );

$smarty->assign ( 'atualizar_em', $arrAtualizar );



$sltCampos = array ();

$grid_config = array ();



foreach ( $campos as $k => $Campos ) {

	$sltCampos [] = $k;

	

	// Formata para o jGrid

	$campo_grid = array ();

	$campo_grid ['name'] = $k;

	$campo_grid ['index'] = $k;

	$campo_grid ['width'] = $Campos ['tamanho'];

	

	if (isset ( $Campos ['sortable'] )) {

		$campo_grid ['sortable'] = true;

	}

	

	if (isset ( $Campos ['tipo'] )) {

		switch ($Campos ['tipo']) {

			case 'timestamp' :

				$campo_grid ['formatter'] = 'date';

				$campo_grid ['formatoptions'] = array ('srcformat' => 'Y-m-d H:i:s', 'newformat' => 'd/m/Y H:i:s' );

				break;

			case 'moeda' :

				$campo_grid ['formatter'] = 'currency';

				$campo_grid ['formatoptions'] = array ('prefix' => 'R$', 'decimalsSeparator' => ',' );

				break;

			case 'bool' :

				// Formata o campo devolvendo em formato texto os valores internacionalizados (Linguagem.php) para Sim e Nï¿½o.

				$campo_grid ['formatter'] = 'fmtBool';

				break;

			case 'boolean' :

				// Formata o campo devolvendo um span centralizado com uma imagem booleana

				// e adicionado o title do span com os valores internacionalizados (Linguagem.php) para Sim e Nï¿½o

				$campo_grid ['formatter'] = 'fmtBoolean';

				break;

            case 'leftright' :

                $campo_grid ['formatter'] = 'fmtLeftRight';

                break;

			case 'horaminuto' :

				$campo_grid ['formatter'] = 'date';

				$campo_grid ['formatoptions'] = array ('srcformat' => 's', 'newformat' => 'H:i' );

				break;

			case 'date':

				$campo_grid ['formatter'] = 'date';

				$campo_grid ['formatoptions'] = array( 'srcformat' => 'Y-m-d H:i:s', 'newformat' => 'd/m/Y' );

				break;

		}

	}

	$grid_config ['colModel'] [] = $campo_grid;

	$grid_config ['colNames'] [] = $lng [$Campos ['nome']];
        
}



// Campos auxiliares do grid

//$grid_config ['colModel'] [] = array ('name' => '', 'index' => '', 'width' => '30', 'sortable' => 1 );

$grid_config ['colModel'] [] = array ('name' => 'act', 'index' => 'act', 'width' => '150', 'sortable' => 0 );



$grid_config ['colNames'] = array_pad ( $grid_config ['colNames'], count ( $grid_config ['colModel'] ), 'A&ccedil;&otilde;es' );


recursive_utf8_encode ( $grid_config );

//echo "<pre>";print_r($grid_config['colNames']);echo "</pre>";die;


$smarty->assign ( 'sltCampos', $sltCampos );

$smarty->assign ( 'JQGRID_CONFIG', json_encode ( $grid_config ) );
$smarty->assign ( 'grid_config', $grid_config);


$smarty->assign ( 'tempo', $_SESSION ['atualizar_em'] );

$smarty->assign ( 'modulo', $modulo );

/**

 * 

 * Mï¿½dulos que nï¿½o utilizaram de alguns recursos no 

 * tplLista estes barrados por um "in_array" no smarty que

 * verifica se existe se o mï¿½dulo ira disponibilizar do recurso ou nï¿½o

 *  

 * */

// Geral ( not_display para btn adicionar, remover e multiselect )

$objPermissao = new Permissoes;

$objPermissao->setUsuario( $_SESSION['usr'] );

$objPermissao->setModulo( $modulo );



$objPermissao->setAcao( VISUALIZAR );

$display_visualizar = $objPermissao->getPerfilHasPermissaoHasAcao();



$objPermissao->setAcao( EDITAR );

$display_edit = $objPermissao->getPerfilHasPermissaoHasAcao();



$objPermissao->setAcao( CADASTRAR );

$display_cadastro = $objPermissao->getPerfilHasPermissaoHasAcao();



$objPermissao->setAcao( EXCLUIR );

$display_excluir = $objPermissao->getPerfilHasPermissaoHasAcao();



$smarty->assign( 'display_visualizar', $display_visualizar );

$smarty->assign( 'display_edit', $display_edit );

$smarty->assign( 'display_cadastro', $display_cadastro );

$smarty->assign( 'display_excluir', $display_excluir );



$smarty->assign( 'VISUALIZAR', VISUALIZAR );

$smarty->assign( 'EDITAR', EDITAR );

$smarty->assign( 'EXCLUIR', EXCLUIR );

$smarty->assign( 'CADASTRAR', CADASTRAR );



$display = array( 87, 49, 33, 22 );



$smarty->assign( 'display', $display );



//print_r($campos);

///die;

$smarty->assign ( 'campos', $campos );

$smarty->assign ( 'NomModulo', $NomModulo );

$smarty->assign ( 'id', $id );

$smarty->assign ( "cod_cliente", @$get ['cod_cliente'] );



//if(!$permissao['visualiza']) $acesso->redirect(ERRO_PERMISSAO);

$smarty->assign ( 'IMAGES', "../_img" );

/**
 * Dados da listas - Generico
 */
$objModulo = new Modulo ();

$obj = $objModulo->getObj ( $modulo );

if( !method_exists( $obj, 'listarPorRef' ) ) {
    
	$obj = $obj->listar ( null, implode(" AND ", $where));
        
} else {
    
	$obj = $obj->listarPorRef ( null, implode(" AND ", $where) );
        
}

$response = $obj->getDados();

if(!empty($response)){          
    
         foreach($response as $key => $objdata){
             
             foreach($sltCampos as $k => $val){         
                 //echo $sltCampos[$k];
                 $listtable[$key][$k] = $objdata[$val];
                 if($display_edit)
                     $btnEdit = '<a class="btn mini green" href="Visualiza.php?modulo='.$modulo.'&id='.$objdata[$sltCampos[0]].'&acao=8" title="Editar"><i class="icon-edit"></i></a>';
                 if($display_excluir)
                     $btnDelete = '<a class="btn mini red" href="javascript:void(0);" onclick="deleteLinha('.$objdata[$sltCampos[0]].');"  title="Deletar"><i class="icon-trash"></i></a>';
                 
                 $listtable[$key][$k+1] = $btnEdit.$btnDelete;
            }       
            
        }//die;
}


$smarty->assign ( 'listtable', $listtable );

// Template

// Verifica se existe o template da acao para o modulo atual e o carrega

// Caso nao exista, o template padrao o carregado

$smarty->assign('tplAct','_lst/default.htm');



if(file_exists('../_templates/_lst/'.$modulo.'.htm')) $smarty->assign('tplAct','_lst/'.$modulo.'.htm');

//Alterar de acordo com a aplicacao
$tplConteudo = $smarty->fetch ( 'tplLista.htm' );
?>