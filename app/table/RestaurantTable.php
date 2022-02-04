<?php

namespace App\Table;

use Core\Table\Table;

class RestaurantTable extends Table
{
    public function find(int $id):bool|object
    {
        $restaurant = parent::find($id);

        return $restaurant;
    }

    /**
     * Retrieves all records from the table restaurant with the associated CookingStyle
     *
     * @return array
     */
    public function findAllWithCookingStyle():array
    {
        return $this->query("SELECT restaurant.*
            FROM restaurant 
            LEFT JOIN cookStyle 
                ON restaurant.id = cookStyle.id_restaurant
            JOIN cookingStyle
                ON cookStyle.id_cookingStyle = cookingStyle.id;");
    }

    /**
     * Retrieves all records associated to a CookingStyle from the table restaurant
     *
     * @param integer $id_cookingStyle
     * @return array
     */
    public function findAllByCookingStyle(int $id_cookingStyle):array
    {
        return $this->query('SELECT restaurant.* 
            FROM restaurant
            JOIN cookStyle
                ON restaurant.id = cookStyle.id_restaurant
            WHERE cookStyle.id_cookingStyle = :id_cookingStyle;',
            [':id_cookingStyle' => $id_cookingStyle]);
    }

    /**
     * Retrieves random records
     *
     * @param integer $limit
     * @return array
     */
    public function findRandom($limit = 3):array
    {
        return $this->query("SELECT restaurant.*
            FROM restaurant
            ORDER BY RAND()
            LIMIT $limit;");
    }
}