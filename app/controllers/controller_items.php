<?php


class Controller_Items extends Controller
{
    function action_index($request)
    {
        $this->view->generate('items_view.php', 'template_view.php', array("data"=>null));
    }
}