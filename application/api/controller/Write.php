<?php
namespace app\api\controller;

use think\Controller;
use app\api\model\Write as WriteModel;

class Write extends Controller
{
    public function index($title='',$write='',$user='')
    {
        $target           = new WriteModel;
        $target->user = $user;
        $target->title= $title;
        $target->content = $write;
        if ($target->save()) {
            $this->success($target->user . "，你的文章发布成功！");
        } else {
            return $target->getError();
        }
    }
}
