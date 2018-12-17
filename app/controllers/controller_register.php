<?php
class Controller_Register extends Controller{

    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('register_view.php', 'template_view.php', 'register');
    }

    function action_writeUser($user_first_name, $user_last_name, $user_email, $user_login, $user_password)
    {
        $flag = $this->model->set_user_info($user_first_name, $user_last_name, $user_email, $user_login, $user_password);
        if($flag == false)
            $this->view->generate('register_view.php', 'template_view.php', 'Произошла ошибка, вы не зарегистрировались, попробуйте еще раз');
        else
            $this->view->generate('register_view.php', 'template_view.php', null);

    }
}