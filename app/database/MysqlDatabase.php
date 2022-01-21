<?php

namespace App\Database;

use \PDO;

class MysqlDatabase extends Database
{
    /**
     * @var string
     */
    private string $db_name;

    /**
     * @var string
     */
    private string $db_user;

    /**
     * @var string
     */
    private string $db_pass;

    /**
     * @var string
     */
    private string $db_host;

    private $pdo;

    /**
     * Create Database instance
     *
     * @param string $db_name database name
     * @param string $db_user database user
     * @param string $db_pass database user's password
     * @param string $db_host database host
     */
    public function __construct(string $db_name, string $db_user = 'root', string $db_pass = 'root', string $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPdo()
    {
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=friendly_spoon;host=localhost', 'root', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    /**
     * Execute query
     *
     * @param string $statement
     * @param string $class_name class to return
     * @return void
     */
    public function query(string $statement, string $class_name = null, bool $one = false)
    {
        $req = $this->getPdo()->query($statement);

        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        } else {
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }

        if($one){
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }

        return $data;
    }

    /**
     * Execute prepared query
     *
     * @param string $statement
     * @param array $params
     * @param string $class_name class to return
     * @param boolean $one
     * @return void
     */
    public function prepare(string $statement, array $params, string $class_name, bool $one = false)
    {
        $req = $this->getPdo()->prepare($statement);

        $req->execute($params);

        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if($one){
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }

        return $data;
    }
}