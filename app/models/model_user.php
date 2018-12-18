<?php
require 'connection.php';
class Model_User extends Model{

    public function connectBD()
    {
        $databaseConnection = new connection('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }

    public function get_User($login)
    {
        $pdo=$this->connectBD();

        $query = "SELECT * from users WHERE login=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'User');
        $cat->execute(['id'=>$login]);
        $user=$cat->fetch();
        return array($user);
    }
}