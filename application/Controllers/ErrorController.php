<?php

use Controllers\Controller;

class ErrorController extends Controller
{
    public function index(){

        $this->view->generate("error_view.php","template_view.php");
    }

}
