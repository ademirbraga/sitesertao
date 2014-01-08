<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 *
 * Type:     modifier<br>
 * Name:     json_decode<br>
 * Date:     June 15, 2011
 * Purpose:  decode a json object <<br>>
 * Input:<br>
 *         - contents = contents to replace
 * Example:  {$text|json_decode}
 * @version  1.0
 * @author   Thiago França <thiago at itaceutecnologia dot com dot br>
 * @param object
 * @return string
 */
function smarty_modifier_json_decode($string)
{
    return json_decode($string);
}

/* vim: set expandtab: */

?>