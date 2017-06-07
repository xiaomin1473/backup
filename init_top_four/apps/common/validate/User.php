<?php
namespace app\common\validate;
use think\Validate;     // 内置验证类

class User extends Validate
{
    protected $rule = [
        // 'email'    => 'require|email',
        // 'user_birthday' => 'dateFormat:Y-m-d',

    ];
}