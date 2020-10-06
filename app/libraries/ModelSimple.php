<?php

namespace App\Library;


use PDO;

abstract class ModelSimple {

    protected $dbh, $table;


    public function query(string $query)
    {
        try {
            $stmt = $this->dbh->prepare($query);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function queryRow(string $query){
        try {
            $stmt=$this->dbh->prepare($query);
            $stmt->execute();
            $results=$stmt->fetch(PDO::FETCH_ASSOC);

            return $results;
        }catch (\PDOException $e){
            exit($e->getMessage());
        }
    }

    public function lastId(){
        $query = "SELECT LAST_INSERT_ID()";
        try {
            $stmt = $this->dbh->query($query);
            $results = $stmt->fetchColumn();

            return $results;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

}
