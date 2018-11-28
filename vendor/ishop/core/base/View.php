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
}
