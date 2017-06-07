<?php
/* Smarty version 3.1.30, created on 2017-01-13 09:53:35
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\list-me.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5878a39f2fb941_61157621',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a74eaffbcf60e90c191c8be370dfe1ed49466a3a' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\list-me.html',
      1 => 1484301213,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/index/header.html' => 1,
    'file:tpl/index/footer.html' => 1,
  ),
),false)) {
function content_5878a39f2fb941_61157621 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpl/index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<article class="aboutMe">
    <h1>关于我</h1>
    <div class="about">
        <div class="about_in">
            <div class="left">
                <div class="photo">
                    <img src="<?php echo FIMG_PATH;?>
self.jpg" alt="" width="240">
                </div>
            </div>
            <div class="right">
                <div class="info">
                    <p>姓名&nbsp;:&nbsp;李壮壮</p>
                </div>
                <div class="info">
                    <p>年龄&nbsp;:&nbsp;23岁</p>
                </div>
                <div class="info">
                    <p>学历&nbsp;:&nbsp;本科</p>
                </div>
                <div class="info">
                    <p>职业&nbsp;:&nbsp;前端工程师</p>
                </div>
                <div class="info">
                    <p>籍贯&nbsp;:&nbsp;山西省临汾市翼城县</p>
                </div>
                <div class="info">
                    <p>现居地&nbsp;:&nbsp;山西省太原</p>
                </div>
                <div class="info">
                    <p>兴趣爱好&nbsp;:&nbsp;看电影、听音乐、打篮球</p>
                </div>
                <div class="info">
                    <p>座右铭&nbsp;:&nbsp;No press,no progress</p>
                </div>
            </div>
        </div>
    </div>
</article>
<?php $_smarty_tpl->_subTemplateRender("file:tpl/index/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
