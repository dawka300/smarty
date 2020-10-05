<?php

namespace App\Library;


use PDO;

abstract class Model extends ModelSimple {

//    protected $dbh, $table;

    abstract public function save();
    abstract public function update(int $id);


    public function find(int $id)
    {
        if (empty($id)) {
            return null;
        }
        $sql = "SELECT * FROM " . $this->table . " WHERE id=:id LIMIT 1";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;

        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }
    public function delete(int $id)
    {
        if (empty($id)) {
            return null;
        }
        $sql = "DELETE FROM " . $this->table . " WHERE id=:id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();


        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }
    public function all()
    {
        $sql = "SELECT * FROM " . $this->table . " ";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
    public function allActive(){
        $sql = "SELECT * FROM " . $this->table . " WHERE aktywny=1";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
