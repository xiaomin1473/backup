<?php
namespace app\index\controller;
use app\common\model\Power;        // 权限
use think\Request;

class PowerController extends IndexController
{
    public function index()
    {
        // 实例化Power
        $Power= new Power;


        $Powers = Power::paginate();

        //向V层传数据
        $this->assign('Powers', $Powers);

        //取回打包后的数据
        $htmls = $this -> fetch();

        return $htmls;
    }

    public function insert()
    {   
        //提示信息
        $message = ' ';

        try {
            // 接收传入数据
            $postData = Request::instance() ->post();

            // 实例化User空对象
            $Power = new Power();

            // 为对象赋值
            $Power->power_name= $postData['power_name'];
            $Power->create_time = $postData['create_time'];
            $Power->update_time = $postData['create_time'];

            $result = $Power->validate(true)->save();

            // 反馈结果
            if (false == $result) {
                // 验证未通过，发生错误
                $message = '新增失败:' . $Power->getError();
            }
            else {
                // 提示操作成功，并跳转至教师管理列表
                return $this->success('用户' . $Power->power_name . '新增成功。', url('index'));
            }

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
            if (is_null($Power)) {
                throw new \Exception('不存在id为' . $id . '的权限，删除失败', 1);
            }

            // 删除对象
            if (!$Power->delete()) {
                return $this->error('删除失败:' . $Power->getError());
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
        if (is_null($Power = Power::get($id))) {
            // 由于在$this->error抛出了异常，所以也可以省略return(不推荐)
            $this->error('系统未找到ID为' . $id . '的记录');
            return;
        } 

        // 将数据传给V层
        $this->assign('Power', $Power);

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
            $id = Request::instance()->post('p_id/d');
            $message = '更新成功';

            // 获取当前对象
            $Power = Power::get($id);

            if (!is_null($Power)) {
                // 写入要更新的数
                $Power->power_name = Request::instance()->post('power_name');

                // 更新
                if (false === $Power->validate(true)->save())
                {
                   return $this->error('更新失败' . $Power->getError());
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