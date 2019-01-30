<?php

namespace Models;
use Core\Model as Model;
use \PDO;

class ModelUser extends Model
{
    public function getInfoAboutUser($login)
    {
        $pdo=$this->connectDB();
        $query = "SELECT * from users WHERE login=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\User');
        $cat->execute(['id'=>$login]);
        $user=$cat->fetch();
        return $user;
    }

    public function validation($token, $email){
        $pdo=$this->connectDB();
        $query = "select token from users where email='$email'";
        $cat = $pdo->prepare($query);
        $cat->execute();
        $tableToken = $cat->fetch();
        if($tableToken['token']==$token){
            $query="update users set activated=:a, token=:t where email=:email";
            $cat=$pdo->prepare($query);
            $cat->execute(['a'=>1, 't'=>null, "email"=>$email]);
            return true;
        }
        return false;
    }

    public function forgotPasswordSetToken($email, $token)
    {
        $pdo=$this->connectDB();
        $query="update users set forgotToken=:t where email=:e";
        $cat=$pdo->prepare($query);
        if($cat->execute(["t"=>$token,"e"=>$email]))
            return true;
        else return false;
    }

    public function forgotCheckToken($token, $email){
        $pdo=$this->connectDB();
        $query="select forgotToken from users where email='$email'";
        $cat=$pdo->prepare($query);
        $cat->execute();
        $forgotToken=$cat->fetch();
        if($forgotToken['forgotToken']==$token)
            return true;
        else
            return false;
    }

    public function changePassword($password, $email)
    {
        $pdo=$this->connectDB();
        $password=password_hash($password, PASSWORD_BCRYPT);
        $query="update users set password=:p, forgotToken=:f where email=:e";
        $cat=$pdo->prepare($query);
        if($cat->execute(["p"=>$password, "e"=>$email, "f"=>null]))
            return true;
        else
            return false;
    }

    public function getAllUsers()
    {
        $pdo=$this->connectDB();
        $query="select * from users";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\User');
        $cat->execute();
        $users=$cat->fetchAll();
        return $users;
    }

    public function deleteUser($id)
    {
        $pdo=$this->connectDB();
        $query="DELETE FROM `users` WHERE ((`id` = '$id'))";
        $cat=$pdo->prepare($query);
        $cat->execute();
    }
}