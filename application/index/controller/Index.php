<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
        public function _initialize(){
            $seo=seo();
            $this->assign([
                'keywords'=> $seo['keywords'],
                'description'=>$seo['description'],
                'title'=>$seo['title']
            ]);
        }

        public function index()
        {

            return $this->fetch();
        }
}