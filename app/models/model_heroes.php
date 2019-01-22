<?php

require 'connection.php';

class Model_Heroes extends Model
{
    public function connectBD()
    {
        $databaseConnection = new connection('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }

    public function getInfoAboutHero($heroName)
    {
        //get all characteristics of hero, put it into $hero
        $pdo = $this->connectBD();
        $hero_name = str_replace('_', ' ', $heroName);
        $query = "SELECT * from heroes WHERE name=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id' => $hero_name]);
        $hero = $cat->fetch();

        //get all abilities of hero, put it into $abilities
        $query="select * from abilities where hero_id=:h_id";
        $cat=$pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Ability');
        if($cat->execute(['h_id'=>$hero->id])){
            $hero->abilities = $cat->fetchAll();
            $query="select * from comments where class_id=1 and item_id='$hero_name'";
            $cat=$pdo->prepare($query);
            $cat->setFetchMode(PDO::FETCH_CLASS, 'Comment');
            $cat->execute();
            $comment = $cat->fetchAll();
            return array("hero"=>$hero, "comment"=>$comment);
        }
        else return false;
    }

    public function getAllHeroes()
    {
        $pdo = $this->connectBD();
        $query = "SELECT * from heroes";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute();
        if($heroes = $cat->fetchAll())
            return $heroes;
        else return false;
    }

    public function getHeroesByMainCharacteristic($main_char)
    {
        $pdo = $this->connectBD();
        $query = "SELECT * from heroes WHERE mainAbility=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id' => $main_char]);
        $heroes = $cat->fetchAll();
        return $heroes;
    }

    public function updateHero($hero)
    {
        $pdo = $this->connectBD();
        try {
            $query = "update heroes set name=:n, mainAbility=:m, intelligence=:i, agility=:a, strength=:s, damage=:d, movespeed=:move, armor=:ar, picture_url=:p where id=:old";
            $cat = $pdo->prepare($query);
            $cat->execute(['old' => $hero->id, 'n' => $hero->name, 'm' => $hero->mainAbility, 'i' => $hero->intelligence, 'a' => $hero->agility, 's' => $hero->strength, 'd' => $hero->damage, 'move' => $hero->movespeed, 'ar' => $hero->armor, "p"=>$hero->picture_url]);
            foreach ($hero->abilities as $ability) {
                $query="update abilities set name=:n, description=:d, picture_url=:p, video_url=:v where id =:i";
                $cat = $pdo->prepare($query);
                $cat->execute(['n'=>$ability->name, 'd'=>$ability->description, 'p'=>$ability->picture_url, 'v'=>$ability->video_url, 'i'=>$ability->id]);
            }
            return 'Данные изменены успешно';
        }catch (PDOException $e) {
            return 'Ошибка в изменении данных';
        }
    }

    public function writeComment($comment)
    {
        $pdo=$this->connectBD();
        $comment->itemId = str_replace('_', ' ', $comment->itemId);
        $query="insert into comments (class_id, item_id, user, date, comment) values ('$comment->classId', '$comment->itemId', '$comment->user', NOW(), '$comment->comment')";
        $cat=$pdo->prepare($query);
        $cat->execute();
        return $cat;
    }
}