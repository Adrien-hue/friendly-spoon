<?php

namespace App\Table;

use Core\Table\Table;

class RestaurantTable extends Table
{
    /**
     * Retrieves all records from the table restaurant with the associated CookingStyle
     *
     * @return array
     */
    public function findAllWithCookingStyle():array
    {
        return $this->query("SELECT restaurant.*, cookingStyle.name as cookingStyle
            FROM restaurant 
            LEFT JOIN cookingStyle 
                ON restaurant.id_cookingStyle = cookingStyle.id;");
    }

    /**
     * Retrieves all records associated to a CookingStyle from the table restaurant
     *
     * @param integer $id_cookingStyle
     * @return array
     */
    public function findAllByCookingStyle(int $id_cookingStyle):array
    {
        return $this->query("SELECT restaurant.*, cookingStyle.name as cookingStyle
            FROM restaurant 
            LEFT JOIN cookingStyle 
                ON restaurant.id_cookingStyle = cookingStyle.id
            WHERE cookingStyle.id = :id;",
            [':id' => $id_cookingStyle]);
    }
}