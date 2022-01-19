<?php

namespace App;

class App
{
    public string $title = 'Friendly Spoon';

    private static $_instance;

    public static function getInstance()
    {
        if(self::$_instance === null){
            self::$_instance = new App();
        }

        return self::$_instance;
    }
}