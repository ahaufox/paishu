<?php
namespace app\index\controller;

use think\Controller;
use think\Session;
use think\Request;
use app\index\model\Seo;
use app\index\model\Users;
use think\Validate;//验证表单


class User extends Controller
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

    /*
     * 渲染首页
     */
    public function index()
    {

        return $this->fetch('./user');

    }

}