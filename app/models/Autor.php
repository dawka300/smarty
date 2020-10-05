<?php

namespace App\Model;


use App\Library\Database;

use App\Library\Model;
use PDO;

class Autor extends Model {


    public $imie = null, $nazwisko = null, $data_urodzenia = null, $aktywny = true;

    protected $table = 'autor';

    protected  $dbh;



    public function __construct()
    {
        $this->dbh=Database::getInstance()->getDb();
    }



    public function save() : void
    {
        $sql="INSERT INTO ".$this->table." VALUES (null, :imie, :nazwisko, :data_urodzenia, :aktywny, NOW(), null)";

        try {
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(":imie", $this->imie, PDO::PARAM_STR);
        $stmt->bindParam(":nazwisko", $this->nazwisko, PDO::PARAM_STR);
        $stmt->bindParam(":data_urodzenia", $this->data_urodzenia, PDO::PARAM_STR);
        $stmt->bindParam(":aktywny", $this->aktywny, PDO::PARAM_INT);
        $stmt->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }


    public function update(int $id) : void
    {
        $sql="UPDATE ".$this->table." SET imie=:imie, nazwisko=:nazwisko, data_urodzenia=:data_urodzenia, aktywny=:aktywny WHERE id=:id";
        try {
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(":imie", $this->imie, PDO::PARAM_STR);
        $stmt->bindParam(":nazwisko", $this->nazwisko, PDO::PARAM_STR);
        $stmt->bindParam(":data_urodzenia", $this->data_urodzenia, PDO::PARAM_STR);
        $stmt->bindParam(":aktywny", $this->aktywny, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }

    }

    public function is_active(int $number) : string
    {
        $array = [0 => 'Niekatywny', 1 => 'Aktywny'];

        return $array[$number];
    }







}
