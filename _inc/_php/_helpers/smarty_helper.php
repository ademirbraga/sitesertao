<?php
/**
 * @author: Ademir Braga
 * @name smartyAssign
 * 
 * @param object $smarty
 * @param array $arDisplay 
 * 
 * @desc: Metodo para enviar todos os dados via smarty,
 * para evitar que varias chamdas a este metodo sejam utilizados
 * nos aplicativos, utiliza-se somente uma chamada deste metodo para tal.
 */
function smartyAssign($smarty, $arDisplay=array()) {
    foreach ($arDisplay as $key => $display)
        $smarty->assign($key, $display);
}