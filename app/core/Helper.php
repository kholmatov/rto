<?php

/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
class Helper
{
    public $sortby = "";
    public $sort = "";
    private $result;

    public function filter($filter, $field, $sort = "asc")
    {
        $this->sortby = (isset($_GET['sortby']) && in_array($_GET['sortby'], $filter)) ? $_GET['sortby'] : $field;
        $this->sort = (isset($_GET['sort']) && in_array($_GET['sort'], ['asc', 'desc'])) ? $_GET['sort'] : $sort;
    }

    public function get_sort_link($column_id, $column_name)
    {
        $active = "";
        $sort = 'asc';
        if ($this->sortby == $column_id) {
            $sort = ($this->sort == $sort) ? 'desc' : $sort;
            $active = "class='" . $sort . "'";
        }
        $href = '?sortby=' . $column_id . '&sort=' . $sort;
        return "<a $active href='$href'>$column_name</a>";
    }

    public function start_session()
    {
        $_SESSION['admin'] = 1;
    }

    public function stop_session()
    {
        session_destroy();
    }

    public function is_admin()
    {
        return (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) ? 1 : 0;
    }

    public function auth()
    {
        $this->result = $this->getPost();
        if (array_filter($this->result)) {
            $user =  User::where('password', md5($this->result['password']))
                ->where(function ($query) {
                $query->where('username', $this->result['login'])
                    ->orWhere('email', $this->result['login']);
            })->first();
            if ($user['username']) {
            $this->start_session();
                return 1;
            }
        }
        return 0;
    }

    public function redirect($location)
    {
        header('Location: http://' . $_SERVER['SERVER_NAME'] . $location);
    }

    public function getPost()
    {
        if (isset($_POST)) return $_POST;
        return [];
    }

}