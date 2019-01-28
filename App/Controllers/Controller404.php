<?php

namespace Controllers;
use Core\Controller as Controller;
use Classes\Request as Request;

class Controller404 extends Controller
{
    function actionIndex(Request $request)
    {
        $this->view->generate('404View.php', array("data"=>null));
    }

}
