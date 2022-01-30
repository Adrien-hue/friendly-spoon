<?php

namespace App\Controller;

use App\App;
use Core\Controller\Controller;

class AppController extends Controller
{
    protected $template = 'default';

    public function __construct()
    {
        $this->viewPath = ROOT . '/app/view/';
    }

    protected function loadModel($model_name)
    {
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

    /**
     * Load home page
     */
    public function index()
    {
        $this->loadModel('Restaurant');
        
        $restaurants = $this->Restaurant->findRandom(3);

        return $this->render('index', compact('restaurants'));
    }

    /**
     * Return 404 Error and kill the app
     *
     * @return void
     */
    public function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        die('Page introuvable !');
    }

    /**
     * Return 403 Forbidden Header and kill the app
     *
     * @return void
     */
    public function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        die('Accès interdit !');
    }
}