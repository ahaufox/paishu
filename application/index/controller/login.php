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
    //用完一次就不需要了,后期在用户设置头像的时候可以用
        //    \think\Image::open(ROOT_PATH.'/public/static/image/logo-500*500-8.png')->thumb(150, 150)->radius(75)->save(ROOT_PATH.'/public/static/image/logo-100*100-8.png');
        $this->assign('assess','./static/image/logo-100*100-8.png');
        if(session::get('username')){
            //return '已经登录';
            return $this->success('登录成功', 'http://localhost/public/index','',1);
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