<?php
namespace app\api\controller;

use think\Controller;
use think\Db;

class Test extends Controller
{
    public function index($username='')
    {
        // 该功能是模拟一个未删除的用来调试用户信息的测试接口

        if($username==''){
            return json(['缺失参数'=>'username']);
        }else{
            $sql='select user_group from cms_user where username= \'' . $username . '\' limit 0,1';
            // SQL注入
            echo json_encode(Db::query($sql));
        }



        // $user           = UserModel::get(['username'=>$username]);
        // if ($user['username']==$username and $user['password']==md5($password)){
        //     return $this->success('登录成功，正在为您跳转至用户页面','/user/'.$user['username']);
        // } else {
        //     return $this->error('登录失败，用户名或密码错误');
        // }
    }
}
