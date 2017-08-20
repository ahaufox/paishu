<?php
namespace app\index\controller;

use app\index\model\Users;
use think\Controller;
use think\Request;
use think\Session;

//验证表单


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
   * 渲染登陆页
   */
    public function login()
    {

        if (session::get('userid')) {
            return $this->success();
        }
        $this->assign('assess', '/logo-100*100-8.png');
        return $this->fetch('./login');
    }

    public function dologin()
    {
        $u = new Users;
        return $u->login();
    }

    /*
   * 登出操作
   */
    public function logout()
    {
        $u = new Users;
        $u = $u->logout();
        if ($u = 'success') {
            $this->redirect('/', 302);
        }
    }

    /*
     * 渲染首页
     */
    public function index()
    {
        if (!session::get('userid')) {
            return $this->redirect('../user/login');
        }
        $this->assign([
            'username'=>session::get('username'),
            'userid'=>session::get('userid')
        ]);
        return $this->fetch();

    }

}