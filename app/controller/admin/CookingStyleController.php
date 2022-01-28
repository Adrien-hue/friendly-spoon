<?php

namespace App\Controller\Admin;

use App\Entity\CookingStyleEntity;
use Core\Html\Form;

class CookingStyleController extends AppController
{
    public function __construct()
    {
        parent::__construct();

        $this->loadModel('CookingStyle');
    }

    public function index()
    {
        $cookingStyles = $this->CookingStyle->findAll();

        $createUrl = CookingStyleEntity::getCreateUrl();

        $deleteUrl = CookingStyleEntity::getDeleteUrl();

        return $this->render('admin/cookingStyle/index', compact('createUrl', 'cookingStyles', 'deleteUrl'));
    }

    public function create()
    {
        if(!empty($_POST)){

            $result = $this->CookingStyle->create(
                [
                    'name' => $_POST['name']
                ]
            );

            if($result){
                return $this->index();
            }
        }

        $form = new Form($_POST);

        return $this->render('admin/cookingStyle/edit', compact('form'));
    }

    public function edit()
    {
        if(!empty($_POST)){

            $result = $this->CookingStyle->update(
                $_GET['id'],
                [
                    'name' => $_POST['name']
                ]
            );

            if($result){
                return $this->index();
            }
        }

        $cookingStyle = $this->CookingStyle->find($_GET['id']);

        $form = new Form($cookingStyle);

        return $this->render('admin/cookingStyle/edit', compact('form'));
    }

    public function delete()
    {
        if(!empty($_POST)){
            $result = $this->CookingStyle->delete($_POST['id']);
        
            if($result){
                return $this->index();
            }
        }
    }

}