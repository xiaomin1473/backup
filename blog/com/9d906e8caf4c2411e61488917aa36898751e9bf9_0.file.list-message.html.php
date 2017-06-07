<?php
/* Smarty version 3.1.30, created on 2017-01-14 01:43:22
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\list-message.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5879823a9b7649_33144837',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9d906e8caf4c2411e61488917aa36898751e9bf9' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\list-message.html',
      1 => 1484301825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/index/header.html' => 1,
    'file:tpl/index/footer.html' => 1,
  ),
),false)) {
function content_5879823a9b7649_33144837 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpl/index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<article>
    <div class="showMessage">
        <h1>留言板</h1>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['message']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
        <ul>
            <li>
                <h2><?php echo $_smarty_tpl->tpl_vars['v']->value["luser"];?>
</h2>
            </li>
            <li>
                <p><?php echo $_smarty_tpl->tpl_vars['v']->value["liucon"];?>
</p>
            </li>
            <li style="overflow: hidden;display: inline-block;">
                <p class="autor"><span class="lm f_l"><a href="/">个人博客</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">浏览（<a href="/">459</a>）</span><span class="pingl f_r">评论（<a href="/">30</a>）</span></p>
            </li>
        </ul>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
    <div class="control-group" style="height:320px">
        <label class="control-label" for="liu" style="font-size: 16px;color: #e1c885;">发表您的留言</label>
        <div class="controls">
            <textarea name="" id="liu" cols="90" rows="10" style="font-size: 16px;text-indent:2em;color: #333;border-radius: 10px;box-shadow: 2px 2px 30px #ccc;" placeholder="请停下你的脚步，再次一游"></textarea>
        </div>
    </div>
    <br>
    <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
            <button type="button" class="btn btn-success" id="message">添加</button>
        </div>
    </div>
</article>
<?php $_smarty_tpl->_subTemplateRender("file:tpl/index/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
