<?php

namespace Core;

class View
{
    function generate($content_view, $parameters)
    {
        if (!empty($parameters)) {
            extract($parameters);
        }
        if(isset($parameters["api"]) and $parameters["api"]=="react")
            echo json_encode($parameters);
        else
            include 'App/Views/TemplateView.php';
    }
}
