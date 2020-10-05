<?php

namespace App\Controller;


use App\Library\Controller;
use App\Model\Ksiazka;
//use App\Model\Product;

class Ksiazki extends Controller
{
    private $ksiazka;

    public function __construct()
    {
        $this->ksiazka = new Ksiazka();
    }


    public function index()
    {
        $ksiazki = $this->ksiazka->all();
//var_dump($products);
        $this->view('products/index', ['title' => 'Products', 'check_producer' => array_shift($check_producer), 'products' => $products]);
    }

    public function add()
    {
        $producers = new Producer();
        $producers = $producers->all();

        $this->view('products/addProduct', ['title' => 'Add Product', 'producers' => $producers]);
    }

    public function edit($id)
    {
        $producers = new Producer();
        $producers = $producers->all();

        $product = $this->product->find($id);


        $this->view('products/editProduct', ['title' => 'Edit product', 'product' => $product, 'producers' => $producers]);

    }

    public function store()
    {
        if (!empty($_POST)) {
            $name = sanitize($_POST['name']);
            $producer_id = (int)sanitize($_POST['producer_id']);
            $price = (string)sanitize($_POST['price']);
            $tax = (float)sanitize($_POST['tax']);
            $quantity = (int)sanitize($_POST['quantity']);
        } else {
            header('Refresh: 5, URL=./');
            die('Invalid data');
        }
        $this->product->name = $name;
        $this->product->producer_id = $producer_id;
        $this->product->price = $price;
        $this->product->tax = $tax;
        $this->product->quantity = $quantity;

        $this->product->save();

        header('Location: ./');


    }

    public function update()
    {
        //        var_dump($_SESSION['token']).'<br>';
//        var_dump($_POST);
        if (!empty($_POST)) {
//            var_dump($_POST);
            $name = sanitize($_POST['name']);
            $producer_id = (int)sanitize($_POST['producer_id']);
            $price = (string)sanitize($_POST['price']);
            $tax = (float)sanitize($_POST['tax']);
            $quantity = (int)sanitize($_POST['quantity']);

            $id = (int)sanitize($_POST['id']);
        } else {
            header('Refresh: 5, URL=./');
            die("Invalid data");
        }


        $this->product->name = $name;
        $this->product->producer_id = $producer_id;
        $this->product->price = $price;
        $this->product->tax = $tax;
        $this->product->quantity = $quantity;

        $this->product->update($id);

        header('Location: ./');


    }
    public function delete(){

        if ($_POST['id']){
            $id=sanitize((int)$_POST['id']);
        }else {
            header('Refresh: 5, URL=./');
            die("Invalid data");

        }

        $this->product->delete($id);

        header('Location: ./');
    }


}
