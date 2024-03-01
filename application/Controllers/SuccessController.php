<?php

use Controllers\Controller;

class SuccessController extends Controller
{
    public function index(){

        $this->view->generate("success_view.php","template_view.php");
    }

}