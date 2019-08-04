<?php

/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
class App
{
    protected $controller = 'users';

    protected $method = 'form';

    protected $params = [];

    public function __construct()
    {

        $url = $this->parseUrl();
        if (file_exists(getcwd().'/app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once getcwd().'/app/controllers/' . $this->controller . '.php';

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];
        //print_r($this->params);
        call_user_func_array([new $this->controller, $this->method],  $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }

}