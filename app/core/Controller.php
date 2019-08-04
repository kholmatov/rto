<?php

/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
class Controller
{

    public function model($model)
    {
        require_once './app/models/' . $model . '.php';

        return new $model();
    }

    public function view($view, $data = [],$html = 0)
    {
        $helper = new Helper();
        if($html) {
            require_once './app/views/header.php';
            require_once './app/views/' . $view . '.php';
            require_once './app/views/footer.php';
        }else{
            require_once './app/views/' . $view . '.php';
        }


    }

}