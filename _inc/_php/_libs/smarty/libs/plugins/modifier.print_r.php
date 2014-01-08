<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty print_r modifier plugin
 *
 * Type:     modifier<br>
 * Name:     count_words<br>
 * Purpose:  count the number of words in a text
 * @link http://smarty.php.net/manual/en/language.modifier.count.words.php
 *          count_words (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @return integer
 */
function smarty_modifier_print_r($arDados=array())
{
    return print_r($arDados);
}

/* vim: set expandtab: */

?>
