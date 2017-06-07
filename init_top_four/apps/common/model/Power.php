<?php
namespace app\common\model;
use think\Model;
/**
 * 权限
 */
class Power extends Model
{
    public function index()
    {
        //测试
        // return 'hello user!';

        //获取教师表中的所有数据
        $Power = Db::name('power') -> select();
    }
}