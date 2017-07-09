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

    public function userAdd(Request $request){
        if (Request::instance()->isPost()) {
            $username = input('post.username');
            $password = input('post.password');
            $email = input('post.email');
            $mobile = input('post.mobile');
            $captcha = input('post.captcha');
            $rules = [
                'username' => 'require|max:25',
                'password' => 'require|max:33',
                'email' => 'email',
            ];
            $msg = [
                'username.require' => '用户名不能为空',
                'username.max' => '用户名超过最大长度',
                'password.require' => '密码不能为空',
                'password.max' => '密码超过最大长度',
                'email' => '邮箱格式错误',
            ];
            $result = $this->validate($request->param(), $rules, $msg);
            /*  if (true !== $result) {
                  return $result;
              }
              if ($mobile) {
                  if (!preg_match("/^1[34578]\d{9}$/", $mobile)) {
                      return jsonError('手机号码输入有误');
                  }
              }

              if (User::getByUsername($username)) {
                  return jsonError('用户名已存在');
              }
              if($email){
                  if (Users::getByEmail($email)) {
                      return jsonError('邮箱已存在');
                  }
              }
              if($mobile){
                  if (Users::getByMobile($mobile)) {
                      return jsonError('手机已存在');
                  }
              }
              if($userInfo = Loader::model('Users')->regUser($username,$password,$this->terminal,$email,$mobile))
              {*/
            $arr = array(
                'name'=> $username,
            );
                  return json($arr);
            /*
                        }else{
                            return ["success"=>"成功"];
                            return jsonError('注册失败');
                        }*/
        }
    }

    public function userCreate(Request $request) {
        if (Request::instance()->isPost()) {
            $username = input('post.username');
            $password = input('post.password');
            $email = input('post.email');
            $mobile = input('post.mobile');
            $rules = [
                'terminal'  => 'require',
                'username'  => 'require|max:33',
                'password'  => 'require|max:33',
                'email' => 'email',
            ];
            $msg = [
                'username.require' => '用户名不能为空',
                'username.max'     => '用户名超过最大长度',
                'password.require' => '密码不能为空',
                'password.max'     => '密码超过最大长度',
                'email'        => '邮箱格式错误',
            ];
            $result = $this->validate($request->param(), $rules, $msg);
            if (true !== $result) {
                return $result;
            }
            if ($mobile) {
                if (!preg_match("/^1[34578]\d{9}$/", $mobile)) {
                    return jsonError('手机号码输入有误');
                }
            }
            if (Users::getByUsername($username)) {
                return jsonError('用户名已存在');
            }
            if($email){
                if (Users::getByEmail($email)) {
                    return jsonError('邮箱已存在');
                }
            }
            if($mobile){
                if (Users::getByMobile($mobile)) {
                    return jsonError('手机已存在');
                }
            }
            if($userInfo = Loader::model('Users')->regUser($username,$password,$this->terminal,$email,$mobile)){
                return jsonSuccess('创建成功',$username,'/');
            }else{
                return jsonError('创建失败');
            }
        }
    }


    /*
     * 渲染首页
     */
    public function index()
    {
        $seo=seo();
        $this->assign([
            'keywords'=> $seo['keywords'],
            'description'=>$seo['description'],
            'title'=>$seo['title']
        ]);

        return view('./user');

    }

}