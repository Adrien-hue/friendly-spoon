<?php

namespace Core\Auth;

use Core\Database\MysqlDatabase;

class DBAuth
{
    private $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
    }

    public function getUserId()
    {
        if($this->logged()){
            return $_SESSION['user']['id'];
        } else {
            return false;
        }
    }

    /**
     * Try to connect user with username and password
     *
     * @param string $username
     * @param string $password
     * @return boolean
     */
    public function login(string $username, string $password):bool
    {
        $isLogin = false;

        $user = $this->db->prepare("SELECT *
            FROM user
            WHERE username = :username;",
            [':username' => $username],
            null,
            true);
        
        if($user && $user->password === sha1($password)){
            $isLogin = true;

            $_SESSION['auth'] = true;
            $_SESSION['user']['id'] = $user->id;
        }

        return $isLogin;
    }

    /**
     * Check if the user is connected
     *
     * @return boolean
     */
    public function logged():bool
    {
        $isLogged = false;

        if(isset($_SESSION['auth']) && $_SESSION['auth'] === true){
            $isLogged = true;
        }

        return $isLogged;
    }
}