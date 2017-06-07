<?php
/* Smarty version 3.1.30, created on 2017-01-13 09:26:29
  from "C:\wamp\www\PhpstormProjects\php\blog\tpl\index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58789d45ae9ff8_54895023',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9500905f33614a50ebfcc716f476e69d479f6f29' => 
    array (
      0 => 'C:\\wamp\\www\\PhpstormProjects\\php\\blog\\tpl\\index\\index.html',
      1 => 1484298308,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:tpl/index/header.html' => 1,
    'file:tpl/index/footer.html' => 1,
  ),
),false)) {
function content_58789d45ae9ff8_54895023 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:tpl/index/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<article>
    <div class="l_box f_l">
        <div class="banner">
            <div id="slide-holder">
                <div id="slide-runner"> <a href="/" target="_blank"><img id="slide-img-1" src="<?php echo FIMG_PATH;?>
a1.jpg"  alt="" /></a> <a href="/" target="_blank"><img id="slide-img-2" src="<?php echo FIMG_PATH;?>
a2.jpg"  alt="" /></a> <a href="/" target="_blank"><img id="slide-img-3" src="<?php echo FIMG_PATH;?>
a3.jpg"  alt="" /></a> <a href="/" target="_blank"><img id="slide-img-4" src="<?php echo FIMG_PATH;?>
a4.jpg"  alt="" /></a>
                    <div id="slide-controls">
                        <p id="slide-client" class="text"><strong></strong><span></span></p>
                        <p id="slide-desc" class="text"></p>
                        <p id="slide-nav"></p>
                    </div>
                </div>
            </div>
            <?php echo '<script'; ?>
>
                if(!window.slider) {
                    var slider={};
                }

                slider.data= [
                    {
                        "id":"slide-img-1", // 与slide-runner中的img标签id对应
                        "client":"标题1",
                        "desc":"这里修改描述 这里修改描述 这里修改描述" //这里修改描述
                    },
                    {
                        "id":"slide-img-2",
                        "client":"标题2",
                        "desc":"add your description here"
                    },
                    {
                        "id":"slide-img-3",
                        "client":"标题3",
                        "desc":"add your description here"
                    },
                    {
                        "id":"slide-img-4",
                        "client":"标题4",
                        "desc":"add your description here"
                    }
                ];

            <?php echo '</script'; ?>
>
        </div>
        <!-- banner代码 结束 -->
        <div class="topnews">
            <h2><b>文章</b>推荐</h2>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
            <div class="blogs">
                <figure style="min-height: 120px;"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['imgurl'];?>
"></figure>
                <ul>
                    <h3><a href="index.php?a=show&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['sid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></h3>
                    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['description'];?>
</p>
                    <p class="autor">
                        <span class="lm f_l"><a href="/">个人博客</a>
                        </span>
                        <span class="dtime f_l">2014-02-19</span>
                        <span class="viewnum f_r">浏览（<a href="/">459</a>）</span>
                        <span class="pingl f_r">评论（<a href="/">30</a>）</span></p>
                </ul>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        </div>
    </div>
    <div class="r_box f_r">
        <div class="tit01">
            <h3>关注我</h3>
            <div class="gzwm">
                <ul>
                    <li><a class="xlwb" href="http://weibo.com/u/5314685240?refer_flag=1001030101_&is_all=1" target="_blank">新浪微博</a></li>
                    <li><a class="txwb" href="http://t.qq.com/zylzz521" target="_blank">腾讯微博</a></li>
                    <li><a class="git" href="https://github.com/beibeilove" target="_blank">GITHUB</a></li>
                    <li><a class="wx" href="index.php?a=email">邮箱</a></li>
                </ul>
            </div>
        </div>
        <!--tit01 end-->
        <div class="ad300x100">
            <img src="<?php echo FIMG_PATH;?>
ad300x100.jpg">
        </div>
        <div class="moreSelect" id="lp_right_select">
            <div class="ms-top">
                <ul class="hd" id="tab">
                    <li><a href="/">点击排行</a></li>
                    <li><a href="/">最新文章</a></li>
                    <li><a href="/">站长推荐</a></li>
                </ul>
            </div>
            <div class="ms-main" id="ms-main">
                <div style="display: block;" class="bd bd-news" >
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <li><a href="index.php?a=show&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</a></li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>

                </div>
                <div  class="bd bd-news">
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <li><a href="index.php?a=show&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</a></li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                </div>
                <div class="bd bd-news">
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                        <li><a href="index.php?a=show&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</a></li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                </div>
            </div>
            <!--ms-main end -->
        </div>
        <!--切换卡 moreSelect end -->

        <div class="cloud">
            <h3>标签云</h3>
            <ul>
                <li><a href="/">个人博客</a></li>
                <li><a href="/">web开发</a></li>
                <li><a href="/">前端设计</a></li>
                <li><a href="/">Html</a></li>
                <li><a href="/">CSS3</a></li>
                <li><a href="/">Html5+css3</a></li>
            </ul>
        </div>
        <div class="tuwen">
            <h3>图文推荐</h3>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <li><a href="index.php?a=show&&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cid'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['imgurl'];?>
"><b><?php echo $_smarty_tpl->tpl_vars['v']->value["title"];?>
</b></a>
                    <p><span class="tulanmu"><a href="#">手机配件</a></span><span class="tutime"><?php echo $_smarty_tpl->tpl_vars['v']->value["stime"];?>
</span></p>
                </li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
        <div class="ad"> <img src="<?php echo FIMG_PATH;?>
03.jpg"> </div>
        <div class="links">
            <h3><span>[<a href="index.php?a=addLink">申请友情链接</a>]</span>友情链接</h3>
            <ul>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['link']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['lurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value["lname"];?>
</a></li>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </ul>
        </div>
    </div>
    <!--r_box end -->
</article>
<?php $_smarty_tpl->_subTemplateRender("file:tpl/index/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
