<?php

namespace App\Library;

class Controller
{


    protected $smarty;

    public function __construct()
    {
        $this->smarty = new \Smarty();
        $this->smarty->caching = false;
        $this->smarty->cache_lifetime = 120;
        $this->smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . '/templates');
        $this->smarty->setCompileDir($_SERVER['DOCUMENT_ROOT'] . '/templates_c');
        $this->smarty->cache_lifetime = 120;
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
