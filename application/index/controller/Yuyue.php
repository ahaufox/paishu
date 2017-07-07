<?php
namespace app\index\controller;

use app\index\model\Seo;
use think\Controller;
use think\Session;


class Yuyue extends Controller
{


    public function index()
    {
        $seo=seo();
        $this->assign([
            'keywords'=> $seo['keywords'],
            'description'=>$seo['description'],
            'title'=>$seo['title']
        ]);

        return $this->fetch('./yuyue');

    }


}