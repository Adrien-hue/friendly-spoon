<?php

namespace App;

use App\Database\MysqlDatabase;

class App
{
    public string $title = 'Friendly Spoon';

    private $db_instance;
    
    private static $_instance;

    public static function getInstance()
    {
        if(self::$_instance === null){
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';

        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        if($this->db_instance === null){
            $config = Config::getInstance();
    
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }

        return $this->db_instance;
    }
}