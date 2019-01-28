<?php

namespace Models;
use Core\Model as Model;
use \PDO;
class ModelComments extends Model
{
    function getHeroComments($heroName)
    {
        $pdo = $this->connectDB();
        $query="select * from comments where classId=1 and itemId='$heroName'";
        $cat=$pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\Comment');
        $cat->execute();
        $comments = $cat->fetchAll();
        return $comments;
    }
}