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
        $array = $this->model->getInfoAboutHero($heroId);
        $hero = $array["hero"];
        $comment = $array["comment"];
        if(!empty($hero))
            $this->view->generate('hero_view.php', 'template_view.php', array("hero" => $hero, "comment"=>$comment));
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
            $array = $this->model->getInfoAboutHero($heroName);
            $data = $array["hero"];
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
        header('Location: /heroes/view/'.str_replace(' ', '_', $hero->name));
    }

    function action_comment($request)
    {
        $comment = new Comment();
        $comment->user=$request->session['login'];
        $comment->classId = 1;
        $comment->itemId = $request->getInputData('heroId');
        $comment->itemId = str_replace('_', ' ', $comment->itemId);
        $comment->comment=$request->getInputData('comment');
        $data = $this->model->writeComment($comment);
        if($data==true)
            header ('Location: /heroes/view/'.str_replace(' ', '_', $request->getInputData('heroId')));
        else
            $this->view->generate('draft_view.php', 'template_view.php', array("data"=>"Пожалуйста, повторите попытку"));
    }
}