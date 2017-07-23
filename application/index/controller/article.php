<?php
namespace app\index\controller;

use think\Controller;
use think\Session;


class Article extends Controller
{


    public function index()
    {
        $seo=seo();
        $this->assign([
            'keywords'=> $seo['keywords'],
            'description'=>$seo['description'],
            'title'=>$seo['title']
        ]);

        return $this->fetch('./article');

    }


}