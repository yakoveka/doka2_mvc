<?php

namespace Controllers;
use Core\Controller as Controller;
use Models\ModelLogin as ModelLogin;
use Classes\Request as Request;
use Core\View as View;
use Classes\Session as Session;

class ControllerLogin extends Controller
{

    function __construct()
    {
        $this->model = new ModelLogin();
        $this->view = new View();
    }

    function actionIndex(Request $request)
    {
        $this->view->generate('LoginView.php', array("data" => null));
    }

    function actionCheck(Request $request)
    {
        $login = $request->getInputData('login');
        $password = $request->getInputData('password');
        $data = $this->model->getInfoAboutUser($login);
        if($data==false)
        {
            $this->view->generate('LoginView.php', array("data" => ' Введенный логин или пароль неверен, попробуйте еще раз'));
            die();
        }
        if ($data->login == $login and password_verify($password, $data->password)) {
            $_SESSION['role'] = $data->role;
            $_SESSION['password'] = $data->password;
            $_SESSION['email'] = $data->email;
            $_SESSION['firstName'] = $data->firstName;
            $_SESSION['lastName'] = $data->lastName;
            $_SESSION['login'] = $data->login;
            $_SESSION['activated'] = $data->activated;
            header('Location: /');
        } else {
            $this->view->generate('LoginView.php', array("data" => ' Введенный логин или пароль неверен, попробуйте еще раз'));
        }
    }

    function actionLogout(Request $request)
    {
        Session::destroy();
        header('Location: /');
    }
}