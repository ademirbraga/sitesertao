<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 *
 * Type:     modifier<br>
 * Name:     json_encode<br>
 * Date:     June 15, 2011
 * Purpose:  encode value an json object <<br>>
 * Input:<br>
 *         - contents = contents to replace
 * Example:  {$text|json_encode}
 * @version  1.0
 * @author   Thiago França <thiago at itaceutecnologia dot com dot br>
 * @param string/Array
 * @return object
 */
function smarty_modifier_json_encode( $entrada )
{
    return json_encode( $entrada );
}

/* vim: set expandtab: */

?>