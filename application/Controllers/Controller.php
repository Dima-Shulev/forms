<?php
namespace Controllers;

use JetBrains\PhpStorm\Pure;
use Views\View;

class Controller {

    public $model;
    public $view;

    public function __construct(){
        $this->view = new View();
    }

    public function index(){

    }
}