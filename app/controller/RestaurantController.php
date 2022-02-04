<?php

namespace App\Controller;

class RestaurantController extends AppController
{
    public function __construct()
    {
        parent::__construct();

        $this->loadModel('Restaurant');
        $this->loadModel('CookingStyle');
    }

    /**
     * Load listing
     *
     * @return void
     */
    public function index()
    {
        $restaurants = $this->Restaurant->findAllWithCookingStyle();

        foreach($restaurants as $restaurant){
            $cookingStyles = $this->CookingStyle->findAllByRestaurant($restaurant->getId());

            $restaurant->setCookingStyles($cookingStyles);
        }

        $cookingStyles = $this->CookingStyle->findAll();


        $this->render('restaurant/index', compact('restaurants', 'cookingStyles'));
    }

    /**
     * Load listing by cooking style
     *
     * @return void
     */
    public function byCookingStyle()
    {
        
        $cookingStyle = $this->CookingStyle->find($_GET['id']);
        
        if ($cookingStyle === false) {
            $this->notFound();
        }
        
        $this->title = $cookingStyle->getName();
        
        $restaurants = $this->Restaurant->findAllByCookingStyle($_GET['id']);

        foreach($restaurants as $restaurant){
            $cookingStyles = $this->CookingStyle->findAllByRestaurant($restaurant->getId());

            $restaurant->setCookingStyles($cookingStyles);
        }
        
        $cookingStyles = $this->CookingStyle->findAll();

        $this->render('restaurant/byCookingStyle', compact('cookingStyle', 'restaurants', 'cookingStyles'));
    }

    /**
     * Load detail restaurant page
     *
     * @return void
     */
    public function show()
    {   
        $id = $_GET['id'];

        $restaurant = $this->Restaurant->find($id);
        
        if($restaurant === false){
            $this->notFound();
        }

        $cookingStyles = $this->CookingStyle->findAllByRestaurant($id);

        $restaurant->setCookingStyles($cookingStyles);
        
        $this->title = $restaurant->getName();

        return $this->render('restaurant/restaurant', compact('restaurant'));
    }
}