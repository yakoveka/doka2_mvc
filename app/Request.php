<?php
class Request
{
    public $post;
    public $get;
    public $cookie;
    public $server;
    public $session;

    public function __construct()
    {
        $this->get=$_GET;
        $this->cookie=$_COOKIE;
        $this->post=$_POST;
        $this->server=$_SERVER;
        $this->session=$_SESSION;
    }

    public function getInput()
    {
        $url=parse_url($this->server['REQUEST_URI']);
        $routes = explode('/', $url['path']);
        if($routes[1]=='heroes' and empty($routes[3]))
            return $routes[3];
        if($routes[1]=='heroes' and !empty($routes[3]))
            return $routes[3];
        if($routes[1]=='user')
            return $routes[3];
    }

    public function getInputData($param)
    {
        if(!empty($this->get))
            if(!empty($this->get[$param]))
                return $this->get[$param];

        if(!empty($this->post))
            if(!empty($this->post[$param]))
                return $this->post[$param];
    }
}