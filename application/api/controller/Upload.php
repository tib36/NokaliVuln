<?php
namespace app\api\controller;

use think\Request;

class Upload extends \think\Controller
{

    // 文件上传表单
    public function index()
    {
        return $this->fetch();
    }

    // 文件上传提交
    public function up(Request $request)
    {
        // 获取表单上传文件
        $file = $request->file('file');
        if (empty($file)) {
            $this->error('请选择上传文件');
        }
        $info = $file->move('static','index');
        if ($info) {
            $this->success('文件上传成功：' . $info->getRealPath());
        } else {
            // 上传失败获取错误信息
            $this->error($file->getError());
        }

    }

}
