<?php

namespace App\Table;

use App\App;

class CookingStyle
{
    private static $_table = 'cookingStyle';

    private int $id;

    private string $name;

    public static function findAll()
    {
        return App::getDb()->query(
            "SELECT *
            FROM " . self::$_table,
            __CLASS__);
    }

    /************************************************************************************************/
    /**************************************                   ***************************************/
    /**************************************  Getter & Setter  ***************************************/
    /**************************************                   ***************************************/
    /************************************************************************************************/
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}