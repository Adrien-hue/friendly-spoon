<?php

namespace Core;

class Config
{
    private static $_instance;

    private array $setting = [];

    /**
     * return Config instance
     *
     * @param string $file
     * @return Config
     */
    public static function getInstance(string $file){
        if(self::$_instance === null){
            self::$_instance = new Config($file);
        }

        return self::$_instance;
    }

    public function __construct($file)
    {
        $this->setting = require($file);
    }

    /**
     * Return specific setting value
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        if(!isset($this->setting[$key])){
            return null;
        }

        return $this->setting[$key];
    }
}