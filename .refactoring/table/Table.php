<?php 

namespace App\Table;

use App\App;

class Table
{
    protected static $_table;

    public static function query(string $statement, array $params = [], bool $one = false)
    {
        if(empty($params)){
            return App::getDb()->query($statement, get_called_class(), $one);
        } else {
            return App::getDb()->prepare($statement, $params, get_called_class(), $one);
        }
    }

    public static function find($id){
        return App::getDb()->prepare(
            "SELECT * FROM " . static::$_table . " WHERE id = :id",
            [':id' => $id],
            get_called_class(),
            true
        ); 
    }

    public static function findAll()
    {
        return App::getDb()->query(
            "SELECT * FROM " . static::$_table,
            get_called_class()
        );
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);

        $this->$key = $this->$method;

        return $this->$key;
    }
}