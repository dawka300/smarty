<?php

namespace App\Library;


class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = array();
//    protected $num=0;

    public function __construct()
    {
        $url = $this->getUrl();
        if(!empty($url)) {
            if (file_exists(dirname(__DIR__) . '/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
                $this->currentController = ucfirst($url[0]);
                unset($url[0]);
            }
        }


//        require_once dirname(__DIR__).'/controllers/'.$this->currentController.'Controller.php';
        $this->currentController = "App\\Controller\\" . $this->currentController;
        $this->currentController = new $this->currentController;
//var_dump($url);
//exit();
        if (isset($url[1])){
            if (method_exists($this->currentController, $url[1])){
                $this->currentMethod=$url[1];
                unset($url[1]);
            }


        }

        $this->params=$url ? array_values($url) : [];


        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

    }


    public function getUrl()
    {

        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
//        else {
//            header('http://www.blogprawo.pl');
//
//        }
    }

}
