<?php
namespace app\index\controller; // 该文件的位于application\index\controller文件夹
use app\common\model\User;      //用户模型
use think\Request;

/**
 * 教师管理，继承think\Controller后，就可以利用V层对数据进行打包了。
 */

/**
 * 用户管理
 */
class UserController extends IndexController
{
    public function index()
    {
            // 获取查询信息
            $name = Request::instance()->get('name');

            // 每页显示5条数据
            $pageSize = 6; 

            // 实例化Teacher
            $User = new User;

            // 定制查询信息
            if (!empty($name)) {
                $User->where('user_account', 'like', '%' . $name . '%');
            }

            // 调用分页
            $Users = $User->paginate($pageSize, false, [
                'query'=>[
                    'name' => $name,
                    ]
            ]);
            //    //获取第0个元素
            //    //    $User = $Users[0];

            //    //调用上述对象的getData()方法
            //    var_dump($User -> getdata());

            //    //输出数据库中字段user_name
            //    var_dump($User -> getdata('user_name'));
            //    echo $User -> getdata('user_name');
            //    return $User -> getdata('user_name');
            
            //向V层传数据
            $this -> assign('Users', $Users);

            //取回打包后的数据
            $htmls = $this -> fetch();

            //将数据返回给用户
            return $htmls;

    }


    /*
    **  插入数据
    **  @return html
    **
    */
    public function insert()
    {   
        //提示信息
        $message = ' ';

        try {
            // 接收传入数据
            $postData = Request::instance() ->post();

            // 实例化User空对象
            $User = new User();

            // 为对象赋值
            $User->user_name = $postData['user_account'];
            $User->user_account = $postData['user_account'];
            $User->user_pwd = User::encryptPassword( $postData['user_pwd']);
            $User->group_id = $postData['group_id'];
            $User->user_sex = $postData['user_sex'];
            $User->user_phone = $postData['user_phone'];
            $User->user_birthday = $postData['user_birthday'];
            $User->user_descript = $postData['user_descript'];
            $User->user_register_time = $postData['create_time'];
            $User->user_last_login = $postData['create_time'];
            // 新增对象至数据表
            // $User->save();
            $result = $User->validate(true)->save();

            // 反馈结果
            if (false == $result) {
                // 验证未通过，发生错误
                $message = '新增失败:' . $User->getError();
            }
            else {
                // 提示操作成功，并跳转至教师管理列表
                return $this->success('用户' . $User->user_account . '新增成功。', url('index'));
            }
            // 新建测试数据
            // $InUser = array(); // 这种写法也可以 $teacher = [];
            // $InUser['group_id'] = 1;
            // $InUser['user_name'] = 'xiaoqiang';
            // $InUser['user_account'] = 'xiaoqiang';
            // $InUser['user_pwd'] = 'qwe';
            // $InUser['user_doc_id'] = 1;
            // $InUser['user_sex'] = 'man';
            // $InUser['user_phone'] = '13515150505';
            // $InUser['user_birthday'] = 329;
            // $InUser['user_descript'] = '有朋自远方来';
            // $InUser['user_vatar_url'] = 'NULL';
            // $InUser['user_rank_id'] = 1;
            // $InUser['user_register_time'] = 0;
            // $InUser['user_last_login'] = 0;
            // $InUser['user_freeze'] = 0;
            // $InUser['user_power'] = '0';
            // $InUser['user_mark'] = 0;

            // // 引用teacher数据表对应的模型
            // $User = new User();

            // // 向teacher表中插入数据并判断是否插入成功
            // $state = $User->data($InUser)->save();

        // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

        // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        } 

        return $this->error($message);
    }

    public function add()
    {
        try {
            $htmls = $this->fetch();
            return $htmls;
        } catch (\Exception $e) {
            return '系统错误' . $e->getMessage();
        }
    }

    public function del()
    {
        try {
            // 实例化请求类
            $Request = Request::instance();

            //获取pathinfo传入的ID值.
            $id = Request::instance()->param('id/d'); // “/d”表示将数值转化为“整形”


            if ( 0 === $id) {
                throw new \Exception('未获取到ID信息', 1);
            }

            // 获取要删除的对象
            $Power = Power::get($id);

            // 要删除的对象不存在
            if (is_null($User)) {
                throw new \Exception('不存在id为' . $id . '的教师，删除失败', 1);
            }

            // 删除对象
            if (!$User->delete()) {
                return $this->error('删除失败:' . $User->getError());
            }

           // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
            return $this->success('删除成功', $Request->header('referer'));
        } 
        catch (\think\Exception\HttpResponseException $e) {
            throw $e;
        }

        // 获取到正常的异常时，输出异常
         catch (\Exception $e) {
            return $e->getMessage();
        } 

       // 进行跳转 
        return $this->success('删除成功', $Request->header('referer')); 
    }


    public function edit() 
    {
        try {
        // 获取传入ID
        $id = Request::instance()->param('id/d');

        // 判断是否成功接收
        if (is_null($id) || 0 === $id) {
            throw new \Exception('未获取到ID信息', 1);
        }

        // 在User表模型中获取当前记录
        if (is_null($User = User::get($id))) {
            // 由于在$this->error抛出了异常，所以也可以省略return(不推荐)
            $this->error('系统未找到ID为' . $id . '的记录');
            return;
        } 

        // 将数据传给V层
        $this->assign('User', $User);

        // 获取封装好的V层内容
        $htmls = $this->fetch();

        // 将封装好的V层内容返回给用户
        return $htmls;

        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

        // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        } 
    }

    public function update()
    {

        
        try {
            // 接收数据，获取要更新的关键字信息
            $id = Request::instance()->post('user_id/d');
            $message = '更新成功';

            // 获取当前对象
            $User = User::get($id);

            if (!is_null($User)) {
                // 写入要更新的数
                //$User->user_name = Request::instance()->post('user_account');
                $User->user_account = Request::instance()->post('user_account');
                $User->user_pwd = Request::instance()->post('user_pwd');
                $User->group_id = Request::instance()->post('group_id');
                $User->user_sex = Request::instance()->post('user_sex');
                $User->user_phone = Request::instance()->post('user_phone');
                $User->user_birthday = Request::instance()->post('user_birthday');
                $User->user_descript = Request::instance()->post('user_descript');
                $User->user_last_login =Request::instance()->post('create_time');

                // 更新
                if (false === $User->validate(true)->save())
                {
                   return $this->error('更新失败' . $User->getError());
                }
            } else {
                throw new \Exception("所更新的记录不存在", 1);   // 调用PHP内置类时，需要在前面加上 \ 
            }

        // 获取到ThinkPHP的内置异常时，直接向上抛出，交给ThinkPHP处理
        } catch (\think\Exception\HttpResponseException $e) {
            throw $e;

        // 获取到正常的异常时，输出异常
        } catch (\Exception $e) {
            return $e->getMessage();
        } 

        // 成功跳转至index触发器
        return $this->success('操作成功', url('index'));
    }


}