<?php
class Autoloader{
	public function register(){
		spl_autoload_register(array(__class__,'autoload'));

	} 

	public function autoload($classname){
		require 'class/'.$classname.'.php';
	}
}
?>