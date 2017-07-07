<?php
namespace app\index\controller;

use app\index\model\Seo;
use think\Controller;
use think\Session;


class Login extends Controller
{
    //定义seo三个字段

    public function index()
    {
        $seo=seo();
        $this->assign([
            'keywords'=> $seo['keywords'],
            'description'=>$seo['description'],
            'title'=>$seo['title']
        ]);
        \think\Image::open(ROOT_PATH.'/public/static/image/hongbao.png')->thumb(100, 100)->radius(50)->save(ROOT_PATH.'/public/static/image/f1_80*80.jpg');
        $this->assign('assess','./static/image/f1_80*80.jpg');
        return $this->fetch('./login');

    }


}