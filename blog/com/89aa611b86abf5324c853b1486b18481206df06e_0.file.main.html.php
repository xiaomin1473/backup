<?php
/* Smarty version 3.1.30, created on 2017-06-05 02:40:10
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\admin\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934c48a577ae2_07410566',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89aa611b86abf5324c853b1486b18481206df06e' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\admin\\main.html',
      1 => 1483860020,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934c48a577ae2_07410566 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
main.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
main.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="top">
    <h1>欢迎<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
登录后台管理系统</h1>
    <a href="index.php?m=admin&&a=logout">退出登录</a>
</div>
<div class="bottom">
    <div class="left">
        <ul class="yiji">
            <li>
                <h3><a href="javascript:;">用户管理</a></h3>
                <ul class="erji">
                    <li>
                        <a href="index.php?m=admin&&c=check&&a=checkUser" target="iframe">查看用户</a>
                    </li>
                    <li>
                        <a href="" target="iframe">添加用户</a>
                    </li>
                </ul>
            </li>
            <li>
                <h3><a href="javascript:;">内容管理</a></h3>
                <ul class="erji">
                    <li>
                        <a href="index.php?m=admin&&c=check&&a=checkCon" target="iframe">查看内容</a>
                    </li>
                    <li>
                        <a href="index.php?m=admin&&c=add&&a=addCon" target="iframe">添加内容</a>
                    </li>
                </ul>
            </li>
            <li>
                <h3><a href="javascript:;">分类管理</a></h3>
                <ul class="erji">
                    <li>
                        <a href="index.php?m=admin&&c=check&&a=checkCat" target="iframe">查看分类</a>
                    </li>
                    <li>
                        <a href="index.php?m=admin&&c=check&&a=addCat" target="iframe">添加分类</a>
                    </li>
                </ul>
            </li>
            <li>
                <h3><a href="javascript:;">推荐位管理</a></h3>
                <ul class="erji">
                    <li>
                        <a href="index.php?m=admin&&c=check&&a=checkPos" target="iframe">查看推荐位</a>
                    </li>
                    <li>
                        <a href="index.php?m=admin&&c=add&&a=addPos" target="iframe">添加推荐位</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="right">
        <iframe src="" name="iframe" frameborder="0"></iframe>
    </div>
</div>
</body>
</html><?php }
}
