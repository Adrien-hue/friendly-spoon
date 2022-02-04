<?php

namespace App\Table;

use Core\Table\Table;

class CookingStyleTable extends Table
{
    protected $table = 'cookingStyle';

    /**
     * Retrieves cooking styles linked to a restaurant
     *
     * @param integer $id_restaurant
     * @return array
     */
    public function findAllByRestaurant(int $id_restaurant):array
    {
        return $this->query('SELECT cookingStyle.* 
            FROM cookingStyle
            JOIN cookStyle
                ON cookingStyle.id = cookStyle.id_cookingStyle
            WHERE cookStyle.id_restaurant = :id_restaurant;',
            [':id_restaurant' => $id_restaurant]);
    }
}