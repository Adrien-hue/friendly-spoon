<?php

namespace App\Entity;

use Core\Entity\Entity;

class CookingStyleEntity extends Entity
{
    private int $id;

    private string $name;

    /**
     * Return URL to access cooking style details
     *
     * @return string
     */
    public function getUrl():string
    {
        return 'index.php?page=cooking.show&id=' . $this->id;
    }

    /**
     * Return URL to access cooking style creation
     *
     * @return string
     */
    public static function getCreateUrl():string
    {
        return 'index.php?page=admin.cookingStyle.create';
    }

    /**
     * Return URL to access cooking style edition
     *
     * @return string
     */
    public function getEditUrl():string
    {
        return 'index.php?page=admin.cookingStyle.edit&id=' . $this->id;
    }

    /**
     * Return URL to delete cooking style
     *
     * @return string
     */
    public static function getDeleteUrl():string
    {
        return 'index.php?page=admin.cookingStyle.delete';
    }

    /**
     * Return URL to access listing restaurants by cooking style
     *
     * @return string
     */
    public function getByCookingStyleUrl():string
    {
        return 'index.php?page=restaurant.byCookingStyle&id=' . $this->id;
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