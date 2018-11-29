<?php

namespace ishop\base;

class View {
    
    public $route;
    public $controller;
    public $model;
    public $view;
    public $layout;
    public $prefix;
    public $data = [];
    public $meta = [];
    
    public function __construct($route, $layuot = '', $view = '', $meta ) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];
        $this->meta = $meta;
        if($layuot === false){
            $this->layout = false;
        } else {
            $this->layout = $layuot ?: LAYOUT;
        }
    }
    public function render($data){
        if(is_array($data)){
            extract($data);
        }
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}"
        . "/{$this->view}.php";
        
        if(is_file($viewFile)){
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
        }else{
            throw new Exception("cant find view {$viewFile}", 500);
        }
        if($this->layout !== false){
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if(is_file($layoutFile)){
                require_once $layoutFile;
            } else {
                throw new Exception("cant find layout {$this->layout}", 500);
            }
        }
    }
    
    public function getMeta(){
        $output  = '<title>' . $this->meta['title'] . '</title>' . PHP_EOL;
        $output .= '<meta name="description" content="' . $this->meta['desc'] . '">' . PHP_EOL;
        $output .= '<meta name="keywords" content="' . $this->meta['keywords'] . '">';
        return $output;
    }
}
