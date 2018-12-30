<?php

class Router
{
    static function start()
    {
        $controller_name = 'main';
        $action_name = 'index';
        $url=parse_url($_SERVER['REQUEST_URI']);
        $routes = explode('/', $url['path']);
        if (!empty($routes[1]))
            $controller_name = $routes[1];
        if (!empty($routes[2]))
            $action_name = $routes[2];
        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        $model_file = strtolower($model_name) . '.php';
        $model_path = "app/models/" . $model_file;
        if (file_exists($model_path))
            include "app/models/" . $model_file;
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "app/controllers/" . $controller_file;
        if (file_exists($controller_path))
            include "app/controllers/" . $controller_file;
        else
            Router::ErrorPage404();
        $controller = new $controller_name;
        $action = $action_name;
        $request = new Request();
        if(method_exists($controller,$action))
            $controller->$action($request);
        else
            Router::ErrorPage404();
    }

    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}