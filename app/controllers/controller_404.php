<?php


class Controller_404 extends Controller
{
    function action_index($request)
    {
        $this->view->generate('404_view.php', 'template_view.php');
    }

}
