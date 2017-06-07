<?php
namespace app\index\controller;
use think\Controller;
use app\common\model\User;      // 引入教师

// Index既是类名，也是文件名，说明这个文件的名字为Index.php。
class IndexController extends Controller
{
    public function __construct()
    {
        // 调用父类构造函数(必须)
        parent::__construct();

        // 验证用户是否登陆
        if (!User::isLogin()) {
            return $this->error('please login first', url('Login/index'));
        }
    }

    public function index()
    {
        //取回打包后的数据
        $htmls = $this -> fetch();

        return $htmls;
    }
}

