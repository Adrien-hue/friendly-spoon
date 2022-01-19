<?php

namespace App;

class Autoloader 
{

    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    /**
     * Require necessary class
     *
     * @param string $class_name
     * @return void
     */
    public static function autoload(string $class){
        
        $class = str_replace('\\', '/', $class);

        require dirname(__DIR__) . '/' . $class . '.php';
    }
}