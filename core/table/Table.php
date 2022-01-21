<?php

namespace Core\Table;

use Core\Database\MysqlDatabase;

class Table
{
    protected $table;

    protected $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;

        if($this->table === null){
            $class_name = explode('\\', get_class($this));
            $class_name = end($class_name);
    
            $table = strtolower(str_replace('Table', '', $class_name));
    
            $this->table = $table;
        }
    }

    /**
     * Executes a statement, with its params if they provided, and return the result
     *
     * @param string $statement
     * @param array $params
     * @param boolean $one
     * @return bool|object|array
     */
    public function query(string $statement, array $params = [], $one = false):bool|object|array
    {
        $class_name = str_replace('Table', 'Entity', get_class($this));

        if(!empty($params)){
            return $this->db->prepare($statement, $params, $class_name, $one);
        } else {
            return $this->db->query($statement, $class_name, $one);
        }
    }

    /**
     * Retrieves specific record based on its id
     *
     * @param int $id
     * @return object
     */
    public function find(int $id):bool|object
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = :id", [':id' => $id], true);
    }

    /**
     * Retrieves all records from a table
     *
     * @return array
     */
    public function findAll():array
    {
        return $this->query('SELECT * FROM ' . $this->table);
    }
}