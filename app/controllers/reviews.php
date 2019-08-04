<?php

/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
class Reviews extends Controller
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


    public function send()
    {
        $result = $this->helper->getPost();
        $this->model('Review');
        $rfields = User::find(25)->first();
        $test = $rfields['test'];
        $result['budget'] = $result['input_income']+$result['input_income']/100*$test+$result['input_payment'];
        $result['test'] =  $test;
        $rs = Review::create($result);
        $to = $result['email'];
        $headers = 'From: "RTO Affordability Calculator" <'.$rfields['email'].'>'. "\r\n";
        $headers .= 'Bcc: '.$rfields['email']. "\r\n";
        $subject =  $result['first_name'].' '. $result['last_name'];
        $message = $result['first_name'].' '. $result['last_name']."\n";
        $message .= $result['email']."\n";
        $message .= "Household Income: $".$result['input_income']."\n";
        $message .= "Down Payment: $".$result['input_payment']."\n";
        $message .= "YOUR BUDGET IS: $".$result['budget']."\n";
        if(mail($to, $subject, $message, $headers))  print_r($rs->id);
        exit();
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