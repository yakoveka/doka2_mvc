<?php

namespace Core;
use Core\Connection as connection;

class Model
{
    public function connectDB()
    {
        $databaseConnection = new Connection();
        $pdo = $databaseConnection::getInstance();
        return $pdo;
    }
}