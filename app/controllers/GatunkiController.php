<?php

namespace App\Controller;

use App\Library\Controller;
use App\Model\Order;

class Gatunki extends Controller {

    private $order;

    public function __construct()
    {
        $this->order=new Order();
    }

    public function ajax(){
        if (!empty($_POST['producer_id'])){
            $producer=$this->order->queryRow("SELECT pr.name, pt.price, pt.quantity,pt.tax, pt.id FROM producers pr, products pt WHERE pt.producer_id=pr.id AND pr.id={$_POST['producer_id']} AND pt.name='{$_POST['product_name']}'");
            echo json_encode(['result'=>$producer]);
            exit();
        }

    }

    public function index(){
        $orders=$this->order->query("SELECT o.*,pt.name as n, pr.name FROM orders o, producers pr, products pt WHERE o.product_id=pt.id AND pr.id=pt.producer_id");

        $this->view('orders/index', ['title'=>'All orders', 'orders'=>$orders]);
    }

    public function add(){

        $products=$this->order->query("SELECT * FROM products");


        $this->view('orders/addOrder', ['title'=>'Add order', 'products'=>$products]);

    }

    public function store(){
        if (!empty($_POST)){
            $product_id=(int)sanitize($_POST['product_id']);
            $amount=(int)sanitize($_POST['amount']);
            $new_quantity=(int)sanitize($_POST['new_quantity']);
            $total=(float)sanitize($_POST['total']);
            $total_tax=(float)sanitize($_POST['total_tax']);


        } else {
            header('Refresh: 5, URL=./');
            die("Invalid data");
        }
        $this->order->update($product_id, $new_quantity);

        $this->order->product_id=$product_id;
        $this->order->amount=$amount;
        $this->order->total=$total;
        $this->order->total_tax=$total_tax;

        $this->order->save();

        header('Location: ./');



    }

    public function delete(){
        if ($_POST['id']){
            $id=sanitize((int)$_POST['id']);
        }else {
            header('Refresh: 5, URL=./');
            die("Invalid data");

        }

        $this->order->delete($id);

        header('Location: ./');
    }

}
