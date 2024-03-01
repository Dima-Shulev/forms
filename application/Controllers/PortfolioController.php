<?php

use Controllers\Controller;
use Models\User;
use Views\View;

class PortfolioController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new User();
        $this->view = new View();
    }

    public function index(){
        //пример получения данных из db через ORM
        //конечно лучше выводить логику в отдельное место, а в контроллере только получать данные из модели и отправлять на обработку

        /*$all = User::select(['name','email'])->orderBy('id','ASC')->get();
        $arr = [];
        $i = 0;
            foreach ($all as $item) {
                $arr[$i]['name'] = $item->name;
                $arr[$i]['email'] = $item->email;
                $i++;
            }*/
        $this->view->generate('portfolio_view.php', 'template_view.php'/*, $arr*/);
    }
}