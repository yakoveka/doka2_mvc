<?php
require 'connection.php';
class Model_Register extends Model
{
    public function __construct()
    {

    }

    public function connectBD()
    {
        $databaseConnection = new DatabaseConnect('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }

    public function set_user_info($user_first_name, $user_last_name, $user_email, $user_login, $user_password)
    {
        $pdo=$this->connectBD();

        /*$user_login = stripslashes($user_login);
        $user_login = htmlspecialchars($user_login);
        $user_password = stripslashes($user_password);
        $user_password = htmlspecialchars($user_password);
        $user_login = trim($user_login);
        $user_password = trim($user_password);*/
        $result = $pdo->prepare("select user_id from users where user_login='$user_login'");
        $result->execute();
        $myrow = $result->fetch();
        if(!empty($myrow['user_id']))
            return false;
        $result2 = $pdo->prepare("insert into users (user_login, user_password, user_email, user_first_name, user_last_name) values(:user_login, :user_password, :user_email, :user_first_name, :user_last_name) ");
        $result2->execute(['user_login'=>$user_login, 'user_password'=>$user_password, 'user_email'=>$user_email, 'user_first_name'=>$user_first_name, 'user_last_name'=>$user_last_name]);
        if ($result2=='FALSE')
            return false;
        else
            return true;
    }
}