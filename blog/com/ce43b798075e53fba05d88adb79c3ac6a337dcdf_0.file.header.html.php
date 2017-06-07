<?php
/* Smarty version 3.1.30, created on 2017-06-05 02:37:04
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934c3d0d54277_59959412',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ce43b798075e53fba05d88adb79c3ac6a337dcdf' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\header.html',
      1 => 1489506985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934c3d0d54277_59959412 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>北北个人博客</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="<?php echo FCSS_PATH;?>
bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo FCSS_PATH;?>
base.css" rel="stylesheet">
    <link href="<?php echo FCSS_PATH;?>
index.css" rel="stylesheet">
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo FJS_PATH;?>
jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo FJS_PATH;?>
sliders.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo FJS_PATH;?>
nav.js"><?php echo '</script'; ?>
>
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="<?php echo FJS_PATH;?>
modernizr.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>
<body>
<header>
    <ul class="loginbox">
       <li>
            <a href="index.php?a=login">登录</a>
            <a href="index.php?a=reg">注册</a>
       </li>
        <li>
            <a href="#"><?php echo $_smarty_tpl->tpl_vars['auser']->value;?>
</a>
            <a href="index.php?a=logout">登出</a>
        </li>
    </ul>
    <div class="logo f_l"> <a href="index.php"><img src="<?php echo FIMG_PATH;?>
/logo.png"></a> </div>
    <nav id="topnav" class="f_r">
        <ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menu']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <li><a title="index.php?a=alist&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value["cname"];?>
</a></li>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </ul>

    </nav>
</header><?php }
}
