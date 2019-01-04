<?php


class connection {
    private $pdo = null;
    public function getPdo()
    {
        return $this->pdo;
    }
    public function __construct($user)
    {
        if($user=='root') {
            try {
                $this->pdo = new PDO('mysql:host=localhost;dbname=doka2_common', 'root', '3014');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error";
            }
        }
    }
}