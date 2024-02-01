<?php
class App{ 

    private $controller = "Home";
    private $method = 'index';
    private function getUrl(){
        $url = (isset($_GET['url']))?($_GET['url']):"home";
        $url = explode('/', $url);
        return $url;
    }
     public function loadController(){
        $url = $this->getUrl();
        $path = "../app/Controllers/".ucfirst($url[0]).".php";
        if(file_exists($path)){
            require $path;
            $this->controller = ucfirst($url[0]);
            $controller = new $this->controller;
            $controller->index();
            
        }
        else{
            $path = "../app/Controllers/"."_404.php";
            require $path;
        }
    }
}

