<?php
namespace app\index\controller;

use app\index\model\Seo;
use think\Controller;
use think\Session;


class Register extends Controller
{
    public function _initialize()//定义seo三个字段
    {

    }
    public function index()
    {
        $seo=seo();
        $this->assign([
            'keywords'=> $seo['keywords'],
            'description'=>$seo['description'],
            'title'=>$seo['title']
        ]);
        return $this->fetch('./register');

    }


}