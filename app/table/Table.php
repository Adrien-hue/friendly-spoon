<?php

namespace App\Table;

class Table
{
    protected $table;

    protected $db;

    public function __construct(\App\Database\MysqlDatabase $db)
    {
        $this->db = $db;

        if($this->table === null){
            $class_name = explode('\\', get_class($this));
            $class_name = end($class_name);
    
            $table = strtolower(str_replace('Table', '', $class_name));
    
            $this->table = $table;
        }
    }

    public function find()
    {

    }

    public function findAll()
    {
        return $this->db->query('SELECT * FROM restaurant');
    }
}