<?php

class View
{
    function generate($content_view, $template_view, $parameters = null)
    {
        if (!empty($parameters)) {
            extract($parameters);
        }
        include 'app/views/' . $template_view;
    }
}
