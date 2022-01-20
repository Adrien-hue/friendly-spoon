<?php

namespace App\Table;

use App\App;

class Restaurant extends Table
{
    protected static $_table = 'restaurant';

    /**
     * @var integer
     */
    private int $id;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var string
     */
    private string $address;

    /**
     * @var string
     */
    private string $cp;

    /**
     * @var string
     */
    private string $city;

    public function getUrl()
    {
        return 'index.php?page=restaurant&id=' . $this->id;
    }

    public static function findAll()
    {
        return self::query(
            "SELECT restaurant.*, cookingStyle.name as cookingStyle
            FROM restaurant 
            LEFT JOIN cookingStyle 
                ON restaurant.id_cookingStyle = cookingStyle.id;");
    }

    public static function findAllByCookingStyle($id_cookingStyle)
    {
        return self::query(
            "SELECT restaurant.*, cookingStyle.name as cookingStyle
            FROM restaurant 
            LEFT JOIN cookingStyle 
                ON restaurant.id_cookingStyle = cookingStyle.id
            WHERE cookingStyle.id = :id;",
            [':id' => $id_cookingStyle]);
    }

    /************************************************************************************************/
    /**************************************                   ***************************************/
    /**************************************  Getter & Setter  ***************************************/
    /**************************************                   ***************************************/
    /************************************************************************************************/

    /**
     * Get the value of id
     *
     * @return  integer
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  integer  $id
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
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of address
     *
     * @return  string
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @param  string  $address
     *
     * @return  self
     */ 
    public function setAddress(string $address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of cp
     *
     * @return  string
     */ 
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set the value of cp
     *
     * @param  string  $cp
     *
     * @return  self
     */ 
    public function setCp(string $cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get the value of city
     *
     * @return  string
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @param  string  $city
     *
     * @return  self
     */ 
    public function setCity(string $city)
    {
        $this->city = $city;

        return $this;
    }
}