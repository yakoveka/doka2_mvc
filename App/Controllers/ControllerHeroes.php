<?php

namespace Controllers;
use Controllers\ControllerResource as ControllerResource;
use Classes\Request as Request;
use Models\ModelHeroes as ModelHeroes;
use Models\ModelComments as ModelComments;
use Core\View as View;
use Classes\Hero as Hero;
use Classes\Comment as Comment;
use Classes\Ability as Ability;


class ControllerHeroes extends ControllerResource
{
    function __construct()
    {
        $this->model = new ModelHeroes();
        $this->view = new View();
    }

    function actionView(Request $request)
    {
        $modelComments = new ModelComments();
        $heroName=$request->getInputData('heroId');
        $hero = $this->model->getInfoAboutHero($heroName);
        $comment = $modelComments->getHeroComments($heroName);
        if(!empty($hero->abilities))
            $this->view->generate('HeroView.php', array("hero" => $hero, "comment"=>$comment));
        else
            header ("Location: /404");
    }

    function actionIndex(Request $request)
    {
        parent::actionIndex($request);
    }

    function actionMainCharacteristic(Request $request)
    {
        $mainCharacteristic=$request->getInputData('mainCharacteristic');
        $heroes = $this->model->getHeroesByMainCharacteristic($mainCharacteristic);
        $this->view->generate('MainCharacteristicView.php', array("heroes" => $heroes));
    }

    function actionEdit(Request $request)
    {
        if(!empty($request->session) and ($request->session['role']=='admin') or ($request->session['role']=='moder')) {
            $heroName = $request->getInputData('heroName');
            $heroName = str_replace('_', ' ', $heroName);
            $hero = $this->model->getInfoAboutHero($heroName);
            $this->view->generate('EditHeroView.php', array("hero" => $hero));
        }
        else
            header("Location: /");
    }

    function actionConfirmEdit(Request $request)
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
        $hero->pictureUrl=$request->getInputData('heroPicture');
        $hero->id=$request->getInputData('heroId');
        for($i=1;$i<5;$i++) {
                $ability = new Ability();
                $ability->name=$request->getInputData('heroAbility'.$i);
                $ability->description=$request->getInputData('heroDescriptionOfAbility'.$i);
                $ability->pictureUrl=$request->getInputData('heroPictureOfAbility1'.$i);
                $ability->videoUrl=$request->getInputData('heroVideoOfAbility'.$i);
                $ability->id=$request->getInputData('abilityId'.$i);
                $hero->abilities[] = $ability;
        }
        $this->model->updateHero($hero);
        header('Location: /heroes/view/'.str_replace(' ', '_', $hero->name));
    }

    function actionComment(Request $request)
    {
        if (isset($request->session['activated']) and $request->session['activated'] == 1) {
            $comment = new Comment();
            $comment->user = $request->session['login'];
            $comment->classId = 1;
            $comment->itemId = $request->getInputData('heroId');
            $comment->itemId = str_replace('_', ' ', $comment->itemId);
            $comment->comment = $request->getInputData('comment');
            $data = $this->model->writeComment($comment);
            if ($data == true)
                header('Location: /heroes/view/' . str_replace(' ', '_', $request->getInputData('heroId')));
            else
                $this->view->generate('DraftView.php', array("data" => "Пожалуйста, повторите попытку"));
        }
        else
            header("Location: /");
    }
}