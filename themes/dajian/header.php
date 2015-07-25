<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-7-20
 * Time: 下午2:20
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>
    <title>
        <?php
        if (is_home()) {
            bloginfo('name');
        } elseif (is_category()) {
            single_cat_title();
        } elseif (is_single() || is_page()) {
            single_post_title();
        } elseif (is_search()) {
            echo "搜索结果";
            echo " - ";
            bloginfo('name');
        } elseif (is_404()) {
            echo '页面未找到!';
        } else {
            wp_title('', true);
        }
        ?>
    </title>
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/system.css" rel="stylesheet">
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery11.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
    <script type="text/JavaScript">
        <!--
        function MM_swapImgRestore() { //v3.0
            var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
        }

        function MM_preloadImages() { //v3.0
            var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
        }

        function MM_findObj(n, d) { //v4.01
            var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
            if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
            if(!x && d.getElementById) x=d.getElementById(n); return x;
        }

        function MM_swapImage() { //v3.0
            var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
        }
        //-->
    </script>
</head>
<body>
    <div class="box">
        <div class="top">
            <div class="top_links">
<!--
                <a class="a1" onclick="this.style.behavior='url(#default#homepage)';this.sethomepage(document.location.href);return false;" href="#">设为首页</a>
                |
                <a class="a1" onclick="var strHref=window.location.href;this.style.behavior='url(#default#homepage)';window.external.addFavorite(strHref,document.title)" href="#">加入收藏</a>
-->
            </div>
            <div class="logo">
                <a href="<?php echo home_url(); ?>">
                    <img align="left" alt="青岛瑞亚通达物流有限公司" src="<?php bloginfo('template_url'); ?>/images/logo_4.jpg">
                </a>
                <div class="clear"></div>
            </div>
            <div class="tel">
                <img src="<?php bloginfo('template_url'); ?>/images/logo_6.jpg" border="0">
            </div>
        </div>
        <div class="nav">
            <a onmouseover="MM_swapImage('Image3','','<?php bloginfo('template_url'); ?>/images/index2.jpg',1)" onmouseout="MM_swapImgRestore()" href="/">
                <img border="0" width="95" height="32" id="Image3" name="Image3" src="<?php bloginfo('template_url'); ?>/images/index2.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image4','','<?php bloginfo('template_url'); ?>/images/about2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/公司简介">
                <img border="0" width="115" height="32" id="Image4" name="Image4" src="<?php bloginfo('template_url'); ?>/images/about1.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image5','','<?php bloginfo('template_url'); ?>/images/service2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/服务项目">
                <img border="0" width="109" height="32" id="Image5" name="Image5" src="<?php bloginfo('template_url'); ?>/images/service1.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image6','','<?php bloginfo('template_url'); ?>/images/ywlch2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/业务流程">
                <img border="0" width="110" height="32" id="Image6" name="Image6" src="<?php bloginfo('template_url'); ?>/images/ywlch1.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image7','','<?php bloginfo('template_url'); ?>/images/news2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/category/news">
                <img border="0" width="109" height="32" id="Image7" name="Image7" src="<?php bloginfo('template_url'); ?>/images/news1.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image8','','<?php bloginfo('template_url'); ?>/images/ychwl2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/运输网络">
                <img border="0" width="109" height="32" id="Image8" name="Image8" src="<?php bloginfo('template_url'); ?>/images/ychwl1.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image9','','<?php bloginfo('template_url'); ?>/images/partners2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/category/vehicles">
                <img border="0" width="109" height="32" id="Image9" name="Image9" src="<?php bloginfo('template_url'); ?>/images/partners1.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image10','','<?php bloginfo('template_url'); ?>/images/message2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/在线留言">
                <img border="0" width="109" height="32" id="Image10" name="Image10" src="<?php bloginfo('template_url'); ?>/images/message1.jpg">
            </a>
            <a onmouseover="MM_swapImage('Image11','','<?php bloginfo('template_url'); ?>/images/contacUs2.jpg',1)" onmouseout="MM_swapImgRestore()" href="<?php echo home_url();?>/联系我们">
                <img border="0" width="92" height="32" id="Image11" name="Image11" src="<?php bloginfo('template_url'); ?>/images/contacUs1.jpg">
            </a>
        </div>
        <div class="main">
            <span>
                <img src="<?php bloginfo('template_url'); ?>/images/kjk_19.jpg">
            </span>
            <div class="main_m">
                <div class="banner">
                    <div data-ride="carousel" class="carousel slide" id="carousel-container">
                        <div class="carousel-inner">
                            <div class="item active"><img alt="第一张图" src="<?php bloginfo('template_url'); ?>/images/banner_2.jpg"></div>
                            <div class="item"><img alt="第二张图" src="<?php bloginfo('template_url'); ?>/images/banner_1.jpg"></div>
                            <div class="item"><img alt="第三张图" src="<?php bloginfo('template_url'); ?>/images/banner_3.jpg"></div>
                        </div>
                        <ol class="carousel-indicators">
                            <li class="active" data-slide-to="0" data-target="#carousel-container"></li>
                            <li data-slide-to="1" data-target="#carousel-container"></li>
                            <li data-slide-to="2" data-target="#carousel-container"></li>
                        </ol>
                    </div>
                </div>

