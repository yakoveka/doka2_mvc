<?php
class Controller_Items extends Controller
{
    function action_index()
    {
        $this->view->generate('items_view.php', 'template_view.php');
    }
}