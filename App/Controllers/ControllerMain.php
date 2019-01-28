<?php

namespace Controllers;
use Core\Controller as Controller;
use Classes\Request as Request;

class ControllerMain extends Controller
{
    function actionIndex(Request $request)
    {
        $this->view->generate('MainView.php', array("data"=>null));
    }
}