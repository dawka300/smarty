<?php

namespace App\Controller;

use App\Library\Controller;
use App\Model\Autor;
//use App\Model\Product;

class Autorzy extends Controller {

    protected $autor;

    public function __construct()
    {
        parent::__construct();
        $this->autor = new Autor();

    }


    public function index(){

        $autorzy = $this->autor->all();


        $this->smarty->assign('autorzy', $autorzy);
        $this->smarty->registerPlugin('function', 'aktywny', 'is_active');

        $this->smarty->display('autorzy/index.tpl');

    }

    public function add(){

        $this->smarty->display('autorzy/dodaj.tpl');

    }
    public function store(){

        if (!empty($_POST)){
            $imie = sanitize($_POST['first_name']);
            $nazwisko = sanitize($_POST['last_name']);
            $data_urodzenia = sanitize($_POST['birthday']);
            $aktywny = $_POST['is_active'];
        }else {
            die("Invalid data");
        }

        $this->autor->imie = $imie;
        $this->autor->nazwisko = $nazwisko;
        $this->autor->data_urodzenia = $data_urodzenia;
        $this->autor->aktywny = $aktywny;

        $this->autor->save();

        header('Location: ./');

    }

    public function edit($id){

        $autor = $this->autor->find($id);
        $this->smarty->assign('autor', $autor);

        $this->smarty->display('autorzy/edytuj');

    }

    public function update(){

        if (!empty($_POST)){

            $name=sanitize($_POST['name']);
            $address=sanitize($_POST['address']);
            $email=filter_var(sanitize($_POST['email']), FILTER_SANITIZE_EMAIL);
            $phone=$_POST['phone'];
            $id=(int)sanitize($_POST['id']);
        }else {
            header('Refresh: 5, URL=./');
            die("Invalid data");
        }


        $this->producer->name=$name;
        $this->producer->email=$email;
        $this->producer->phone=$phone;
        $this->producer->address=$address;

        $this->producer->update($id);

        header('Location: ./');


    }

    public function delete(){

        if ($_POST['id']){
            $id=sanitize((int)$_POST['id']);
        }else {
            header('Refresh: 5, URL=./');
            die("Invalid data");

        }

        $this->producer->delete($id);

        header('Location: ./');
    }
    public function show($id){
        $products=new Product();
        $products=$products->getAllByProducerId($id);
//        $this->producer->db->setTable('producers');

        $producer=$this->producer->find($id);
        $this->view('producers/showProducts', ['title'=>'Producer\'s products', 'products'=>$products, 'producer'=>$producer]);

    }

    public function ajax_filter(){
        if(empty($_POST['ajax'])){
           return null;
        }
        $sql = $this->createSql($_POST['ajax']);

    }
    protected function createSql(array $post) : string
    {
        $sql = "SELECT * FROM autor WHERE";
        $count = false;
        if($post['imie']){
            $sql .= " imie LIKE '%". $post['imie'] ."%' ";
            $count = true;
        }
        if($post['nazwisko']){
            if($count){
                $sql .= " AND ";
            }
            $sql .= " nazwisko LIKE '%". $post['nazwisko'] ."%' ";
            $count = true;
        }
        if($post['data_urodzenia']){
            if($count){
                $sql .= " AND ";
            }
            $sql .= " data_urodzenia='".$post['data_urodzenia']."' ";
            $count = true;
        }
        if($post['aktywny']){
            if($count){
                $sql .= " AND ";
            }
            $sql .= " aktywny='".$post['aktywny']."' ";
        }

        return $sql;

    }
}
