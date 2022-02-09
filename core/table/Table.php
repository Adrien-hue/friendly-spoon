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
     * Create a new record by its id
     *
     * @param integer $id
     * @param array $fields
     * @return int
     */
    public function create(array $fields)
    {
        $inserted_fields = array();
        $params = array();

        foreach($fields as $key => $value){
            $inserted_fields[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $sql_part = implode(',', $inserted_fields);

        $this->query("INSERT INTO {$this->table} SET $sql_part;", $params, true);

        return $this->db->lastInsertId();
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

    /**
     * Update record by its id
     *
     * @param integer $id
     * @param array $fields
     * @return bool
     */
    public function update(int $id, array $fields):bool
    {
        $updated_fields = array();
        $params = array();

        foreach($fields as $key => $value){
            $updated_fields[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $params[':id'] = $id;

        $sql_part = implode(',', $updated_fields);

        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id = :id;", $params, true);
    }

    /**
     * Delete record by its id
     *
     * @param integer $id
     * @return bool
     */
    public function delete(int $id):bool
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = :id;", [':id' => $id], true);
    }

    public function toArray(int|string $key, mixed $value):array
    {
        $records = $this->findAll();
        
        $array = array();

        $keyMethod = 'get' . ucfirst($key);
        $valueMethod = 'get' . ucfirst($value);

        foreach($records as $record){
            $array[$record->$keyMethod()] = $record->$valueMethod();
        }

        return $array;
    }
}