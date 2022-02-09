<?php

namespace App\Controller\Admin;

use App\App;
use Core\Html\BootstrapForm;
use App\Entity\RestaurantEntity;

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
        $createUrl = RestaurantEntity::getCreateUrl();
        $deleteUrl = RestaurantEntity::getDeleteUrl();

        $restaurants = $this->Restaurant->findAllWithCookingStyle();

        return $this->render('admin/restaurant/index', compact('createUrl', 'deleteUrl', 'restaurants'));
    }

    /**
     * Load creation page and create restaurant
     *
     * @return void
     */
    public function create()
    {
        if (!empty($_POST)) {
            
            $id_restaurant = $this->Restaurant->create(
                [
                    'name' => $_POST['name'],
                    'address' => $_POST['address'],
                    'cp' => $_POST['cp'],
                    'city' => $_POST['city']
                ]
            );

            foreach($_POST['cookingStyles'] as $cookingStyle){
                $this->Restaurant->linkCookingStyle($cookingStyle, $id_restaurant);
            }

            if ($id_restaurant) {
                return $this->index();
            }
        }

        $title = "Création d'un restaurant";

        $cookingStyles = $this->CookingStyle->toArray('id', 'name');

        $form = new BootstrapForm($_POST);

        return $this->render('admin/restaurant/edit', compact('title', 'form', 'cookingStyles'));
    }

    /**
     * Load edition page and update restaurant
     *
     * @return void
     */
    public function edit()
    {
        $id_restaurant = $_GET['id'];

        if (!empty($_POST)) {
            $result = $this->Restaurant->update(
                $id_restaurant,
                [
                    'name' => $_POST['name'],
                    'address' => $_POST['address'],
                    'cp' => $_POST['cp'],
                    'city' => $_POST['city']
                ]
            );

            $this->Restaurant->unlinkedCookingStyles($id_restaurant);

            foreach($_POST['cookingStyles'] as $cookingStyle){
                $this->Restaurant->linkCookingStyle($cookingStyle, $id_restaurant);
            }

            if ($result) {
                return $this->index();
            }
        }

        $title = "Modification du restaurant";

        $restaurant = $this->Restaurant->find($id_restaurant);

        $cookingStyles = $this->CookingStyle->findAllByRestaurant($restaurant->getId());

        $restaurant->setCookingStyles($cookingStyles);

        $cookingStyles = $this->CookingStyle->toArray('id', 'name');

        $form = new BootstrapForm($restaurant);

        return $this->render('admin/restaurant/edit', compact('title', 'form', 'cookingStyles'));
    }

    /**
     * Delete restaurant
     *
     * @return void
     */
    public function delete()
    {
        if (!empty($_POST)) {
            $result = $this->Restaurant->delete($_POST['id']);

            if ($result) {
                return $this->index();
            }
        }
    }
}
