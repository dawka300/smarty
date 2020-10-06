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



        $this->smarty::assign('autorzy', $autorzy);
        $this->smarty::assign('ksiazki', $ksiazki);
        $this->smarty::assign('gatunki', $gatunki);
       $this->smarty->display('index.tpl');
    }
}
