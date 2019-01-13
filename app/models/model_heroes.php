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

    public function getInfoAboutHero($hero_name)
    {
        //get all characteristics of hero, put it into $hero
        $pdo = $this->connectBD();
        $query = "SELECT * from heroes WHERE name=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id' => $hero_name]);
        $hero = $cat->fetch();

        //get all abilities of hero, put it into $abilities
        $query="select * from abilities where hero_id=:h_id";
        $cat=$pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Ability');
        if($cat->execute(['h_id'=>$hero->id])) {
            $hero->abilities = $cat->fetchAll();
            return $hero;
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
}