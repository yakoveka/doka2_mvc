<?php

class Controller_Heroes extends Controller
{
    function __construct()
    {
        $this->model = new Model_Heroes();
        $this->view = new View();
    }

    function action_view($request)
    {
        $hero_id=$request->getInput();
        $hero = $this->model->getInfoAboutHero($hero_id);
        $this->view->generate('hero_view.php', 'template_view.php', array("hero" => $hero));
    }

    function action_index($request)
    {
        $data = $this->model->getAllHeroes();
        $this->view->generate('heroes_view.php', 'template_view.php', array("data" => $data));
    }

    function action_main_characteristic($request)
    {
        $main_char=$request->getInput();
        $data = $this->model->getHeroesByMainCharacteristic($main_char);
        $this->view->generate('main_characteristic_view.php', 'template_view.php', array("data" => $data));
    }

    function action_edit($request)
    {
        $hero_name=$request->getInput();
        $hero_name=str_replace('_', ' ', $hero_name);
        $data = $this->model->getInfoAboutHero($hero_name);
        $this->view->generate('edit_hero_view.php', 'template_view.php', array("data" => $data));
    }

    function action_confirm_edit($request)
    {
        $hero=new Hero();
        $hero->name=$request->getInputData('heroName');
        $hero->strength=$request->getInputData('heroStrength');
        $hero->agility=$request->getInputData('heroAgility');
        $hero->mainAbility=$request->getInputData('heroMainAbility');
        $hero->intelligence=$request->getInputData('heroIntelligence');
        $hero->damage=$request->getInputData('heroDamage');
        $hero->movespeed=$request->getInputData('heroMovespeed');
        $hero->armor=$request->getInputData('heroArmor');
        $hero->picture_url=$request->getInputData('heroPicture');
        $hero->id=$request->getInputData('heroId');
        for($i=1;$i<5;$i++) {
                $ability = new Ability();
                $ability->name=$request->getInputData('heroAbility'.$i);
                $ability->description=$request->getInputData('heroDescriptionOfAbility'.$i);
                $ability->picture_url=$request->getInputData('heroPictureOfAbility1'.$i);
                $ability->video_url=$request->getInputData('heroVideoOfAbility'.$i);
                $ability->id=$request->getInputData('abilityId'.$i);
                $hero->abilities[] = $ability;
        }
        $this->model->updateHero($hero);
        header('Location: /heroes');
    }
}