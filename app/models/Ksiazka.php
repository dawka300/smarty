<?php

namespace App\Model;

use App\Library\Database;
use App\Library\Model;
use PDO;

class Ksiazka extends Model
{

    public $id_autor, $tytul, $isbn, $liczba_stron, $opis, $cena_netto, $cena_brutto, $aktywna, $data_utworzenia;

    protected $table = 'ksiazka';

    protected $dbh;

    public function __construct()
    {
        $this->dbh = Database::getInstance()->getDb();
    }

    public function getAllByAuthorId($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_autor=:id";
        try {
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $results;

        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }



    public function save(): void
    {
        $sql = "INSERT INTO " . $this->table . " VALUES (null, :name, :id_autor, :tytul, :isbn, :quantity, null, null)";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(":id_autor", $this->id_autor, PDO::PARAM_INT);
            $stmt->bindParam(":tytul", $this->tytul, PDO::PARAM_STR);
            $stmt->bindParam(":price", $this->price, PDO::PARAM_STR);
            $stmt->bindParam(":tax", $this->tax, PDO::PARAM_STR);
            $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
            $stmt->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }


    }

    public function update($id): void
    {
        $sql = "UPDATE " . $this->table . " SET name=:name, producer_id=:producer_id, price=:price, tax=:tax, quantity=:quantity WHERE id=:id";
        try{
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(":producer_id", $this->producer_id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
        $stmt->bindParam(":price", $this->price, PDO::PARAM_STR);
        $stmt->bindParam(":tax", $this->tax, PDO::PARAM_STR);
        $stmt->bindParam(":quantity", $this->quantity, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
        $stmt->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }




}
