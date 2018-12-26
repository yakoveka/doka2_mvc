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
        $this->view->generate('main_characteristic_view.php', 'template_view.php', array("data" => $data));
    }

    function action_edit($hero_name)
    {
        $hero_name=str_replace('_', ' ', $hero_name);
        $data = $this->model->get_hero($hero_name);
        $this->view->generate('edit_hero_view.php', 'template_view.php', array("data" => $data));
    }

    function action_confirm_edit()
    {
        $hero=new Hero();
        $hero->name=$_POST['heroName'];
        $hero->strength=$_POST['heroStrength'];
        $hero->agility=$_POST['heroAgility'];
        $hero->mainAbility=$_POST['heroMainAbility'];
        $hero->intelligence=$_POST['heroIntelligence'];
        $hero->damage=$_POST['heroDamage'];
        $hero->movespeed=$_POST['heroMovespeed'];
        $hero->armor=$_POST['heroArmor'];
        $hero->picture_url=$_POST['heroPicture'];
        $hero->id=$_POST['heroId'];

        for($i=1;$i<5;$i++)
        {
                $ability = new Ability();
                $ability->name=$_POST['heroAbility'.$i];
                $ability->description=$_POST['heroDescriptionOfAbility'.$i];
                $ability->picture_url=$_POST['heroPictureOfAbility1'.$i];
                $ability->video_url=$_POST['heroVideoOfAbility'.$i];
                $ability->id=$_POST['abilityId'.$i];
                $hero->abilities[] = $ability;

        }
        $data=$this->model->update_hero($hero);
        //$this->view->generate('draft_view.php', 'temp;late_view.php', $data);
        header('Location: /heroes');
    }
}