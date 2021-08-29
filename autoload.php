<?php

function controller_autocargar($classname){
	
	include 'controllers/'.$classname.'.php';
	
}
spl_autoload_register('controller_autocargar');