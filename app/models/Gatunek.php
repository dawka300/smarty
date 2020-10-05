<?php

namespace App\Model;


use App\Library\Database;
use App\Library\Model;
use PDO;

class Gatunek extends Model {

    public $nazwa, $aktywny;

    protected $table = 'gatunki_literackie';

    protected $dbh;


    public function __construct()
    {
        $this->dbh=Database::getInstance()->getDb();


    }
    public function save(): void
    {
        $sql = "INSERT INTO " . $this->table . " VALUES (null, :nazwa, :aktywny)";

        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(":nazwa", $this->nazwa, PDO::PARAM_STR);
            $stmt->bindParam(":aktywny", $this->aktywny, PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }


    }
    public function update(int $id, $quantity=0){
        $sql="UPDATE " . $this->table . " SET nazwa=:nazwa WHERE id=:id";
        try{
            $stmt=$this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nazwa', $quantity, PDO::PARAM_STR);
            $stmt->execute();
        }catch (\PDOException $e) {
            die($e->getMessage());
        }
    }


}
