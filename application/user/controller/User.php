<?php
namespace app\user\controller;

use think\Controller;
use app\api\model\User as UserModel;

class User extends Controller
{
    public function index($username='')
    {
        if ($username==''){
            $this->error("您还未登录，正在跳转到登录页面","/user/login");
        }else{
            $user = UserModel::get(['username'=>$username]);
            // $data=Db::name('user')->where('username',$username)->find();

            if ($user['user_group']==0){
                $user['user_group']="管理员";
                echo '您是管理员，可以使用网站功能~';
                echo '<br/>';
                echo '<br/>';


                echo '<form action="/api/write" method="post">';
                echo '<input type="text" name="title" class=""textinput" placeholder="标题" />';
                echo '<br/>';
                echo '<textarea name=\'write\' rows="3" cos="20"></textarea>';
                echo '<input type="hidden" name="user" value="' . $user['username'] . '">';
                echo '<br/>';
                echo '<input type="submit" value="发布到首页" />';
                echo '</form>';
                echo '<hr>';
                // 发布文章功能
                
                echo '<br/>';
                echo '<a href=\'/api/upload\'>跳转到修改首页图片的页面</a>';
                echo '<br/>';
                echo '<hr>';
                // 修改首页图片功能（任意文件上传）

            }elseif($user['user_group']==1){
                $user['user_group']="普通用户";
                echo '您没有对网站的操作权限~';
                echo '<br/>';
                echo '<hr>';
            }else{
                $user['user_group']="来自nokali的消息：看来你成功越权了，但是你似乎越到错误的用户组了哦= =";
                // 这是一条彩蛋，这里越权应该越到0，但是说不定有人会改成2或者3之类的hhhh
            }
            $this->assign('result',$user);
            return $this->fetch();
        }
    }
    public function login()
    {
        return $this->fetch();
    }
    public function register()
    {
        return $this->fetch();
    }
}
