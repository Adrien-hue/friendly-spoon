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

    public function index()
    {
        $restaurants = $this->Restaurant->findAllWithCookingStyle();
        $cookingStyles = $this->CookingStyle->findAll();


        $this->render('restaurant/index', compact('restaurants', 'cookingStyles'));
    }

    public function byCookingStyle()
    {
        
        $cookingStyle = $this->CookingStyle->find($_GET['id']);
        
        if ($cookingStyle === false) {
            $this->notFound();
        }
        
        $this->title = $cookingStyle->getName();
        
        $restaurants = $this->Restaurant->findAllByCookingStyle($_GET['id']);
        
        $cookingStyles = $this->CookingStyle->findAll();

        $this->render('restaurant/byCookingStyle', compact('cookingStyle', 'restaurants', 'cookingStyles'));
    }

    public function show()
    {   
        $restaurant = $this->Restaurant->find($_GET['id']);
        
        if($restaurant === false){
            $this->notFound();
        }
        $cookingStyle = $this->CookingStyle->find($restaurant->getId_cookingStyle());
        
        $this->title = $restaurant->getName();

        $this->render('restaurant/restaurant', compact('restaurant', 'cookingStyle'));
    }
}