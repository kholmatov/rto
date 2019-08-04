<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
//dsxuse models\Review;

class Login extends Controller
{
    protected $helper;

    public function __construct()
    {
        $this->model('Review');
        $this->helper = new Helper();
        //$this->helper->html = 1;
    }

    public function form($param = [])
    {

        $result = $this->helper->auth();
        if (!$this->helper->is_admin()) {
            $this->view('users/login', [], 1);
        } else {
            $records_per_page = 15;
            $this->helper->filter(['first_name', 'last_name', 'email', 'input_income', 'input_payment', 'budget', 'test', 'created_at'], 'created_at', 'desc');
            $pagination = new Zebra_Pagination();
            $users = Review::select('*')
                ->orderBy($this->helper->sortby, $this->helper->sort)
                ->skip((($pagination->get_page() - 1) * $records_per_page))
                ->take($records_per_page)
                ->get();

            $rows = Review::all()->count();
            $pagination->records($rows);
            $pagination->records_per_page($records_per_page);
            $this->view('users/index', [
                'users' => $users,
                'pagination' => $pagination,
                'rows'=> $rows
            ], 1);
        }

    }


    public function edit($id = 0)
    {
        if (!$id) $this->helper->redirect('/calculator/login/');
        $fields = ['id' => 0, 'username' => '', 'email' => '', 'status' => 0, 'tasks' => ''];
        if ($this->helper->is_admin() && $id) $rfields = User::find($id);
        $fields = isset($rfields) ? $rfields : $fields;
        $this->view('users/edit', [
            'action' => '',
            'fields' => $fields
        ], 1);
    }


    public function create()
    {
        $result = $this->helper->getPost();
        if (array_filter($result)) {
            if (isset($result['password']) && trim($result['password']) != "") {
                $result['password'] = md5($result['password']);
            } else {
                $rfields = User::find(25)->first();
                $result['password'] = $rfields['password'];
            }
            if ($this->helper->is_admin())
                User::where('id', $result['id'])->update($result);
            $id = $result['id'] . '/';

        }
        $this->helper->redirect('/calculator/login/edit/' . $id);
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
        if ($this->helper->is_admin() && $id) Review::where('id', $id)->delete();
        $this->helper->redirect('/calculator/login/');
    }

    public function login()
    {
        $result = $this->helper->auth();
        if (!$result)
            $this->view('users/login');
        else $this->helper->redirect('/calculator/login/');
    }

    public function logout()
    {
        $this->helper->stop_session();
        $this->helper->redirect('/calculator/login/');
    }


}