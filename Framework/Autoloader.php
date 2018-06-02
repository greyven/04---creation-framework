<?php 

namespace App\Framework;


class Autoloader
{
    /**
     * Enregistre notre autoloader
     */
    static function register()
    { spl_autoload_register(array(__CLASS__, 'autoload')); }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class)
    {
        // App\Framework\Router

        // Framework/router.php

    	$class = str_replace('App\\', '', $class);
    	$class = str_replace('\\', '/', $class);
    	$class .= ".php";
        if(file_exists($class)) require $class;
    }
}