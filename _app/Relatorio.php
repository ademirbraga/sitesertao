<?php



// Breadcrumb "Painel > Relat�rio"



$extras['breadcrumbs']['Relat�rios'] = "";



defined('WWW_ROOT') || define("WWW_ROOT", "../");



include WWW_ROOT . "_inc/_php/geral.inc.php";



$modulo_relatorio = isset($_GET['modulo']) ? $_GET['modulo'] : null;

$metodo = isset($_GET['metodo']) ? $_GET['metodo'] : 'getRelatorioDefault';



$metodoGrafico = isset($_GET['grafico']) ? $_GET['grafico'] : '';



if (isset($metodoGrafico))

    $smarty->assign('metodoGrafico', $metodoGrafico);





if (null === $modulo_relatorio)

    throw new Exception('M�dulo n�o informado');



$objRelatorio = new Relatorio($modulo_relatorio, $metodo);



$objPermissao = new Permissoes;

$objPermissao->setUsuario($_SESSION['usr']);

$objPermissao->setModulo($modulo_relatorio);

$objPermissao->setAcao(VISUALIZAR);



$permissao = $objPermissao->getPerfilHasPermissaoHasAcao();



if ($permissao) {



    if ($objRelatorio->isLoad()) {



        $formulario = $objRelatorio->formulario;



        $smarty->assign('formulario', $formulario);

    }



    /**

     * Gr�fico

     */

    if (isset($_GET['grafico'])) {



        $objModulo = new Modulo();

        $metodos = $_GET['grafico'];



        if (is_array($metodos)) {



            foreach ($metodos as $key => $value) {

                $num = $key == 0 ? '' : $key;



                $objGrafico = $objModulo->getObj($modulo_relatorio);

                $metodo_grafico = base64_decode($value);

                $grafico = $objGrafico->$metodo_grafico();

                $smarty->assign("grafico$num", $grafico);

            }

        } else {

            $objGrafico = $objModulo->getObj($modulo_relatorio);

            $metodo_grafico = base64_decode($metodos);

            $grafico = $objGrafico->$metodo_grafico();

            $smarty->assign("grafico", $grafico);

        }

    }

    /**

     * Fim Gr�fico

     */

    /**

     * incluir arquivos js quando necessario

     */

    $arqsJs = $objRelatorio->getArquivosJS();

    $smarty->assign('arqsJs', $arqsJs);



    // �ndices que n�o s�o atributos para montagem dos campos

    $excludeAttr = array('tag', 'options');

    $smarty->assign('exAttr', $excludeAttr);



    $smarty->assign('modulo', MODULO_RELATORIO);

    $smarty->assign('modulo_relatorio', $modulo_relatorio);

    $smarty->assign('nom_relatorio', $objRelatorio->getnomRelatorio());

    $smarty->assign('metodo', $metodo);



    $tplConteudo = $smarty->fetch('tplRelatorio.htm');



    $smarty->assign('relatorio', true);

} else {



    $objModulo = new Modulo;



    $modulo = $objModulo->getObj($modulo_relatorio);



    $smarty->assign('modulo_name', $modulo->getnomModulo());

    $smarty->assign('acao', 'visualizar');



    $tplConteudo = $smarty->fetch('tplPermissaoNegada.htm');

}



$smarty->assign('tplConteudo', $tplConteudo);



$smarty->display('tplMonitoramento.htm');

?>

