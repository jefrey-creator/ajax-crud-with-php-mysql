<?php 
// error_reporting(E_ALL);
include 'env.php';

spl_autoload_register(function($class){
	include 'class/'.$class.'.php';
});