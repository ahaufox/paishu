<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use app\index\model\Seo;
class User extends Controller
{

    public function index()
    {
        $seo=seo();
        $this->assign([
            'keywords'=> $seo['keywords'],
            'description'=>$seo['description'],
            'title'=>$seo['title']
        ]);

        return view('./index');

    }

}