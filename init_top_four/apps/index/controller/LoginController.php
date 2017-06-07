<?php
namespace app\index\controller;
use think\Controller;
use think\Request;              // 请求
use app\common\model\User;   // 教师模型

class LoginController extends Controller
{
    public function index()
    {
        // 显示登录表单
        return $this->fetch();
    }

    // 处理用户提交的登录数据
    public function login()
    {   
        // 接收post信息
        $postData = Request::instance() ->post();

        // 验证用户名是否存在
        $map = array('user_account'  => $postData['user_account']);
        $User = User::get($map);

        // 直接调用M层方法，进行登录。
        if (User::login($postData['user_account'], $postData['user_pwd'])) {
            return $this->success('login success', url('User/index'));
        } else {
            return $this->error('用户名 或 密码 错误！', url('index'));
        }
    }

    // 注销
    public function logOut()
    {
        if (User::logOut()) {
            return $this->success('logout success', url('index'));
        } else {
            return $this->error('logout error', url('index'));
        }
    }

    //测试密码
    // public function test()
    // {
    //     echo User::encryptPassword('123');
    // }
}