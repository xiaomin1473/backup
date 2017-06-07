<?php
/* Smarty version 3.1.30, created on 2017-01-13 09:27:46
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58789d92396b01_05556271',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac0d967717aa5b396a38d41ed4536704f1e99ec9' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\login.html',
      1 => 1484292565,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58789d92396b01_05556271 (Smarty_Internal_Template $_smarty_tpl) {
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
login.js"><?php echo '</script'; ?>
>
    <title>Document</title>
</head>
<body>
<form class="login-box" method="post" action="index.php?a=reLogin">
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
        <input type="submit" name="login" class="login" value="登录" disabled="disabled">
        <a href="index.php?a=reg">注册</a>
    </div>
</form>
</body>
</html><?php }
}
