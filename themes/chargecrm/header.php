<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
session_start();
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=GBK">
    <meta name="description" content="<?php bloginfo('description'); ?>"/>
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>

    <title><?php bloginfo('name'); ?></title>
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/ex.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" type="text/css">
    <script src="<?php bloginfo('template_url'); ?>/js/pptBox.js"></script>
</head>
<body style="margin-top:0px; margin-left:0px;">
<div id="div_main">
    <div
        style="background:url(<?php bloginfo('template_url'); ?>/images/up.jpg) no-repeat; width:980px; height:84px; text-align:center;">
        <table width="980" height="84" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td width="535" rowspan="2" valign="top">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" width="535" height="84">
                </td>
                 <td width="445" height="34" align="right">
                    <table width="40%" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td align="center">
                                <a href="#"
                                   onclick="this.style.behavior=&#39;url(#default#homepage)&#39;;this.setHomePage(&#39;<?php echo site_url() ?>&#39;);"
                                   class="menu">设为首页
                                </a>
                            </td>
                            <td align="center">
                                <a href="<?php // echo site_url() ?>"
                                   onclick="window.external.AddFavorite(document.location.href,document.title)"
                                   class="menu">
                                    加入收藏
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" height="54" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                        <!--
                        <tr>

                            <?php /*
                            $menu_items = wp_get_nav_menu_items('navmenu');
                            $cacheMenu = [];
                            $l_count = 0;
                            foreach ($menu_items as $iFor) {
                                if ($iFor->menu_item_parent == "0") {
                                    $cacheMenu[$iFor->ID] = $iFor;
                                    $l_count += 1;
                                }
                            }
                            $l_navItemWidth = floor(100 / $l_count); */
                            ?>

                            <?php //foreach ($cacheMenu as $iNavMenu) : ?>
                                <td width="<?php //echo $l_navItemWidth; ?>%" align="center"><a
                                        href="<?php //echo $iNavMenu->url ?>"
                                        class="menu"><?php //echo $iNavMenu->title ?></a></td>
                            <?php //endforeach ?>

                        </tr>
                         -->
                        <tr>
                            <td width="19%" align="center"><a class="menu" href="<?php echo get_option('home');?>">首 页</a></td>
                            <td width="20%" align="center"><a class="menu" href="<?php echo get_page_link(get_page_by_title('公司简介')->ID);?>">公司简介</a></td>
                            <td width="19%" align="center"><a class="menu" href="<?php echo get_page_link(get_page_by_title('运输线路')->ID); ?>">运输线路</a></td>
                            <td width="19%" align="center"><a class="menu" href="<?php echo home_url(); ?>/category/recruit/">人才招聘</a></td>
                            <td width="20%" align="center"><a class="menu" href="<?php echo get_page_link(get_page_by_title('在线留言')->ID);?>">在线留言</a></td>
                            <td width="3%" align="center"> </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">

        <tbody>
        <tr>
            <td valign="top" align="right" width="240">
                <div
                    style="background:url(<?php bloginfo('template_url'); ?>/images/heec_017.gif) center no-repeat; line-height:33px;background-color:#f4f3f3;"
                    class="title1">网站公告
                </div>
                <div style="padding-left:4px; padding-right:4px; height:200px;background-color:#f4f3f3;" class="text1">
                    <div id="rolllink" style="overflow: hidden; width: 230px; height: 190px">
                        <div id="rolllink1">&nbsp;&nbsp;
                            <!-- <strong><?php //bloginfo('name'); ?></strong>-->
                            <?php echo get_page_by_title('公司简介1')->post_content;?>
                        </div>
                        <div id="rolllink2">&nbsp;&nbsp;
                            <!-- <strong><?php //bloginfo('name'); ?></strong>-->
                            <?php echo get_page_by_title('公司简介1')->post_content;?>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var rollspeed = 40
                        rolllink2.innerHTML = rolllink1.innerHTML
                        function Marquee() {
                            if (rolllink2.offsetTop - rolllink.scrollTop <= 0)
                                rolllink.scrollTop -= rolllink1.offsetHeight
                            else {
                                rolllink.scrollTop++
                            }
                        }
                        var MyMar = setInterval(Marquee, rollspeed)
                        rolllink.onmouseover = function () {
                            clearInterval(MyMar)
                        }
                        rolllink.onmouseout = function () {
                            MyMar = setInterval(Marquee, rollspeed)
                        }
                    </script>
                </div>
                <div style="height:10px; background-color:#FFFFFF;">

                </div>
                <div
                    style="background:url(<?php bloginfo('template_url'); ?>/images/heec_017.gif) center no-repeat; line-height:33px;background-color:#f4f3f3;"
                    class="title1">
                    图片展示
                </div>
                <table width="100%" border="0" cellspacing="0" style="background-color:#f4f3f3;">
                    <tbody>
                    <tr>
                        <td style="padding:5px; vertical-align:top; line-height:24px;" height="175" class="text1">
                            <!-- 播放器 begin -->


                            <div id="xxx">
                                <script>
                                    var box = new PPTBox();
                                    box.width = 230; //宽度
                                    box.height = 175;//高度
                                    box.autoplayer = 2;//自动播放间隔时间

                                    //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
                                    box.add({
                                        "url": "<?php bloginfo('template_url'); ?>/images/l1.jpg",
                                        "href": "<?php bloginfo('template_url'); ?>/",
                                        "title": "悬浮提示标题1"
                                    })
                                    box.add({
                                        "url": "<?php bloginfo('template_url'); ?>/images/l2.jpg",
                                        "href": "<?php bloginfo('template_url'); ?>/",
                                        "title": "悬浮提示标题2"
                                    })
                                    box.add({
                                        "url": "<?php bloginfo('template_url'); ?>/images/IMG_1480.jpg",
                                        "href": "<?php bloginfo('template_url'); ?>/",
                                        "title": "悬浮提示标题3"
                                    })
                                    box.add({
                                        "url": "<?php bloginfo('template_url'); ?>/images/IMG_3238.jpg",
                                        "href": "<?php bloginfo('template_url'); ?>/",
                                        "title": "悬浮提示标题4"
                                    })
                                    box.show();
                                </script>
                            </div>

                        </td>
                    </tr>
                    </tbody>
                </table>
                <div
                    style="background:url(<?php bloginfo('template_url'); ?>/images/heec_017.gif) center no-repeat; line-height:33px;background-color:#f4f3f3;"
                    class="title1">联系我们
                </div>
                <div style="padding-left:4px; padding-right:4px; height:218px;background-color:#f4f3f3;" class="text1">
                    名  称：<strong>青岛津港国际物流有限公司</strong> <br>
                    地  址：青岛市黄岛区江山北路350号<br>
                    联系人：张先生 <br>
                    电  话：0532—86916965<br>
                    手  机：18653250606<br>
                </div>
                <div><img src="<?php bloginfo('template_url'); ?>/images/heec_004.gif" width="240" height="35"></div>
            </td>
            <td valign="top" width="20"><img src="<?php bloginfo('template_url'); ?>/images/heec_003.gif" width="20"
                                             height="16"></td>


            <td valign="top">
                <div><img src="<?php bloginfo('template_url'); ?>/images/63P58PICwGn_1024.jpg" width="720" height="233"></div>

    
    
    


