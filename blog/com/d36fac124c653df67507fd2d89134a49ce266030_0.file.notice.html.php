<?php
/* Smarty version 3.1.30, created on 2017-01-13 09:28:19
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\notice.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58789db33e42b1_90444309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd36fac124c653df67507fd2d89134a49ce266030' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\notice.html',
      1 => 1484287522,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58789db33e42b1_90444309 (Smarty_Internal_Template $_smarty_tpl) {
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
 src="<?php echo FJS_PATH;?>
notice.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="noticeBox">
    <div class="noticeTitle">信息提示</div>
    <div class="noticeCon">
        <?php echo $_smarty_tpl->tpl_vars['noticeTitle']->value;?>
<br>
        <span>3</span>秒后返回<?php echo $_smarty_tpl->tpl_vars['noticePage']->value;?>
<br>
        没有跳转请点击<a style="color: #ff6c00;" href="<?php echo $_smarty_tpl->tpl_vars['noticeUrl']->value;?>
">这里</a>
    </div>
</div>
</body>
</html><?php }
}
