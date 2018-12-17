<?php
require 'connection.php';
class Model_User extends Model{
    public function __construct()
    {

    }

    public function connectBD()
    {
        $databaseConnection = new DatabaseConnect('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }

    public function get_User($login)
    {
        $pdo=$this->connectBD();

        $query = "SELECT * from users WHERE user_login=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'User');
        $cat->execute(['id'=>$login]);
        $user=$cat->fetch();
        return $user;
    }
}