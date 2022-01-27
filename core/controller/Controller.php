<?php

namespace Core\Controller;

class Controller
{
    protected $viewPath;

    protected $template;
    
    public function render(string $view, array $variables = [])
    {
        ob_start();

        extract($variables);

        $view = $this->viewPath . $view . '.php';
        
        require($view);

        $content = ob_get_clean();

        require($this->viewPath . 'templates/' . $this->template . '.php');
    }
}