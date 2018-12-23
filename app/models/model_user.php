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

    public function check_registration($token, $email){
        $pdo=$this->connectBD();

        $query = "select token from users where email='$email'";
        $cat = $pdo->prepare($query);
        $cat->execute();
        $tableToken = $cat->fetch();
        if($tableToken['token']==$token){
            $query="update users set activated=:a, token=:t";
            $cat=$pdo->prepare($query);
            $cat->execute(['a'=>1, 't'=>'0']);
            return true;
        }
        return false;
    }
}