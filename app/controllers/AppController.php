<?php

namespace app\controllers;

class AppController extends \ishop\base\Controller {
    
    public function __construct($route) {
        parent::__construct($route);
        new \app\models\AppModel();
    }
}
