<?php 

spl_autoload_register('AutoLoader');

function AutoLoader($class){
	$path= 'classes/';
	$ext= '.php';

	$full_path= $path.$class.$ext;

	include_once $full_path;
}

?>