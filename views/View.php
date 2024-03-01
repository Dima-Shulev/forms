<?php
namespace Views;

class View {

    function generate($content_view, $template_view, $arr = null)
    {
        if($template_view !== "404_view.php"){
            include 'views/'.$template_view;
        }else{
            include 'views/404_view.php';
        }
    }
}