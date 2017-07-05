<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
class Index extends Controller
{
    /*
    public function _initialize()
    {
		$name='hello';
        echo $name;
    }*/
     public function index()
     {
         session::set('name','xxthinkphp');
		 $name = session::get('name');
		 $this->assign('name',$name);

		 return $this->fetch('./index');

     }

    public function yuyue()
    {

     }
}