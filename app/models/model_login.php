<?php


require 'connection.php';
class Model_Login extends Model
{
    public function __construct()
    {

    }

    public function connectBD()
    {
        $databaseConnection = new connection('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }

    public function getUserRole($login){
        $pdo=$this->connectBD();
        $query = "select role from users where login=:id";
        $cat=$pdo->prepare($query);
        $cat->execute(['id'=>$login]);
        $status = $cat->fetch();
        return $status;
    }

    public function getInfoAboutUser($login)
    {
        $pdo=$this->connectBD();
        $query = "SELECT * from users WHERE login=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'User');
        if($cat->execute(['id'=>$login])) {
            $user=$cat->fetch();
            return $user;
        }
        else return false;
    }
}