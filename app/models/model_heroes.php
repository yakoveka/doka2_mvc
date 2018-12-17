<?php
require 'connection.php';
class Model_Heroes extends Model
{
    public function connectBD()
    {
        $databaseConnection = new DatabaseConnect('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }

    public function get_data_hero($hero_id)
    {
        $pdo=$this->connectBD();

        $query = "SELECT * from heroes WHERE name=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id'=>$hero_id]);
        $hero=$cat->fetch();
        return array($hero);
    }

    public function get_Heroes()
    {
        $pdo=$this->connectBD();
        for($i=1;$i<117;$i++)
        {
            $query = "SELECT * from heroes WHERE id=:id";
            $cat = $pdo->prepare($query);
            $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
            $cat->execute(['id'=>$i]);
            $hero=$cat->fetch();
            $array[] = $hero;
        }
        return $array;
    }

    public function get_data_by_main_char($main_char){
        $pdo=$this->connectBD();
        for($i=1;$i<117;$i++) {
            $query = "SELECT * from heroes WHERE id=:id";
            $cat = $pdo->prepare($query);
            $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
            $cat->execute(['id' => $i]);
            $hero = $cat->fetch();
            if ($hero['main'] == $main_char) {
                $array[] = $hero;
            }
        }
        return $array;
    }

    public function update_hero($array)
    {
        $pdo = $this->connectBD();
        try {
            $query = "update heroes set name=:n, main=:m, intelligence=:i, agility=:a, strength=:s, damage=:d, movespeed=:move, armor=:ar, ability1=:a1, ability2=:a2, ability3=:a3, ability4=:a4, descr_abil1=:da1, descr_abil2=:da2, descr_abil3=:da3, descr_abil4=:da4, picture=:p, picture_abil1=:pa1, picture_abil2=:pa2, picture_abil3=:pa3, picture_abil4=:pa4, video_abil1=:va1, video_abil2=:va2, video_abil3=:va3, video_abil4=:va4 where name=:old";
            $cat = $pdo->prepare($query);
            $cat->execute(['old' => $array['hero_name'], 'n' => $array['name'], 'm' => $array['main'], 'i' => $array['intelligence'], 'a' => $array['agility'], 's' => $array['strength'], 'd' => $array['damage'], 'move' => $array['movespeed'], 'ar' => $array['armor'], 'a1' => $array['ability1'], 'a2' => $array['ability2'], 'a3' => $array['ability3'], 'a4' => $array['ability4'], 'da1' => $array['descr_abil1'], 'da2' => $array['descr_abil2'], 'da3' => $array['descr_abil3'], 'da4' => $array['descr_abil4'], 'p' => $array['picture'], 'pa1' => $array['picture_abil1'], 'pa2' => $array['picture_abil2'], 'pa3' => $array['picture_abil3'], 'pa4' => $array['picture_abil4'], 'va1' => $array['video_abil1'], 'va2' => $array['video_abil2'], 'va3' => $array['video_abil3'], 'va4' => $array['video_abil4']]);
            return 'Данные изменены успешно';
        }catch (PDOException $e)
        {
            return 'Ошибка в изменении данных';
        }
    }
}