<?php

namespace Controllers;
use Core\Controller as Controller;
use Classes\Request as Request;

class ControllerPosts extends Controller
{
    function actionIndex(Request $request)
    {
        $this->view->generate('PostsView.php', array("data"=>null));
    }
}