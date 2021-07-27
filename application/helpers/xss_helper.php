<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function output($str){
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}
 
?>