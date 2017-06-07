<?php
/* Smarty version 3.1.30, created on 2017-06-05 02:46:35
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\admin\checkCon.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5934c60bc9f886_09677888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc5a4f88a16f181c8538f65e019b5384baf6a765' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\admin\\checkCon.html',
      1 => 1496630793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5934c60bc9f886_09677888 (Smarty_Internal_Template $_smarty_tpl) {
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
                var sid=$(this).parent().siblings().eq(0).html();
                $.ajax({
                    url:"index.php?m=admin&&c=check&&a=delCon",
                    data:"sid="+sid,
                    type:"post",
                    success:function(e){
                        if(e=="ok"){
                            alert("删除成功");
                            document.location.reload();
                        }
                    }
                })
            })
            $("tr>td").dblclick(function(){
                var index=$(this).index();
                var title=$("tr>th").eq(index).html();
                var html=$(this).html();
                if(index!=0&&index!=5){
                    $(this).attr("contenteditable","true").blur(function(){
                        if(html!=$(this).html()){
                            html=$(this).html();
                            var cid=$(this).siblings().eq(0).html();
                            $.ajax({
                                url:"index.php?m=admin&&c=check&&a=editCon&&cid="+cid,
                                data:title+"="+html,
                                type:"post",
                                success:function(e){
                                    console.log(e);
                                    if(e=="ok"){
                                        alert("数据已更新");
                                        location.reload();
                                    }
                                }
                            })
                        }
                    });
                }
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
        <th>sid</th>
        <th>title</th>
        <th>description</th>
        <th>con</th>
        <th>imgurl</th>
        <th>stime</th>
        <th>status</th>
        <th>auser</th>
        <th>url</th>
        <th>cid</th>
        <th>操作</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["sid"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["description"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["con"];?>
</td>
        <td><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['imgurl'];?>
" width="130px" alt=""></td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["stime"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["status"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["auser"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["url"];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['v']->value["cid"];?>
</td>
        <td><a href="" class="del btn btn-danger">删除</a></td>
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
