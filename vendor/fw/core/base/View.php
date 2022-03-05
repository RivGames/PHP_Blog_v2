<?php
namespace fw\core\base;

use Exception;

class View
{
    public $route = [];
    public $view;
    public $layout;

    public function __construct($route,$view='',$layout='')
    {
        $this->route = $route;
        if($layout === false){
            $this->layout = false;
        }else{
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;
        $this->layout = $layout ?: LAYOUT;

    }
    public function render($vars)
    {   
        extract($vars);
        $file_view = APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if(is_file($file_view))
        {
            require $file_view;
        }else
        {
            throw new Exception("Не найден вид <b>$file_view</b>",404);
        }
        $content = ob_get_clean();
        if(false !== $this->layout)
        {
            $file_layout = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($file_layout))
            {
                require $file_layout;
            }else
            {   
                throw new Exception("Не найден шаблон <b>$file_view</b>",404);
            }
        }
    }
}