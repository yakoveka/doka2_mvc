<?php

namespace project;
require_once 'App/Classes/Session.php';
use Classes\Session as Session;
Session::init();
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Asia/Novosibirsk');

require_once __DIR__ . '/App/Classes/bootstrap.php';



//перенос способностей в отдельную таблицу
/*$pdo = new PDO('mysql:host=localhost;dbname=doka2_common', 'root', '3014');
for($i=1; $i<80;$i++) {
    $query = "SELECT name from items WHERE id=:id";
    $cat = $pdo->prepare($query);
    $cat->execute(['id' => $i]);
    $hero = $cat->fetch();
    $hero['name']=strtolower($hero['name']);
    $query1 = "update items set name=:n where id=:id";
    $cat1=$pdo->prepare($query1);
    $cat1->execute(['n'=>$hero['name'], 'id'=>$i]);
}*/

