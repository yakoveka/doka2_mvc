<?php
require_once __DIR__.'/app/Session.php';
Session::init();
error_reporting(E_ALL);
ini_set('display_errors', '1');
date_default_timezone_set('Asia/Novosibirsk');

require_once __DIR__.'/app/bootstrap.php';




//перенос способностей в отдельную таблицу
/*$pdo = new PDO('mysql:host=localhost;dbname=doka2_common', 'root', '3014');
for($i=1; $i<117;$i++) {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT ability1, ability2, ability3, ability4, descr_abil1, descr_abil2, descr_abil3, descr_abil4, picture_abil1, picture_abil2, picture_abil3, picture_abil4, video_abil1, video_abil2, video_abil3, video_abil4 from heroes WHERE id=:id";
    $cat = $pdo->prepare($query);
    $cat->execute(['id' => $i]);
    $hero = $cat->fetch();
    $query1="insert into abilities(hero_id, name, description, picture_url, video_url) values (:h_id, :n, :d, :p, :v)";
    $cat1=$pdo->prepare($query1);
    $cat1->execute(['h_id'=>$i, 'n'=>$hero['ability1'], 'd'=>$hero['descr_abil1'], 'p'=>$hero['picture_abil1'], 'v'=>$hero['video_abil1']]);
    $query1="insert into abilities(hero_id, name, description, picture_url, video_url) values (:h_id, :n, :d, :p, :v)";
    $cat1=$pdo->prepare($query1);
    $cat1->execute(['h_id'=>$i, 'n'=>$hero['ability2'], 'd'=>$hero['descr_abil2'], 'p'=>$hero['picture_abil2'], 'v'=>$hero['video_abil2']]);
    $query1="insert into abilities(hero_id, name, description, picture_url, video_url) values (:h_id, :n, :d, :p, :v)";
    $cat1=$pdo->prepare($query1);
    $cat1->execute(['h_id'=>$i, 'n'=>$hero['ability3'], 'd'=>$hero['descr_abil3'], 'p'=>$hero['picture_abil3'], 'v'=>$hero['video_abil3']]);
    $query1="insert into abilities(hero_id, name, description, picture_url, video_url) values (:h_id, :n, :d, :p, :v)";
    $cat1=$pdo->prepare($query1);
    $cat1->execute(['h_id'=>$i, 'n'=>$hero['ability4'], 'd'=>$hero['descr_abil4'], 'p'=>$hero['picture_abil4'], 'v'=>$hero['video_abil4']]);
}*/

