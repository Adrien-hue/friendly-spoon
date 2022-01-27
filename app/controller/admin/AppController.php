<?php

namespace App\Controller\Admin;

use App\Controller\AppController as ControllerAppController;
use App\App;
use Core\Auth\DBAuth;

class AppController extends ControllerAppController
{
    protected $template = 'default';

    public function __construct()
    {
        parent::__construct();

        $app = App::getInstance();

        $auth = new DBAuth($app->getDb());

        if(!$auth->logged()){
            $this->forbidden();
        }

        $this->viewPath = ROOT . '/app/view/';
    }

    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}