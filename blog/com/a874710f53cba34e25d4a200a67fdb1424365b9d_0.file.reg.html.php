<?php
/* Smarty version 3.1.30, created on 2017-06-05 02:38:54
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\reg.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934c43e1a69e3_21349302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a874710f53cba34e25d4a200a67fdb1424365b9d' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\reg.html',
      1 => 1484287522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934c43e1a69e3_21349302 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="<?php echo FJS_PATH;?>
reg.js"><?php echo '</script'; ?>
>
    <title>Document</title>
</head>
<body>
<form class="login-box" method="post" action="index.php?a=checkReg">
    <div class="user">
        <span>用户名</span>
        <input type="text" name="auser" class="user">
    </div>
    <div class="error"></div>
    <div class="user">
        <span>密&nbsp;码</span>
        <input type="password" name="apass" class="pass">
    </div>
    <div class="error"></div>
    <div class="btns">
        <input type="submit" name="login" class="login" value="注册" disabled="disabled">
        <a href="index.php?a=login">登录</a>
    </div>
</form>
</body>
</html><?php }
}
