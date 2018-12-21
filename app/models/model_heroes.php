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

    public function get_hero($hero_name)
    {
        //достал характеристики героя, положил в hero
        $pdo = $this->connectBD();
        $query = "SELECT * from heroes WHERE name=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id' => $hero_name]);
        $hero = $cat->fetch();


        //достал все способности героя, положил в abilities
        $query="select * from abilities where hero_id=:h_id";
        $cat=$pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Ability');
        $cat->execute(['h_id'=>$hero->id]);
        $hero->abilities= $cat->fetchAll();

        return $hero;
    }

    public function get_heroes()
    {
        $pdo = $this->connectBD();
        $query = "SELECT * from heroes";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute();
        $heroes = $cat->fetchAll();
        return $heroes;
    }

    public function get_heroes_by_main_characteristic($main_char)
    {
        $pdo = $this->connectBD();
        $query = "SELECT * from heroes WHERE main=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id' => $main_char]);
        $hero = $cat->fetchAll();
        return $hero;
    }

    public function update_hero($hero)
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $pdo = $this->connectBD();
        $query="select id from heroes where name=:h";
        $cat=$pdo->prepare($query);
        $cat->execute(['h'=>$routes[3]]);
        $id=$cat->fetch();
        try {
            $query = "update heroes set name=:n, mainAbility=:m, intelligence=:i, agility=:a, strength=:s, damage=:d, movespeed=:move, armor=:ar where name=:old";
            $cat = $pdo->prepare($query);
            $cat->execute(['old' => $routes[3], 'n' => $hero->name, 'm' => $hero->mainAbility, 'i' => $hero->intelligence, 'a' => $hero->agility, 's' => $hero->strength, 'd' => $hero->damage, 'move' => $hero->movespeed, 'ar' => $hero->armor]);
            $i=1;
            foreach ($hero->abilities as $ability)
            {
                $query="update abilities set name=:n, description=:d, picture_url=:p, video_url=:v where hero_id =:i";
                $cat = $pdo->prepare($query);
                $cat->execute(['n'=>$ability->name, 'd'=>$ability->description, 'p'=>$ability->picture_url, 'v'=>$ability->video_url, 'i'=>$id['id']]);
                $i+=1;
            }
            return 'Данные изменены успешно';
        }catch (PDOException $e) {
            return 'Ошибка в изменении данных';
        }
    }
}