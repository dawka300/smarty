<?php

namespace App\Model;


use App\Library\Database;
use App\Library\Model;
use PDO;

class Gatunek extends Model {

    public $product_id, $amount, $total, $total_tax;

    protected $table='orders';

    protected $dbh;


    public function __construct()
    {
        $this->dbh=Database::getInstance()->getDb();


    }
    public function save(): void
    {
        $sql = "INSERT INTO " . $this->table . " VALUES (null, :product_id, :amount, :total_cost, :total_cost_tax, null, null)";

        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindParam(":product_id", $this->product_id, PDO::PARAM_INT);
            $stmt->bindParam(":amount", $this->amount, PDO::PARAM_INT);
            $stmt->bindParam(":total_cost", $this->total, PDO::PARAM_STR);
            $stmt->bindParam(":total_cost_tax", $this->total_tax, PDO::PARAM_STR);

            $stmt->execute();
        } catch (\PDOException $e) {
            die($e->getMessage());
        }


    }
    public function update($id, $quantity=0){
        $sql="UPDATE products SET quantity=:quantity WHERE id=:id";
        try{
            $stmt=$this->dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt->execute();
        }catch (\PDOException $e) {
            die($e->getMessage());
        }
    }







}
