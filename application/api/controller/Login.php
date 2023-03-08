<?php
namespace app\api\controller;

use think\Controller;
use app\api\model\User as UserModel;

class Login extends Controller
{
    public function index($username='',$password='')
    {
        $user           = UserModel::get(['username'=>$username]);
        if ($user['username']==$username and $user['password']==md5($password)){
            return $this->success('登录成功，正在为您跳转至用户页面~','/user/'.$user['username']);
        } else {
            if ($user['username']==$username and $user['password']!=md5($password)){
                return $this->error('密码错误= =');
            }
            return $this->error('登录失败，可能是无此用户');
        }
    }
}
