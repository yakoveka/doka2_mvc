<?php

class Route
{
    static function start()
    {
        $controller_name = 'main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        if (!empty($routes[3])) {
            $id_name = $routes[3];
        }

        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        $model_file = strtolower($model_name) . '.php';
        $model_path = "app/models/" . $model_file;
        if (file_exists($model_path)) {
            include "app/models/" . $model_file;
        }

        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "app/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "app/controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
        }
        $controller = new $controller_name;
        $action = $action_name;
        switch ($routes[1]) {
            case "":
                {
                    if (method_exists($controller, $action))
                        $controller->$action();
                }
            case 'heroes':
                {
                    if (empty($id_name)){
                        if (method_exists($controller, $action))
                            $controller->$action();}
                    else
                        if (method_exists($controller, $action))
                            $controller->$action($id_name);
                    break;
                }
            case 'login':
                {
                    if (!empty($routes[2]) and $routes[2] == 'check') {
                        $user_login = $_POST['login'];
                        $user_password = $_POST['password'];
                        $controller->$action($user_login, $user_password);
                    }
                    elseif (method_exists($controller, $action))
                        $controller->$action();
                    break;
                }
            case 'items':
                {
                    if (method_exists($controller, $action))
                        $controller->$action();
                    break;
                }
            case 'posts':
                {
                    if (method_exists($controller, $action))
                        $controller->$action();
                    break;
                }
            case 'register':
                {
                    if (!empty($routes[2]) and $routes[2] == 'writeUser') {
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $user_login = $_POST['login'];
                        $user_password = $_POST['password'];
                        $user_email = $_POST['email'];
                        $controller->$action($first_name, $last_name, $user_email, $user_login, $user_password);
                    }
                    if (method_exists($controller, $action))
                        $controller->$action();
                }
            default:
                Route::ErrorPage404();

        }
    }
    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}