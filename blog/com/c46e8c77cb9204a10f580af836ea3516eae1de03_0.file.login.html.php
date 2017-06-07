<?php
/* Smarty version 3.1.30, created on 2017-06-05 02:39:49
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934c4751ca724_14229427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c46e8c77cb9204a10f580af836ea3516eae1de03' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\admin\\login.html',
      1 => 1483779731,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934c4751ca724_14229427 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
main.css">
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
login.js"><?php echo '</script'; ?>
>
    <title>Document</title>
</head>
<body>
<form class="login-box" method="post" action="index.php?m=admin&&a=reLogin">
    <div class="user">
        <span>用户名</span>
        <input type="text" name="user" class="user">
    </div>
    <div class="error"></div>
    <div class="user">
        <span>密&nbsp;码</span>
        <input type="password" name="pass" class="pass">
    </div>
    <div class="error"></div>
    <div class="btns">
        <input type="submit" name="login" class="login" value="登录" disabled="disabled">
        <a href="index.php?m=admin&&a=reg">注册</a>
    </div>
</form>
</body>
</html><?php }
}
