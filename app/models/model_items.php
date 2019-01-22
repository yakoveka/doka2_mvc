<?php

require 'connection.php';

class Model_Items extends Model
{
    public function connectBD()
    {
        $databaseConnection = new connection('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }

    public function getInfoAboutItem($itemName)
    {
        $pdo = $this->connectBD();
        $itemName = str_replace('_', ' ', $itemName);
        $query = "SELECT * from items WHERE name=:id";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $cat->execute(['id' => $itemName]);
        $item = $cat->fetch();
        return $item;
    }

    public function getAllItems()
    {
        $pdo = $this->connectBD();
        $query = "SELECT * from items";
        $cat = $pdo->prepare($query);
        $cat->setFetchMode(PDO::FETCH_CLASS, 'Item');
        $cat->execute();
        if($items = $cat->fetchAll())
            return $items;
        else return false;
    }

    public function updateItem($item)
    {
        $pdo = $this->connectBD();
        try {
            $query = "update items set name=:n, price=:p, mana=:m, reloadTime=:r, description=:d, characteristics=:cha, picture_url=:pic where id=:old";
            $cat = $pdo->prepare($query);
            $cat->execute(['old' => $item->id, 'n' => $item->name, 'p' => $item->price, 'm'=>$item->mana, 'r'=>$item->reloadTime, 'd'=>$item->description, 'cha'=>$item->characteristics, 'pic'=>$item->picture_url]);
            return 'Данные изменены успешно';
        }catch (PDOException $e) {
            return $e;
        }
    }
}