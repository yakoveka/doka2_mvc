<?php

namespace Controllers;
use Core\Controller as Controller;
use Classes\Request as Request;

class ControllerResource extends Controller
{

    function actionIndex(Request $request)
    {
        $url=parse_url($request->server['REQUEST_URI']);
        $routes = explode('/', $url['path']);
        $parameter = ucfirst($routes[1]);
        $methodName="getAll".$parameter;
        $param = $this->model->$methodName();
        $parameter = strtolower($parameter);
        $fileName = ucfirst($parameter);
        if(!empty($param))
            //if(isset($request->api))
                $this->view->generate($fileName.'View.php', array("$parameter" => $param, "api" => $request->api));
            //else
                //$this->view->generate($fileName.'View.php', array("$parameter" => $param));
        else
            header("Location: /404");
    }
}