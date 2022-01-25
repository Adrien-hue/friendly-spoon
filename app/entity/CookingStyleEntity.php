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
        return 'index.php?page=cookingStyle&id=' . $this->id;
    }

    /**
     * Return URL to access cooking style creation
     *
     * @return string
     */
    public static function getCreateUrl():string
    {
        return 'admin.php?page=cookingStyle&create=1';
    }

    /**
     * Return URL to access cooking style edition
     *
     * @return string
     */
    public function getEditUrl():string
    {
        return 'admin.php?page=cookingStyle&edit=1&id=' . $this->id;
    }

    /**
     * Return URL to delete cooking style
     *
     * @return string
     */
    public static function getDeleteUrl():string
    {
        return 'admin.php?page=cookingStyle&delete=1';
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