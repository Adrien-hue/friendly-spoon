<?php

namespace App;

class App
{
    
    const DB_NAME = 'friendly_spoon';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = 'localhost';

    private static $_database;

    public static function getDb()
    {
        if(self::$_database === null){
            self::$_database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        
        return self::$_database;
    }
}