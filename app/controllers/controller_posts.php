<?php


class Controller_Posts extends Controller
{
    function action_index($request)
    {
        $this->view->generate('posts_view.php', 'template_view.php', array("data"=>null));
    }
}