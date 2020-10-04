<?php

namespace App\Library;

//use PDO;

use PDO;

class Database
{
    private static $instance = null;
    private $connection;



    private function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, [

                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//               PDO::ATTR_PERSISTENT => true
            ]);
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }

    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getDb()
    {
        if ($this->connection instanceof PDO) {
            return $this->connection;
        }
    }









}
