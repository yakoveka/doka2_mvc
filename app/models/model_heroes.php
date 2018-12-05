<?php
require 'connection.php';
class Model_Heroes extends Model
{
    public function get_data()
    {
        $databaseConnection = new DatabaseConnect('root');
        $pdo = $databaseConnection->getPdo();

        $query = "SELECT * from heroes WHERE id=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Hero');
        $cat->execute(['id'=>1]);
        $hero=$cat->fetch();
        return array($hero);
    }
}