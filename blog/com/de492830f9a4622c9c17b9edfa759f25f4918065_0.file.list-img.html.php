<?php
/* Smarty version 3.1.30, created on 2017-01-13 09:26:24
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\list-img.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58789d4065db10_74853594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de492830f9a4622c9c17b9edfa759f25f4918065' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\list-img.html',
      1 => 1484273863,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/index/header.html' => 1,
    'file:tpl/index/footer.html' => 1,
  ),
),false)) {
function content_58789d4065db10_74853594 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpl/index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<article>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
    <ul>
        <li>
            <a href="">
                <img src="" alt="">
            </a>
            <a href="">
                <span></span>
            </a>
        </li>
    </ul>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</article>
<?php $_smarty_tpl->_subTemplateRender("file:tpl/index/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
