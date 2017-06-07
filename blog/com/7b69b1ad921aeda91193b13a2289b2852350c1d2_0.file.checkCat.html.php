<?php
/* Smarty version 3.1.30, created on 2017-06-05 02:41:04
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\admin\checkCat.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934c4c0c4a431_34163882',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b69b1ad921aeda91193b13a2289b2852350c1d2' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\admin\\checkCat.html',
      1 => 1484274378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934c4c0c4a431_34163882 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="<?php echo JS_PATH;?>
jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        $(function(){
            $(".del").click(function(){
                var cid=$(this).parent().siblings().eq(0).html();
                $.ajax({
                    url:"index.php?m=admin&&c=check&&a=delCat",
                    data:"cid="+cid,
                    type:"post",
                    success:function(e){
                        if(e=="ok"){
                            alert("删除成功");
                            document.location.reload();
                        }else if(e=="on"){
                            alert('请先删除该分类的子分类');
                        }
                    }
                })
            })
        })
    <?php echo '</script'; ?>
>
    <style>
        table tr th,table tr td{
            text-align: center;
        }
    </style>
</head>
<body>
<table class="table table-border table-striped table-hover table-condensed">
    <tr>
        <th>cid</th>
        <th>cname</th>
        <th>cimg</th>
        <th>pid</th>
        <th>操作</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["cid"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["cname"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["cimg"];?>
</td>
        <td contenteditable="true"><?php echo $_smarty_tpl->tpl_vars['v']->value["pid"];?>
</td>
        <td><a href="index.php?m=admin&&c=check&&a=editCat&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
" class="btn btn-success">修改</a><a href="" class="del btn btn-danger">删除</a></td>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
</body>

</html><?php }
}
