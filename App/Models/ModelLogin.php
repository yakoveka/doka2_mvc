<?php

namespace Models;
use Core\Model as Model;
use \PDO;

class ModelLogin extends Model
{
    public function getUserRole($login){
        $pdo=$this->connectDB();
        $query = "select role from users where login=:id";
        $cat=$pdo->prepare($query);
        $cat->execute(['id'=>$login]);
        $status = $cat->fetch();
        return $status;
    }

    public function getInfoAboutUser($login)
    {
        $pdo=$this->connectDB();
        $query = "SELECT * from users WHERE login=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\User');
        if($cat->execute(['id'=>$login])) {
            $user=$cat->fetch();
            return $user;
        }
        else return false;
    }
}