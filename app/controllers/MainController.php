<?php

namespace app\controllers;

class MainController extends AppController {

        public function indexAction(){
            $this->setMeta("Main Page", "Some description", "Some keywords");
            $names = ['Andrey', 'John'];
            $posts = \RedBeanPHP\R::findAll('test');
            
            $cache = \ishop\Cache::instance();
  //          $cache->set('test', $names);
            $this->set(compact('posts'));
            
            $data = $cache->get('test');
            debug($data);
            
    }
}
