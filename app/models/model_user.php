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
            $cat->execute(['a'=>1, 't'=>null]);
            return true;
        }
        return false;
    }

    public function forgot_password($email, $token)
    {
        $pdo=$this->connectBD();

        $query="update users set forgot_token=:t where email=:e";
        $cat=$pdo->prepare($query);
        if($cat->execute(["t"=>$token,"e"=>$email]))
            return true;
        else return false;
    }

    public function forgotConfirm($token, $email){
        $pdo=$this->connectBD();

        $query="select forgot_token from users where email='$email'";
        $cat=$pdo->prepare($query);
        $cat->execute();
        $forgotToken=$cat->fetch();
        if($forgotToken['forgot_token']==$token)
            return true;
        else
            return false;
    }

    public function changePassword($password, $email)
    {
        $pdo=$this->connectBD();

        $password=md5($password);
        $query="update users set password=:p, forgot_token=:f where email=:e";
        $cat=$pdo->prepare($query);
        if($cat->execute(["p"=>$password, "e"=>$email, "f"=>null]))
            return true;
        else
            return false;

    }
}