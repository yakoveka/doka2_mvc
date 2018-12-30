<?php

class Controller_Login extends Controller
{

    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function action_index($request)
    {
        $this->view->generate('login_view.php', 'template_view.php', array("data" => null));
    }

    function action_check($request)
    {
        $login = $request->getInputData('login');
        $password = $request->getInputData('password');
        $password = md5($password);
        $data = $this->model->getInfoAboutUser($login);
        if($data==false)
        {
            $this->view->generate('login_view.php', 'template_view.php', array("data" => ' Введенный логин или пароль неверен, попробуйте еще раз'));
            die();
        }
        if ($data->login == $login and $data->password == $password) {
            $_SESSION['role'] = $data->role;
            $_SESSION['password'] = $data->password;
            $_SESSION['email'] = $data->email;
            $_SESSION['first_name'] = $data->first_name;
            $_SESSION['last_name'] = $data->last_name;
            $_SESSION['login'] = $data->login;
            $_SESSION['activated'] = $data->activated;
            header('Location: /');
        } else {
            $this->view->generate('login_view.php', 'template_view.php', array("data" => ' Введенный логин или пароль неверен, попробуйте еще раз'));
        }
    }

    function action_logout($request)
    {
        Session::destroy();
        header('Location: /');
    }
}