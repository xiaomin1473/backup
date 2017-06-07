<?php
// 简单的原理重复记： namespace说明了该文件位于application\common\model 文件夹中
namespace app\common\model;
use think\Model;    //  导入think\Model类
/**
 * Teacher 教师表
 */

// 我的类名叫做User，对应的文件名为User.php，该类继承了Model类，Model我们在文件头中，提前使用use进行了导入。
class User extends Model
{
    public function index()
    {
        //测试
        // return 'hello user!';

        //获取教师表中的所有数据
        $User = Db::name('user') -> select();
        
    }

    /**
     * 用户登录
     * @param  string $username 用户名
     * @param  string $password 密码
     * @return bool   成功返回true，失败返回false。
     */
    static public function login($user_account, $user_pwd)
    {
        // 验证用户是否存在
        $map = array('user_account' => $user_account);
        $User = self::get($map);

        if (!is_null($User)) {
            // 验证密码是否正确
            if ($User->checkPassword($user_pwd)) {
                // 登录
                session('userId', $User->getData('user_id'));
                return true;
            }
        }
        return false;
    }

    /**
     * 验证密码是否正确
     * @param  string $password 密码
     * @return bool           
     */
    public function checkPassword($user_pwd)
    {
        if ($this->getData('user_pwd')=== $this::encryptPassword($user_pwd))
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 密码加密算法
     * @param    string                   $password 加密前密码
     * @return   string                             加密后密码
     * @author panjie@yunzhiclub.com http://www.mengyunzhi.com
     * @DateTime 2016-10-21T09:26:18+0800
     */
    static public function encryptPassword($user_pwd)
    {   
        if (!is_string($user_pwd)) {
            throw new \RuntimeException("传入变量类型非字符串，错误码2", 2);
        }
        // 实际的过程中，我还还可以借助其它字符串算法，来实现不同的加密。
        return sha1(md5($user_pwd) . 'mingo');
    }

    /**
     * 判断用户是否已登录
     * @return boolean 已登录true
     * @author  panjie <panjie@yunzhiclub.com>
     */
    static public function isLogin()
    {
       $UserId = session('userId');

        // isset()和is_null()是一对反义词
        if (isset($UserId)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 注销
     * @return bool  成功true，失败false。
     * @author panjie
     */
    static public function logOut()
    {
        // 销毁session中数据
        session('userId', null);
        return true;
    }
}
