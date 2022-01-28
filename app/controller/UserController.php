<?php

namespace App\Controller;

use App\App;
use Core\Auth\DBAuth;
use Core\Html\Form;

class UserController extends AppController
{

    public function login()
    {
        $errors = false;

        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());

            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?page=admin.app.index');
            } else {
                $errors = true;
            }

        }
        $form = new Form($_POST);

        $this->render('user/login', compact('form', 'errors'));
    }
}