<?php


class View
{
    function generate($content_view, $template_view, $parameters)
    {
        if (!empty($parameters)) {
            extract($parameters);
        }
        include 'app/views/' . $template_view;
    }
}
