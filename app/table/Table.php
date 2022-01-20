<?php

namespace App\Table;

class Table
{
    protected $table;

    public function __construct()
    {
        if($this->table === null){
            $class_name = explode('\\', get_class($this));
            $class_name = end($class_name);
    
            $table = strtolower(str_replace('Table', '', $class_name));
    
            $this->table = $table;
        }
    }

    public function query($statement)
    {

    }
}