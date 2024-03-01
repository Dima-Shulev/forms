<?php

use Controllers\Controller;

class Error404Controller extends Controller
{
    public function index(){

        $this->view->generate("404_view.php","template_view.php");
    }

}