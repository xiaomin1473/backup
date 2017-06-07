<?php
/* Smarty version 3.1.30, created on 2017-01-13 09:26:25
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\list-title.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58789d41453670_17599260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ebadc81f051e596ea5d75c13e03d9c5f907eb2da' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\list-title.html',
      1 => 1484294365,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/index/header.html' => 1,
    'file:tpl/index/footer.html' => 1,
  ),
),false)) {
function content_58789d41453670_17599260 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpl/index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<article>
    <div class="topnews">
        <h2><b>文章</b>推荐</h2>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <div class="blogs">
            <figure><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['imgurl'];?>
"></figure>
            <ul>
                <h3><a href="index.php?a=show&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['sid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></h3>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value['description'];?>
</p>
                <p class="autor"><span class="lm f_l"><a href="/">个人博客</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">浏览（<a href="/">459</a>）</span><span class="pingl f_r">评论（<a href="/">30</a>）</span></p>
            </ul>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    </div>
</article>
<?php $_smarty_tpl->_subTemplateRender("file:tpl/index/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
