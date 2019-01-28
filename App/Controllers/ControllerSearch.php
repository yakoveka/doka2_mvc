<?php

namespace Controllers;
use Core\Controller as Controller;
use Classes\Request as Request;
use Models\ModelSearch as ModelSearch;
use Core\View as View;

class ControllerSearch extends Controller
{
    function __construct()
    {
        $this->model = new ModelSearch();
        $this->view = new View();
    }

    function actionIndex(Request $request)
    {
        $q=$request->getInputData('q');
        if(empty($q)) {
            $this->view->generate('DraftView.php', array("data" => "Поисковой запрос пуст"));
            die();
        }
        $data=$this->model->search($q);
        $this->view->generate('SearchView.php', array("data"=>$data,"q"=>$q));
    }
}