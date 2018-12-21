<?php
class Controller_Login extends Controller{

    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function action_index(){
        $this->view->generate('login_view.php', 'template_view.php', array("data" => null));
    }

    function action_check($user_login, $user_password)
    {
        /*header('Location: /login');*/


        $data = $this->model->get_user_info($user_login);
        foreach ($data as $row)
        {
            if($row->login == $user_login and $row->password == $user_password)
            {
                $_SESSION['role'] = $row->role;
                $_SESSION['password'] = $row->password;
                $_SESSION['email'] = $row->email;
                $_SESSION['first_name'] = $row->first_name;
                $_SESSION['last_name'] = $row->last_name;
                $_SESSION['login'] = $row->login;
                header('Location: /');
            }
            else {
                //$_SERVER['REDIRECT_URL'] = '/login/';
                $this->view->generate('login_view.php', 'template_view.php', array("data"=>' Введенный логин или пароль неверен, попробуйте еще раз'));
            }
        }
    }

    function action_logout()
    {
        Session::destroy();
        header('Location: /');
    }
}