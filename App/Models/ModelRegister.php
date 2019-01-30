<?php

namespace Models;
use Core\Model as Model;

class ModelRegister extends Model
{
    public function setInfoAboutUser($user)
    {
        $pdo=$this->connectDB();
        $user->password=password_hash($user->password, PASSWORD_BCRYPT);
        $result = $pdo->prepare("select id from users where login='$user->login'");
        $result->execute();
        $myRow = $result->fetch();
        if(!empty($myRow['id']))
            return false;
        $result = $pdo->prepare("insert into users (login, password, email, firstName, lastName, dateOfRegistration, token) values('$user->login', '$user->password', '$user->email', '$user->firstName', '$user->lastName', NOW(), '$user->token') ");
        $result->execute();
        if ($result=='FALSE')
            return false;
        else
            return true;
    }
}