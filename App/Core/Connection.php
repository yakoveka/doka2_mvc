<?php

namespace Core;

use \PDO;
use \PDOException;

class Connection
{
    private static $instance = null;

    public function getPdo()
    {
        return self::$instance;
    }

    public function __construct()
    {
        try {
            self::$instance = new PDO('mysql:host=localhost;dbname=doka2_common', 'root', '3014');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error";
        }
    }

    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}