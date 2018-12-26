<?php
require 'connection.php';
class Model_Register extends Model
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

    public function set_user_info($user)
    {
        $pdo=$this->connectBD();
        $user->password=md5($user->password);

        $result = $pdo->prepare("select id from users where login='$user->login'");
        $result->execute();
        $myrow = $result->fetch();
        if(!empty($myrow['user_id']))
            return false;
        $result2 = $pdo->prepare("insert into users (login, password, email, first_name, last_name, date_of_registration, token) values('$user->login', '$user->password', '$user->email', '$user->first_name', '$user->last_name', NOW(), '$user->token') ");
        $result2->execute();
        if ($result2=='FALSE')
            return false;
        else
            return true;
    }
}