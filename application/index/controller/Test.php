<?php
namespace app\index\controller;

use think\Controller;


class Test extends Controller{
    public function index(){
        $x='2017/7/16';
        $x=strtotime($x);
        return $x;
    }
}
