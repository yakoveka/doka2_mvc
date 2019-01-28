<?php

namespace Core;
use Classes\Request as Request;

class Controller {

    public $model;
    public $view;

    function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }

    function actionIndex(Request $request)
    {

    }
}