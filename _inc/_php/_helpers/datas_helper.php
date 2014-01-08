<?php
/**
 * @name converteData
 * 
 * @param date $data 
 * @param string $padrao
 * @return date
 * 
 * @desc Metodo para converter data de um padrao para outro
 */
function converteData($data='',$padrao='%Y-%m-%d'){
    return  strftime($padrao, strtotime($data));
}