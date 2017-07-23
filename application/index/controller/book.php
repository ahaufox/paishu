<?php
namespace app\index\controller;

use think\Request;
use think\Controller;
use think\Url;
use app\index\model\OnSale;


class Book extends Controller
{
    public function _initialize()
    {
        $seo = seo();
        $this->assign([
            'keywords' => $seo['keywords'],
            'description' => $seo['description'],
            'title' => $seo['title']
        ]);
    }

    public function index()
    {
        if(empty(Request::instance()->param()['id'])){
            return $this->redirect('././category');
        };
        $b=new OnSale;
        $b=$b->book();
        if(empty($b)){
            return $this->error('书本不存在');
        }
        $this->assign([
            'booktitle'=>$b['title'],
            'auth'=>$b['auth'],
            'isbn'=>$b['isbn']
        ]);
        return $this->fetch('./book');
        //return $this->fetch('./book');
    }
}