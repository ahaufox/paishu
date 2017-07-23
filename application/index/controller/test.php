<?php
namespace app\index\controller;

use function MongoDB\BSON\toJSON;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;


class Test extends Controller{
    public function index(){
        $x='2017/7/16';
        $x=strtotime($x);
        return $x;
    }
}
