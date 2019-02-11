<?php

namespace Core;
use Classes\Request as Request;

class Router
{
    static function start()
    {
        $controllerName = 'Main';
        $actionName = 'Index';
        $url=parse_url($_SERVER['REQUEST_URI']);
        $routes = explode('/', $url['path']);
        if($routes[1]=="api"){
            array_splice($routes, 0, 1);
            $api = "react";
        }
        $request = new Request();
        if(isset($api)) {
            $request->api = $api;
            if(isset($routes[1])) {
                $request_uri = "/" . $routes[1];
                for ($i = 2; $i < count($routes); $i++) {
                    $request_uri .= "/" . $routes[$i];
                }
            }
            else
                $request_uri = "/";
            $request->server["REQUEST_URI"] = $request_uri;
        }
        if (!empty($routes[1]))
            $controllerName = $routes[1];
        if (!empty($routes[2]))
            $actionName = $routes[2];
        $controllerName = 'Controllers\Controller' . ucfirst($controllerName);
        $actionName = 'action' . ucfirst($actionName);

        $currentPath=pathinfo(__DIR__);
        $controllerPath = $currentPath['dirname'].'/'.$controllerName.'.php';
        $controllerPath = str_replace('\\', '/',$controllerPath);
        if(!file_exists($controllerPath))
            Router::ErrorPage404();
        $controller = new $controllerName();
        $action = $actionName;
        if(method_exists($controller,$action))
            $controller->$action($request);
        else
            Router::ErrorPage404();
    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}