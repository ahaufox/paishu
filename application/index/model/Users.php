<?php
/**
 * Created by PhpStorm.
 * User: Ahaufox
 * Date: 2017/7/7
 * Time: 下午11:16
 */
namespace app\index\model;

use think\Model;
use think\Request;
use think\Session;

class Users extends Model
{
    public function login()
    {
        if (Request::instance()->isPost()) {
            $username = input('post.username');
            $password = input('post.password');
            $logintime = time();
            $userInfo = $this->getByUsername($username);
            if (!$userInfo) {
                return '用户名错误';
            }
            if (md5($password) != $userInfo['password']) {
                return '密码错误';
            }
            Users::update(['id' => $userInfo->id, 'logintime' => $logintime]);
            session::set('userid', $userInfo['id']);
            session::set('username', $userInfo['username']);
            session::set('logintime', $userInfo['logintime']);
            return 'success';
        }
    }

    public function logout()
    {

        Session::delete('userid');
        Session::delete('username');
        Session::delete('logintime');

        return 'success';
    }

}