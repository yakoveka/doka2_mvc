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


        $user_password=md5($user_password);
        $data = $this->model->get_user_info($user_login);
            if($data->login == $user_login and $data->password == $user_password)
            {
                $_SESSION['role'] = $data->role;
                $_SESSION['password'] = $data->password;
                $_SESSION['email'] = $data->email;
                $_SESSION['first_name'] = $data->first_name;
                $_SESSION['last_name'] = $data->last_name;
                $_SESSION['login'] = $data->login;
                $_SESSION['activated']=$data->activated;
                header('Location: /');
            }
            else {
                $this->view->generate('login_view.php', 'template_view.php', array("data"=>' Введенный логин или пароль неверен, попробуйте еще раз'));
            }
    }

    function action_logout()
    {
        Session::destroy();
        header('Location: /');
    }
}