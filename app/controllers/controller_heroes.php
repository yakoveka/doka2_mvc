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
        $heroId=$request->getInputData('heroId');
        $hero = $this->model->getInfoAboutHero($heroId);
        if(!empty($hero))
            $this->view->generate('hero_view.php', 'template_view.php', array("hero" => $hero));
        else
            header ("Location: /404");
    }

    function action_index($request)
    {
        $data = $this->model->getAllHeroes();
        if(!empty($data))
            $this->view->generate('heroes_view.php', 'template_view.php', array("data" => $data));
        else
            header("Location: /404");
    }

    function action_main_characteristic($request)
    {
        $mainCharacteristic=$request->getInputData('mainCharacteristic');
        $data = $this->model->getHeroesByMainCharacteristic($mainCharacteristic);
        $this->view->generate('main_characteristic_view.php', 'template_view.php', array("data" => $data));
    }

    function action_edit($request)
    {
        if(!empty($request->session) and ($request->session['role']=='admin') or ($request->session['role']=='moder')) {
            $heroName = $request->getInputData('heroName');
            $heroName = str_replace('_', ' ', $heroName);
            $data = $this->model->getInfoAboutHero($heroName);
            $this->view->generate('edit_hero_view.php', 'template_view.php', array("data" => $data));
        }
        else
            header("Location: /");
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

    function action_comment($request)
    {

    }
}