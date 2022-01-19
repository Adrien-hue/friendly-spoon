<?php

namespace App;

use \PDO;

class Database
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

    public function query(string $statement, string $class_name)
    {
        $req = $this->getPdo()->query($statement);

        $data = $req->fetchAll(PDO::FETCH_CLASS, $class_name);

        return $data;
    }

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