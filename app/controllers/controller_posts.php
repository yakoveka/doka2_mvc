<?php


class Controller_Posts extends Controller
{
    function action_index()
    {
        $this->view->generate('posts_view.php', 'template_view.php');
    }
}