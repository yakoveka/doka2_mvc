<?php
class Controller_Register extends Controller{

    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index()
    {
        $this->view->generate('register_view.php', 'template_view.php', array('data'=>'register'));
    }

    function action_writeUser($user_first_name, $user_last_name, $user_email, $user_login, $user_password)
    {
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL))
        {
            /*die("Ошибочный формат EMAIL-адреса !");*/
            $this->view->generate('register_view.php', 'template_view.php', array("data"=>"Email введен некорректно"));
            die();
        }
        elseif(strlen($user_password)<6) {
            $this->view->generate('register_view.php', 'template_view.php', array("data"=>"Пароль должен быть не меньше 6 символов"));
            die();
            //die("Длина пароля должна быть не менее 6-х символов !");
        }
        $flag = $this->model->set_user_info($user_first_name, $user_last_name, $user_email, $user_login, $user_password);
        if($flag == false)
            $this->view->generate('register_view.php', 'template_view.php', array('data'=>'Произошла ошибка, вы не зарегистрировались, попробуйте еще раз'));
        else
            $this->view->generate('register_view.php', 'template_view.php', array('data'=>null));

    }
}