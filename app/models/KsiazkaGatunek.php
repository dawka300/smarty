<?php

namespace App\Model;


use App\Library\Database;

use App\Library\Model;
use PDO;

class KsiazkaGatunek extends Model {


    public $id_ksiazka, $id_gatunek_literacki;

    protected $table = 'ksiazka_gatunek';

    protected  $dbh;



    public function __construct()
    {
        $this->dbh=Database::getInstance()->getDb();
    }



    public function save()
    {
        $sql="INSERT INTO ".$this->table." VALUES (null, :id_ksiazka, :id_gatunek)";

        try {
        $stmt=$this->dbh->prepare($sql);
        $stmt->bindParam(":id_ksiazka", $this->id_ksiazka, PDO::PARAM_INT);
        $stmt->bindParam(":id_gatunek", $this->id_gatunek_literacki, PDO::PARAM_INT);
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

  public function findByIdBook(int $id){
      if (empty($id)) {
          return null;
      }
      $sql = "SELECT * FROM " . $this->table . " WHERE id_ksiazka=:id";
      try {
          $stmt = $this->dbh->prepare($sql);
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);
          $stmt->execute();
          $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

          return $result;

      } catch (\PDOException $e) {
          die($e->getMessage());
      }
  }

  public function deleteByIdBook(int $id){
      {
          if (empty($id)) {
              return null;
          }
          $sql = "DELETE FROM " . $this->table . " WHERE id_ksiazka=:id";
          try {
              $stmt = $this->dbh->prepare($sql);
              $stmt->bindParam(':id', $id, PDO::PARAM_INT);
              $stmt->execute();


          } catch (\PDOException $e) {
              die($e->getMessage());
          }

      }
  }



}
