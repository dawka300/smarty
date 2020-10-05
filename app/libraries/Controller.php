<?php

namespace App\Library;

class Controller
{


    protected $smarty;

    public function __construct()
    {
        $this->smarty = Smrt::getOInstance();

    }

    public function view($path, $data = [])
    {
        if (file_exists(dirname(__DIR__) . DS . 'views' . DS . $path . '.php')) {

            include_once dirname(__DIR__) . DS . 'views' . DS . $path . '.php';
        } else {

            exit("No such view");
        }


    }


}
