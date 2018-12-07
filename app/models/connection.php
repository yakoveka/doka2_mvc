<?php
class DatabaseConnect {
    private $pdo = null;
    public function getPdo(){
        return $this->pdo;
    }
    public function __construct($user){
        if($user=='root') {
            try {
                $this->pdo = new PDO('mysql:host=localhost;dbname=doka2_common', 'root', '3014');
            } catch (PDOException $e) {
                echo "Error";
            }
        }

    }
}