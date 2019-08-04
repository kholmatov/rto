<?php

/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
class Users extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->helper = new Helper();
    }

    public function index($param = [])
    {

        $records_per_page = 3;
        $this->helper->filter(['username', 'email', 'status'], 'username', 'asc');
        $pagination = new Zebra_Pagination();
        $users = User::select('*')
            ->orderBy($this->helper->sortby, $this->helper->sort)
            ->skip((($pagination->get_page() - 1) * $records_per_page))
            ->take($records_per_page)
            ->get();
        $rows = User::all()->count();
        $pagination->records($rows);
        $pagination->records_per_page($records_per_page);
        $this->view('users/index', [
            'users' => $users,
            'pagination' => $pagination,
        ]);

    }

    public function form($id = 0)
    {

        $fields = ['id' => 0, 'username' => '', 'email' => '', 'status' => 0, 'test' => '5.5'];
        $rfields = User::find(25)->first();
        $fields = isset($rfields) ? $rfields : $fields;
        $this->view('users/form', [
            'action' => '',
            'fields' => $fields
        ]);
    }

    public function create()
    {
        $result = $this->helper->getPost();
        $id = "";
        if (!array_filter($result)) {
            if (!$result['id']) {
                $rs = User::create($result);
                $id = $rs->id . '/';
            } else {

                $result['status'] = isset($result['status']) ? 1 : 0;
                if ($this->helper->is_admin())
                    User::where('id', $result['id'])->update($result);
                $id = $result['id'] . '/';

            }
        }
        $this->helper->redirect('/users/form/' . $id);
    }


    public function send()
    {
        $result = $this->helper->getPost();
        var_dump($result);
        $rs = Review::create($result);
        print_r($rs);
    }


    public function delete($id = 0)
    {
        if ($this->helper->is_admin() && $id) User::where('id', $id)->delete();
        $this->helper->redirect('/');
    }

    public function login()
    {
        $result = $this->helper->auth();
        if (!$result)
            $this->view('users/login');
        else $this->helper->redirect('/');
    }

    public function logout()
    {
        $this->helper->stop_session();
        $this->helper->redirect('/');
    }


}