<?php
namespace app\api\controller;

use think\Controller;
use app\api\model\User as UserModel;

class Register extends Controller
{
    public function index($username='',$password='',$group='')
    {
        $user           = new UserModel;
        $user->username = $username;
        $user->password = md5($password);
        $user->user_group = $group;
        if ($user->save()) {
            $this->success($user->username . "注册成功！",'/user/login');
            // return '用户[ ' . $user->username . ' ]注册成功';
        } else {
            return $user->getError();
        }
    }
}
