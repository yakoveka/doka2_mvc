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
        $hero = $this->model->get_hero($hero_id);
        $this->view->generate('hero_view.php', 'template_view.php', array("hero" => $hero));
    }

    function action_index()
    {
        $data = $this->model->get_heroes();
        $this->view->generate('heroes_view.php', 'template_view.php', array("data" => $data));
    }

    function action_main_characteristic($main_char)
    {
        $data = $this->model->get_heroes_by_main_characteristic($main_char);
        $this->view->generate('main_characteristic_view.php', 'template_view.php', $data);
    }

    function action_edit($hero_name)
    {
        $hero_name=str_replace('_', ' ', $hero_name);
        $data = $this->model->get_hero($hero_name);
        $this->view->generate('edit_hero_view.php', 'template_view.php', $data);
    }

    function action_confirm_edit($hero_name)
    {
        $hero_name = str_replace('_', ' ', $hero_name);
        $array['hero_name'] = $hero_name;
        $array['name'] = $_POST['hero_name'];
        $array['main'] = $_POST['hero_main'];
        $array['intelligence'] = $_POST['hero_intelligence'];
        $array['agility'] = $_POST['hero_agility'];
        $array['strength'] = $_POST['hero_strength'];
        $array['damage'] = $_POST['hero_damage'];
        $array['movespeed'] = $_POST['hero_movespeed'];
        $array['armor'] = $_POST['hero_armor'];
        $array['ability1'] = $_POST['hero_ability1'];
        $array['ability2'] = $_POST['hero_ability2'];
        $array['ability3'] = $_POST['hero_ability3'];
        $array['ability4'] = $_POST['hero_ability4'];
        $array['descr_abil1'] = $_POST['hero_descr_abil1'];
        $array['descr_abil2'] = $_POST['hero_descr_abil2'];
        $array['descr_abil3'] = $_POST['hero_descr_abil3'];
        $array['descr_abil4'] = $_POST['hero_descr_abil4'];
        $array['picture'] = $_POST['hero_picture'];
        $array['picture_abil1'] = $_POST['hero_picture_abil1'];
        $array['picture_abil2'] = $_POST['hero_picture_abil2'];
        $array['picture_abil3'] = $_POST['hero_picture_abil3'];
        $array['picture_abil4'] = $_POST['hero_picture_abil4'];
        $array['video_abil1'] = $_POST['hero_video_abil1'];
        $array['video_abil2'] = $_POST['hero_video_abil2'];
        $array['video_abil3'] = $_POST['hero_video_abil3'];
        $array['video_abil4'] = $_POST['hero_video_abil4'];
        $data=$this->model->update_hero($array);
        //$this->view->generate('draft.php', 'temp;late_view.php', $data);
        header('Location: /heroes');
    }
}