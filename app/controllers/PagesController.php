<?php

namespace App\Controller;

use App\Library\Controller;
use App\Model\Simple;

class Pages extends Controller {

    protected $simpleModel;

    public function __construct()
    {
        $this->simpleModel=new Simple();
        parent::__construct();
    }

    public function index(){
        $autorzy=$this->simpleModel->queryRow("SELECT COUNT(*) FROM autor");
        $gatunki=$this->simpleModel->queryRow("SELECT COUNT(*) FROM gatunki_literackie");
        $ksiazki=$this->simpleModel->queryRow("SELECT COUNT(*) FROM ksiazka");

//        $this->view('index', ['title'=>'Main Site', 'producers'=>array_shift($producers), 'products'=>array_shift($products), 'orders'=>array_shift($orders)]);
//        $this->view('index', ['title'=>'Main Site' ]);

        $this->smarty::assign('autorzy', $autorzy);
       $this->smarty->display('index.tpl');
    }
}
