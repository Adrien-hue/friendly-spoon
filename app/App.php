<?php

namespace App;

class App
{
    
    const DB_NAME = 'friendly_spoon';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = 'localhost';

    private static $_database;

    private static $_title = 'Friendly Spoon';

    public static function getDb()
    {
        if(self::$_database === null){
            self::$_database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        
        return self::$_database;
    }

    public static function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Location: index.php?page=404');
    }

    public static function getTitle(){
        return self::$_title;
    }

    public static function setTitle($title)
    {
        self::$_title = $title;
    }
}