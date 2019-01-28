<?php

namespace Core;

class View
{
    function generate($content_view, $parameters)
    {
        if (!empty($parameters)) {
            extract($parameters);
        }
        include 'App/Views/TemplateView.php';
    }
}
