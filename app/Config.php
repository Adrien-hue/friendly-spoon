<?php

namespace App;

class Config
{
    private static $_instance;

    private array $setting = [];

    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new Config();
        }

        return self::$_instance;
    }

    public function __construct()
    {
        $this->setting = require dirname(__DIR__) . '/config/config.php';
    }

    public function get($key)
    {
        if(!isset($this->setting[$key])){
            return null;
        }

        return $this->setting[$key];
    }
}