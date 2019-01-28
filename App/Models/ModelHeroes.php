<?php

namespace Models;
use Core\Model as Model;
use \PDO;
use \PDOException;

class ModelHeroes extends Model
{
    public function getInfoAboutHero($heroName)
    {
        //get all characteristics of hero, put it into $hero
        $pdo = $this->connectDB();
        $heroName = str_replace('_', ' ', $heroName);
        $query = "SELECT * from heroes WHERE name=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\Hero');
        $cat->execute(['id' => $heroName]);
        $hero = $cat->fetch();

        //get all abilities of hero, put it into $abilities
        $query="select * from abilities where heroId=:heroId";
        $cat=$pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\Ability');
        if(isset($hero->id)) {
            if ($cat->execute(['heroId' => $hero->id])) {
                $hero->abilities = $cat->fetchAll();
                return $hero;
            }
        }
        else return false;
    }

    public function getAllHeroes()
    {
        $pdo = $this->connectDB();
        $query = "SELECT * from heroes";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\Hero');
        $cat->execute();
        if($heroes = $cat->fetchAll())
            return $heroes;
        else return false;
    }

    public function getHeroesByMainCharacteristic($mainCharacteristic)
    {
        $pdo = $this->connectDB();
        $query = "SELECT * from heroes WHERE mainAbility=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\Hero');
        $cat->execute(['id' => $mainCharacteristic]);
        $heroes = $cat->fetchAll();
        return $heroes;
    }

    public function updateHero($hero)
    {
        $pdo = $this->connectDB();
        try {
            $query = "update heroes set name=:n, mainAbility=:m, intelligence=:i, agility=:a, strength=:s, damage=:d, movespeed=:move, armor=:ar, pictureUrl=:p where id=:old";
            $cat = $pdo->prepare($query);
            $cat->execute(['old' => $hero->id, 'n' => $hero->name, 'm' => $hero->mainAbility, 'i' => $hero->intelligence, 'a' => $hero->agility, 's' => $hero->strength, 'd' => $hero->damage, 'move' => $hero->movespeed, 'ar' => $hero->armor, "p"=>$hero->pictureUrl]);
            foreach ($hero->abilities as $ability) {
                $query="update abilities set name=:n, description=:d, pictureUrl=:p, videoUrl=:v where id =:i";
                $cat = $pdo->prepare($query);
                $cat->execute(['n'=>$ability->name, 'd'=>$ability->description, 'p'=>$ability->pictureUrl, 'v'=>$ability->videoUrl, 'i'=>$ability->id]);
            }
            return 'Данные изменены успешно';
        }catch (PDOException $e) {
            return 'Ошибка в изменении данных';
        }
    }

    public function writeComment($comment)
    {
        $pdo=$this->connectDB();
        $comment->itemId = str_replace('_', ' ', $comment->itemId);
        $query="insert into comments (classId, itemId, user, date, comment) values ('$comment->classId', '$comment->itemId', '$comment->user', NOW(), '$comment->comment')";
        $cat=$pdo->prepare($query);
        $cat->execute();
        return $cat;
    }

    public function search($q, PDO $pdo)
    {
        $query = "select heroes.id from heroes inner join abilities where heroes.id=abilities.heroId and (lower(heroes.name) like '%$q%' or lower(abilities.name) like '%$q%' or lower(abilities.description) like '%$q%') group by id";
        $cat=$pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\CommonObject');
        $cat->execute();
        $heroesArray = $cat->fetchAll();
        if(!empty($heroesArray)) {
            $heroes = $this->getSeveralHeroes($heroesArray, $pdo);
            return $heroes;
        }
        else
            return false;
    }
     public function getSeveralHeroes($array, PDO $pdo)
     {
         $query="select * from heroes where id in(";
         for($i=0;$i<count($array)-1;$i++)
         {
             $heroId=$array[$i]->id;
             $query.="$heroId,";
         }
         $lastHeroId = count($array)-1;
         $lastHero = $array[$lastHeroId]->id;
         $query.="$lastHero)";
         $cat = $pdo->prepare($query);
         $cat->setFetchMode(PDO::FETCH_CLASS, "Classes\Hero");
         $cat->execute();
         $heroes = $cat->fetchAll();
         return $heroes;
     }
}