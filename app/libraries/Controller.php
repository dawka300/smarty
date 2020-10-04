<?php

namespace App\Library;

class Controller {

   /* protected function model($model){
        $model="App\\Model\\".$model;

        return new $model;
    }*/

    public function view($path, $data=[]){
        if (file_exists(dirname(__DIR__).DS.'views'.DS.$path.'.php')){
//            echo dirname(__DIR__).DS.'views'.DS.$path.'.php';
            include_once dirname(__DIR__).DS.'views'.DS.$path.'.php';
        }else {

            exit("No such view");
        }



    }





}
