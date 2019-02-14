<?php

namespace Classes;

class Request
{
    public $post;
    public $get;
    public $cookie;
    public $server;
    public $session;
    public $api;

    public function __construct()
    {
        $this->get=$_GET;
        $this->cookie=$_COOKIE;
        $this->post= json_decode( file_get_contents('php://input'));
        $this->server=$_SERVER;
        $this->session=$_SESSION;
    }

    public function getInputData($parameter)
    {
        if($this->api=="react") {
            $parameter = str_replace('"', '', $parameter);
            if (!empty($this->get))
                if (!empty($this->get[$parameter]))
                    return $this->get[$parameter];

            if (!empty($this->post))
                if (!empty($this->post->{$parameter}))
                    return $this->post->{$parameter};
            $url = parse_url($this->server['REQUEST_URI']);
            $routes = explode('/', $url['path']);
            if (!empty($routes[2]) and $routes[2] == 'ConfirmEdit')
                return null;
            if (!empty($routes[3]))
                $routes[3] = str_replace("_", " ", $routes[3]);
            if ($routes[1] == 'heroes' and !empty($routes[3]))
                return $routes[3];
            if ($routes[1] == 'items' and !empty($routes[3]))
                return $routes[3];
            if ($routes[1] == 'user' and $routes[2] == 'view')
                return $routes[3];

        }
        else {
            if (!empty($this->get))
                if (!empty($this->get[$parameter]))
                    return $this->get[$parameter];

            if (!empty($this->post))
                if (!empty($this->post[$parameter]))
                    return $this->post[$parameter];
            $url = parse_url($this->server['REQUEST_URI']);
            $routes = explode('/', $url['path']);
            if (!empty($routes[2]) and $routes[2] == 'ConfirmEdit')
                return null;
            if (!empty($routes[3]))
                $routes[3] = str_replace("_", " ", $routes[3]);
            if ($routes[1] == 'heroes' and !empty($routes[3]))
                return $routes[3];
            if ($routes[1] == 'items' and !empty($routes[3]))
                return $routes[3];
            if ($routes[1] == 'user' and $routes[2] == 'view')
                return $routes[3];
        }
    }
}