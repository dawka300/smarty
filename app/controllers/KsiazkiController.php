<?php

namespace App\Controller;


use App\Library\Controller;
use App\Model\Autor;
use App\Model\Gatunek;
use App\Model\Ksiazka;
use App\Model\KsiazkaGatunek;

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
        $sql = "SELECT k.id, k.tytul, k.isbn, k.liczba_stron, k.opis, k.cena_netto, k.cena_brutto, k.aktywna, CONCAT(a.imie, ' ', a.nazwisko) as autor FROM ksiazka k LEFT JOIN autor a ON k.id_autor=a.id";
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
        $ksiazkaGatunek = new KsiazkaGatunek();
        $ksiazkaGatunek = $ksiazkaGatunek->findByIdBook($id);
        $ksiazka = $this->ksiazka->find($id);

        $this->smarty::assign('autorzy', $autorzy);
        $this->smarty::assign('gatunki', $gatunki);
        $this->smarty::assign('ksiazka', $ksiazka);
        $this->smarty::assign('ksiazkaGatunek', $ksiazkaGatunek);

        $this->smarty::display('ksiazki/edytuj.tpl');

    }

    public function store()
    {
        if (!empty($_POST)) {
            $autor = (int)sanitize($_POST['author']);
            $tytul = sanitize($_POST['title']);
            $isbn = sanitize($_POST['isbn']);
            $liczba_stron = (int)sanitize($_POST['number']);
            $opis = sanitize($_POST['desc']);
            $netto = (float)sanitize($_POST['net_price']);
            $brutto = (float)sanitize($_POST['gross_price']);
            $aktywny = sanitize($_POST['is_active']);
        } else {
            header('Refresh: 5, URL=./');
            die('Invalid data');
        }

        $this->ksiazka->id_autor = $autor;
        $this->ksiazka->tytul = $tytul;
        $this->ksiazka->isbn = $isbn;
        $this->ksiazka->liczba_stron = $liczba_stron;
        $this->ksiazka->opis = $opis;
        $this->ksiazka->cena_netto = $netto;
        $this->ksiazka->cena_brutto = $brutto;
        $this->ksiazka->aktywna = $aktywny;

        $this->ksiazka->save();
        if (isset($_POST['genre']) && is_array($_POST['genre'])){
            $id = $this->ksiazka->lastId();
            foreach ($_POST['genre'] as $genre){
                $ksiazkaGatunek = new KsiazkaGatunek();
                $ksiazkaGatunek->id_ksiazka = (int)$id;
                $ksiazkaGatunek->id_gatunek_literacki = (int)$genre;
               $ksiazkaGatunek->save();
            }
        }

        header('Location: ./ksiazki');


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


        $this->ksiazka->name = $name;
        $this->ksiazka->producer_id = $producer_id;
        $this->ksiazka->price = $price;
        $this->ksiazka->tax = $tax;
        $this->ksiazka->quantity = $quantity;

        $this->ksiazka->update($id);

        header('Location: /ksiazki');


    }
    public function delete(){

        if ($_POST['id']){
            $id=sanitize((int)$_POST['id']);
        }else {
            header('Refresh: 5, URL=./');
            die("Invalid data");

        }

        $this->ksiazka->delete($id);
        $ksiazkaGatunek = new KsiazkaGatunek();
        $ksiazkaGatunek->deleteByIdBook($id);

        header('Location: /ksiazki/index');
    }


}
