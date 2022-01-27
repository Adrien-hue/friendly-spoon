<?php

namespace App\Controller\Admin;

use Core\Html\Form;
use App\Entity\RestaurantEntity;

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
        $createUrl = RestaurantEntity::getCreateUrl();
        $deleteUrl = RestaurantEntity::getDeleteUrl();

        $restaurants = $this->Restaurant->findAllWithCookingStyle();

        $this->render('admin/restaurant/index', compact('createUrl', 'deleteUrl', 'restaurants'));
    }

    public function create()
    {
        if(!empty($_POST)){
            $result = $this->Restaurant->create(
                [
                    'name' => $_POST['name'],
                    'address' => $_POST['address'],
                    'cp' => $_POST['cp'],
                    'city' => $_POST['city'],
                    'id_cookingStyle' => $_POST['id_cookingStyle']
                ]
            );

            if($result){
                return $this->index();
            }
        }

        $title = "Création d'un restaurant";

        $cookingStyles = $this->CookingStyle->toArray('id', 'name');

        $form = new Form($_POST);

        $this->render('admin/restaurant/edit', compact('title', 'form', 'cookingStyles'));
    }

    public function edit()
    {
        if(!empty($_POST)){
            $result = $this->Restaurant->update(
                $_GET['id'],
                [
                    'name' => $_POST['name'],
                    'address' => $_POST['address'],
                    'cp' => $_POST['cp'],
                    'city' => $_POST['city'],
                    'id_cookingStyle' => $_POST['id_cookingStyle']
                ]
            );

            if($result){
                return $this->index();
            }
        }

        $title = "Modification du restaurant";

        $restaurant = $this->Restaurant->find($_GET['id']);
        $cookingStyles = $this->CookingStyle->toArray('id', 'name');

        $form = new Form($restaurant);

        $this->render('admin/restaurant/edit', compact('title', 'form', 'cookingStyles'));
    }

    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->Restaurant->delete($_POST['id']);

            if($result){
                $this->index();
            }
        }
    }
}