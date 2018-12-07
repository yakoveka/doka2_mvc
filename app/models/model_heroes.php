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

        $query = "SELECT * from heroes WHERE id=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id'=>$hero_id]);
        $hero=$cat->fetch();
        return array($hero);
    }

    public function get_Heroes()
    {
        $pdo=$this->connectBD();
        for($i=1;$i<11;$i++)
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
        for($i=1;$i<11;$i++) {
            $query = "SELECT * from heroes WHERE id=:id";
            $cat = $pdo->prepare($query);
            $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
            $cat->execute(['id' => $i]);
            $hero = $cat->fetch();
            if($hero['main']==$main_char)
            {
                $array[] = $hero;
            }
        }

        return $array;

    }
}