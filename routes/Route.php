<?php

class Route
{
    private $nameController;
    private $nameMethod;

    public function start()
    {
        // контроллер и действие по умолчанию
        $this->nameController = 'Main';
        $this->nameMethod = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        // получаем имя контроллера
        if (!empty($routes[1])){ $this->nameController = $routes[1]; }
        // получаем имя экшена
        if (!empty($routes[2])){ $this->nameMethod = $routes[2]; }

        $this->nameController= ucfirst($this->nameController).'Controller';

        $controllerFile = $this->nameController.'.php';
        $controllerPath = "application/Controllers/".$controllerFile;
        //если существует файл контроллера, то подключаем его

        if(file_exists($controllerPath)){
            include "application/Controllers/".$controllerFile;
        } else {
            Route::Page404();
        }

        // создаем контроллер
        $controller = new $this->nameController;
        $action = $this->nameMethod;






        if(method_exists($controller, $action)){
            $controller->$action();
        }else{
            Route::Page404();
        }
    }

    static public function Page404()
    {
       /* $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
        exit;*/

        $errors404 = new Error404Controller();
        $errors404->index();
        exit;
    }
}