<?php
class Controller_User extends Controller
{
    function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

    function action_view($login)
    {
        $data = $this->model->get_User($login);
        $this->view->generate('user_view.php', 'template_view.php', array("data" => $data));
    }
}