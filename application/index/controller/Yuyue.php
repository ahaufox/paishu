<?php
namespace app\index\controller;

use app\index\model\Seo;
use think\Controller;
use think\Session;


class Yuyue extends Controller
{
    public function _initialize()
    {

        $seo=Seo::getByController(CONTROLLER_NAME);
        if(empty($seo)){
            $seo=Seo::getByController('index');
            $title = $seo->title;
            $keywords = $seo->keywords;
            $description = $seo->description;
            $this->assign('keywords', $keywords);
            $this->assign('description', $description);
            $this->assign('title', $title);
        }else {
            $title = $seo->title;
            $keywords = $seo->keywords;
            $description = $seo->description;
            $this->assign('keywords', $keywords);
            $this->assign('description', $description);
            $this->assign('title', $title);
        }
    }




    public function index()
    {

        return $this->fetch('./yuyue');

    }


}