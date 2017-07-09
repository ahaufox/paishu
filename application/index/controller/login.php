<?php
namespace app\index\controller;

use app\index\model\Seo;
use app\index\model\Users;
use think\Controller;
use think\Session;

class Login extends Controller
{
    //定义seo三个字段

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
        \think\Image::open(ROOT_PATH.'/public/static/image/hongbao.png')->thumb(100, 100)->radius(50)->save(ROOT_PATH.'/public/static/image/f1_80*80.jpg');
        $this->assign('assess','./static/image/f1_80*80.jpg');
        if(session::get('username')){
            return '已经登录';

        }
        return $this->fetch('./login');

    }

    public function login()
    {
        $users=new Users;

        return $users->login();
    }
    public function logout(){
        $u=new Users;
        $u=$u->logout();
        if($u='success'){
            $this->success('退出成功', 'http://localhost/public/index','',1);
        }
    }


}