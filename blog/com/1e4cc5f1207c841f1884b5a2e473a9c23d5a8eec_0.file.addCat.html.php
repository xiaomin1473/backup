<?php
/* Smarty version 3.1.30, created on 2017-06-05 02:40:40
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\admin\addCat.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934c4a80ff0a3_53498550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e4cc5f1207c841f1884b5a2e473a9c23d5a8eec' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\admin\\addCat.html',
      1 => 1484276720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934c4a80ff0a3_53498550 (Smarty_Internal_Template $_smarty_tpl) {
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
bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>
mybootstrap.css">
</head>
<body>
<form class="form-horizontal" action="index.php?m=admin&&c=check&&a=addCat1" method="post">
    <div class="control-group">
        <label class="control-label" for="option">所属分类</label>
        <div class="controls">
            <select id="option" name="cid">
                <option value="0">顶级分类</option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['strees']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value["cname"];?>
</option>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </select>
        </div>
    </div>
    <br>
    <div class="control-group">
    <label class="control-label" for="cname">分类名称</label>
    <div class="controls">
        <input type="text" name="cname" id="cname" placeholder="分类名称" required>
    </div>
</div>
    <br>
    <div class="control-group">
        <label class="control-label" for="file">文件上传</label>
        <div class="controls">
            <input type="file" name="file" id="file">
        </div>
    </div>
    <br>
    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <button type="submit" class="btn btn-success">添加</button>
        </div>
    </div>
</form>
</body>
</html><?php }
}
