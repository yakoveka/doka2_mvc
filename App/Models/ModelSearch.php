<?php

namespace Models;
use Models\ModelHeroes as ModelHeroes;
use Models\ModelItems as ModelItems;
use Core\Model as Model;
use \PDOException;

class ModelSearch extends Model
{
    function search($q)
    {
        $modelHeroes = new ModelHeroes();
        $modelItems = new ModelItems();
        $pdo = $this->connectDB();
        try {
            $q=strtolower($q);
            $q = trim($q);
            $q = htmlspecialchars($q);
            $heroes = $modelHeroes->search($q, $pdo);
            $items = $modelItems->search($q, $pdo);
            $array[]=$heroes;
            $array[]=$items;
            return $array;
        }
        catch(PDOException $e) {
            return $e;
        }
    }
}