<?php

namespace Core;
use Core\Connection as connection;

class Model
{
    public function connectDB()
    {
        $databaseConnection = new connection('root');
        $pdo = $databaseConnection->getPdo();
        return $pdo;
    }
}