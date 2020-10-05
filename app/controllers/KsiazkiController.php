<?php

namespace App\Controller;


use App\Library\Controller;
use App\Model\Autor;
use App\Model\Gatunek;
use App\Model\Ksiazka;

class Ksiazki extends Controller
{
    private $ksiazka;

    public function __construct()
    {
        $this->ksiazka = new Ksiazka();
        parent::__construct();
    }


    public function index()
    {
        $sql = "SELECT k.tytul, k.isbn, k.liczba_stron, k.opis, k.cena_netto, k.cena_brutto, CONCAT(a.imie, ' ', a.nazwisko) FROM ksiazka k LEFT JOIN autor a ON k.id_autor=a.id";
        $ksiazki = $this->ksiazka->query($sql);

        $this->smarty::assign('ksiazki', $ksiazki);

        $this->smarty::display('ksiazki/index.tpl');
    }

    public function add()
    {
        $autorzy = new Autor();
        $autorzy = $autorzy->allActive();
        $gatunki = new Gatunek();
        $gatunki = $gatunki->allActive();

        $this->smarty::assign('autorzy', $autorzy);
        $this->smarty::assign('gatunki', $gatunki);
        $this->smarty::display('ksiazki/dodaj.tpl');
    }

    public function edit($id)
    {
        $autorzy = new Autor();
        $autorzy = $autorzy->allActive();
        $gatunki = new Gatunek();
        $gatunki = $gatunki->allActive();

        $ksiazka = $this->ksiazka->find($id);


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
