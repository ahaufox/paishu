<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
class User extends Controller
{
    public function index()
    {
        $name='user';
        $this->assign('name',$name);
        return view('./user');

    }

}