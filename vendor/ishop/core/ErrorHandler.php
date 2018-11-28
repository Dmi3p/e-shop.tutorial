<?php

namespace ishop;

class ErrorHandler
{
    public function __construct(){
        if(DEBUG){
            error_reporting(-1);
        } else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler($e){
        $this->writeErrorLog($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError("Exception", $e->getMessage(), $e->getFile(),
                $e->getLine(), $e->getCode());
    }

    public function writeErrorLog ($message = '', $file = '', $line = ''){
    $fd = fopen(ROOT . '/tmp/errors.log', 'a') or die("can't open file");
    $str = "[" . date('Y-m-d H:i:s') 
                . "] Error message: {$message} | "
                . "Filename: {$file} | Line: {$line}"
               . "\n===============================\n";
       fwrite($fd, $str);
       fclose($fd);           
}
        
    protected function displayError($errno, $errstr, $errfile,
            $errline, $responce = 404){
        http_response_code($responce);
        if($responce == 404 && !DEBUG){
            require_once WWW . '/errors/404.php';
            die;
        }
        if(DEBUG){
            require_once WWW . '/errors/dev.php';
        } else {
            require_once WWW . '/errors/prod.php';
        }
        die;
    }
}