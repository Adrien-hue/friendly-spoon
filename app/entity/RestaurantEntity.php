<?php

namespace App\Entity;

use Core\Entity\Entity;

class RestaurantEntity extends Entity
{
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
    private string|null $description;

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

    /**
     * @var integer
     */
    private int $id_cookingStyle;

    /**
     * Return URL to access restaurant details
     *
     * @return string
     */
    public function getUrl():string
    {
        return 'index.php?page=restaurant&id=' . $this->id;
    }

    /**
     * Return URL to access restaurant creation
     *
     * @return string
     */
    public static function getCreateUrl():string
    {
        return 'admin.php?page=restaurant&create=1';
    }

    /**
     * Return URL to access restaurant edition
     *
     * @return string
     */
    public function getEditUrl():string
    {
        return 'admin.php?page=restaurant&edit=1&id=' . $this->id;
    }

    /**
     * Return url to delete restaurant
     *
     * @return string
     */
    public static function getDeleteUrl():string
    {
       return 'admin.php?page=restaurant&delete=1'; 
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
     * @return  string|null
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string|null  $description
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

    /**
     * Get the value of id_cookingStyle
     *
     * @return  integer
     */ 
    public function getId_cookingStyle()
    {
        return $this->id_cookingStyle;
    }

    /**
     * Set the value of id_cookingStyle
     *
     * @param  integer  $id_cookingStyle
     *
     * @return  self
     */ 
    public function setId_cookingStyle($id_cookingStyle)
    {
        $this->id_cookingStyle = $id_cookingStyle;

        return $this;
    }
}