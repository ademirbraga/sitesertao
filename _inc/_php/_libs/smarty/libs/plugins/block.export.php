<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     block.export.php
 * Type:     block
 * Name:     export
 * Purpose:  mark export text
 * -------------------------------------------------------------
 */
function smarty_block_export($params, $content, &$smarty, &$repeat)
{
	$ex = isset($_REQUEST['export']) && (int)$_REQUEST['export'];
	
	switch ( $params['func'] ) {
		case 'exclude':			
			$content = $ex ? '' : $content;
			break;
		default :
			$content = $ex ? $content : '';
			break;	
	}
	
    return $content;
}