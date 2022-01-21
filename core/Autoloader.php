<?php

namespace Core;

class Autoloader 
{

    /**
     * Save the autoloader
     *
     * @return void
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }


    /**
     * Require necessary class corresponding to the class
     *
     * @param string $class_name name of the class to require
     * @return void
     */
    public static function autoload(string $class)
    {
        
        $class = str_replace('\\', '/', $class);

        require_once dirname(__DIR__) . '/' . $class . '.php';
    }
}