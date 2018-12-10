<?php
class Controller_Heroes extends Controller
{
    function __construct()
    {
        $this->model = new Model_Heroes();
        $this->view = new View();
    }
    
    function action_hero($hero_id)
    {
        $data = $this->model->get_data_hero($hero_id);
        $this->view->generate('hero_view.php', 'template_view.php', $data);
    }

    function action_index()
    {
        $data = $this->model->get_Heroes();
        $this->view->generate('heroes_view.php', 'template_view.php', $data);
    }

    function action_main_characteristic($main_char){
        $data = $this->model->get_data_by_main_char($main_char);
        $this->view->generate('main_characteristic_view.php', 'template_view.php', $data);
    }
}