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
//        $this->db->setTable($this->table);
//        $this->dbh=$this->db->getDb();
    }



    public function save() : void
    {
        $sql="INSERT INTO ".$this->table." VALUES (null, :imie, :nazwisko, :data_urodzenia, :aktywny, NOW(), null)";
//        var_dump($sql);
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


    public function update($id) : void
    {
        $sql="UPDATE ".$this->table." SET name=:name, address=:address, phone=:phone, email=:email WHERE id=:id";
        try {
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
        $stmt->bindParam(":address", $this->address, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $this->phone, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
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
