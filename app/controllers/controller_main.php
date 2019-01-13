<?php


class Controller_Main extends Controller
{
    function action_index($request)
    {
        $this->view->generate('main_view.php', 'template_view.php', array("data"=>null));
    }
}