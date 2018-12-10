<?php
class Controller_Login extends Controller{

    function __construct()
    {
        $this->model = new Model_Login();
        $this->view = new View();
    }

    function action_index(){
        $this->view->generate('login_view.php', 'template_view.php', null);
    }

    function action_check($user_login, $user_password)
    {
        $data = $this->model->get_user_info($user_login);
        foreach ($data as $row)
        {
            if($row['user_login'] == $user_login and $row['user_password'] == $user_password)
            {
                header('Location: http://doka2.common/');
                $_SESSION['login'] = $user_login;
            }
            else {
                $this->view->generate('login_view.php', 'template_view.php', ' Введенный логин или пароль неверен, попробуйте еще раз');
            }
        }
    }

    function action_logout()
    {
        Session::destroy();
        header('Location: http://doka2.common/');
    }
}