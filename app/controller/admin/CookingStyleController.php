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

        $this->render('admin/cookingStyle/index', compact('createUrl', 'cookingStyles', 'deleteUrl'));
    }

    public function create()
    {

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
                $this->index();
            }
        }

        $cookingStyle = $this->CookingStyle->find($_GET['id']);

        $form = new Form($cookingStyle);

        $this->render('admin/cookingStyle/edit', compact('cookingStyle', 'form'));
    }

    public function delete()
    {

    }

}