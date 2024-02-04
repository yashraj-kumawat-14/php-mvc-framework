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
        $data = ["name"=>"himanshu jia", "phone"=>"2341212121", "email"=>"hemish@gmail.com"];
        $model = new Model();
        echo var_dump($model->delete(6));
    }
}