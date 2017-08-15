<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Session;


class Yuyue extends Controller
{
    public function index()
    {
        $domain = Request::instance()->domain();//定义网站入口
        $seo = seo();
        $this->assign([
            'keywords' => $seo['keywords'],
            'description' => $seo['description'],
            'title' => $seo['title']
        ]);
        //判断是否已经登录
        if (session::get('username')) {
            return $this->fetch('./yuyue');
        }

        return $this->redirect($domain . '/User/login');
    }

    public function doit()
    {

        //用户提交预约后的动作（写入数据库），返回success
        if (Request::instance()->isPost()) {
            $number = input('post.number');
            $tel = session::get('tel');
            $location = input('post.location');
            $ydate = input('post.yydate');
            $inserttime = time();
            $data = ['number' => $number, 'tel' => $tel, 'location' => $location, 'date' => strtotime($ydate), 'insert_time' => $inserttime];
            $res = db('yuyue')->insert($data);
            if ($res) {
                return 'success';
            }
            return '预约失败，请重试！';
        };

    }


}