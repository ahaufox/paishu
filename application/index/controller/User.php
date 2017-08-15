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
   * 渲染登陆页
   */
    public function login()
    {
        $domain = Request::instance()->domain() . '/public/';//定义网站入口
        if (session::get('userid')) {
            return $this->success();
        }
        $this->assign('assess', '/logo-100_100-8.png');
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
            $this->redirect('http://localhost/public', 302);
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
        return $this->fetch('./user');

    }

}