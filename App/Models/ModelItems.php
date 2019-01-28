<?php

namespace Models;
use Core\Model as Model;
use \PDO;
use \PDOException;

class ModelItems extends Model
{
    public function getInfoAboutItem($itemName)
    {
        $pdo = $this->connectDB();
        $itemName = str_replace('_', ' ', $itemName);
        $query = "SELECT * from items WHERE name=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\Item');
        $cat->execute(['id' => $itemName]);
        $item = $cat->fetch();
        return $item;
    }

    public function getAllItems()
    {
        $pdo = $this->connectDB();
        $query = "SELECT * from items";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\Item');
        $cat->execute();
        if($items = $cat->fetchAll())
            return $items;
        else return false;
    }

    public function updateItem($item)
    {
        $pdo = $this->connectDB();
        try {
            $query = "update items set name=:n, price=:p, mana=:m, reloadTime=:r, description=:d, characteristics=:cha, pictureUrl=:pic where id=:old";
            $cat = $pdo->prepare($query);
            $cat->execute(['old' => $item->id, 'n' => $item->name, 'p' => $item->price, 'm'=>$item->mana, 'r'=>$item->reloadTime, 'd'=>$item->description, 'cha'=>$item->characteristics, 'pic'=>$item->pictureUrl]);
            return 'Данные изменены успешно';
        }catch (PDOException $e) {
            return $e;
        }
    }

    public function search($q, PDO $pdo)
    {
        $query = "select * from items where (lower(name) like '%$q%' or lower(description) like '%$q%' or lower(characteristics) like '%$q%')";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Classes\CommonObject');
        $cat->execute();
        $array=$cat->fetchAll();
        return $array;
    }
}