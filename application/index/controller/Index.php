<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{

    public function _initialize()
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
         return $this->fetch('./index');
     }
}