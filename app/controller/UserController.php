<?php

namespace App\Controller;

use App\App;
use Core\Auth\DBAuth;
use Core\Html\BootstrapForm;

class UserController extends AppController
{

    protected $template = 'signin';

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
        $form = new BootstrapForm($_POST);

        $this->render('user/login', compact('form', 'errors'));
    }
}