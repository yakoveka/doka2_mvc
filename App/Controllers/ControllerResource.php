<?php

namespace Controllers;
use Core\Controller as Controller;
use Classes\Request as Request;

class ControllerResource extends Controller
{

    function actionIndex(Request $request)
    {
        $url=parse_url($_SERVER['REQUEST_URI']);
        $routes = explode('/', $url['path']);
        $parameter = ucfirst($routes[1]);
        $methodName="getAll".$parameter;
        $param = $this->model->$methodName();
        $parameter = strtolower($parameter);
        $fileName = ucfirst($parameter);
        if(!empty($param))
            $this->view->generate($fileName.'View.php', array("$parameter" => $param));
        else
            header("Location: /404");
    }
}