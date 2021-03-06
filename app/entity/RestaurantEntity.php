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
     * @var array
     */
    private array $cookingStyles;

    /**
     * Return URL to access restaurant details
     *
     * @return string
     */
    public function getUrl():string
    {
        return 'index.php?page=restaurant.show&id=' . $this->id;
    }

    /**
     * Return URL to access restaurant creation
     *
     * @return string
     */
    public static function getCreateUrl():string
    {
        return 'index.php?page=admin.restaurant.create';
    }

    /**
     * Return URL to access restaurant edition
     *
     * @return string
     */
    public function getEditUrl():string
    {
        return 'index.php?page=admin.restaurant.edit&id=' . $this->id;
    }

    /**
     * Return url to delete restaurant
     *
     * @return string
     */
    public static function getDeleteUrl():string
    {
       return 'index.php?page=admin.restaurant.delete'; 
    }

    public function showCookingStyles()
    {
        $cookingStyles = array();

        foreach($this->cookingStyles as $cookingStyle){
            $cookingStyles[] = $cookingStyle->getName();
        }

        return implode(', ', $cookingStyles);
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
     * Get the value of cookingStyles
     *
     * @return  integer
     */ 
    public function getCookingStyles()
    {
        return $this->cookingStyles;
    }

    /**
     * Set the value of cookingStyles
     *
     * @param  integer  $cookingStyles
     *
     * @return  self
     */ 
    public function setCookingStyles($cookingStyles)
    {
        $this->cookingStyles = $cookingStyles;

        return $this;
    }
}