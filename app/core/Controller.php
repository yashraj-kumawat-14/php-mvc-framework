<?php

class Controller{
    public function view($name){
        $view = "../app/views/".$name.".view.php";
        if(file_exists($view)){
            require $view;
        }
        else{
            $view = "../app/views/"."404.view.php";
            require $view;
        }
    }
}