<?php

namespace App;

use Core\Database\MysqlDatabase;
use Core\Config;

class App
{
    public string $title = 'Friendly Spoon';

    private $db_instance;

    private static $_instance;

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new App();
        }

        return self::$_instance;
    }

    public static function load()
    {
        session_start();

        require_once ROOT . '/app/Autoloader.php';
        \App\Autoloader::register();

        require_once ROOT . '/core/Autoloader.php';
        \Core\Autoloader::register();
    }

    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';

        return new $class_name($this->getDb());
    }

    public function getDb()
    {
        if ($this->db_instance === null) {
            $config = Config::getInstance(ROOT . '/config/config.php');

            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }

        return $this->db_instance;
    }
}
