<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-3
 * Time: 上午10:20
 */
?>
<?php
//include_once('header.php');
get_header();

?>
    <div data-ride="carousel" class="carousel slide banner" id="carousel-container">
        <div class="carousel-inner">
            <div class="item active"><img src="<?php bloginfo('template_url'); ?>/images/banner1.jpg"/></div>
            <div class="item"><img src="<?php bloginfo('template_url'); ?>/images/banner2.jpg"/></div>
        </div>
    </div>
    <div style="margin: 0 auto;overflow: hidden;text-align: left;width: 970px;">
        <?php
        include('news-company.php');
        include('news-notice.php');
        ?>
        <!--提单查询 -->
        <div class="hy-zxfw-module">
            <div class="hy-zxfw-module-module">
                <div class="hy-zxfwPnews-item">
                    <div align="right" style="font-size: 13px; text-align: center; font-family: 微软雅黑; color:#fff">
                        提单查询：
                        <input type="text"
                               style="border-color: #CCCCCC; border-width: 1px; border-style: Solid; width: 212px;"
                               onkeydown="if(event.keyCode==13) { event.keyCode=9; document.getElementById('btn_Search').click();}"
                               id="ctl00_Main_billno" name="ctl00$Main$billno">
                        <input type="submit" style="margin-left: 10px; width: 55px;" class="btnbg1"
                               id="ctl00_Main_btn_Search" value="查询" name="ctl00$Main$btn_Search">
                    </div>
                </div>
            </div>
        </div>
        <!--资源下载 -->
        <div style="float: left;clear: left; width:300px; margin-top:20px;_margin-top:10px;">

            <div class="resource_main">
                <div class="resource_main-more">
                    <a href="<?php echo home_url(); ?>/?p=106">更多&gt;&gt;</a>
                </div>
                <div style="padding-top: 8px; margin-bottom: 8px;_margin-bottom: 4px;">
                    <ul class="list_9_1">
                        <?php
                        $resourcePost = get_page_by_title('资源下载');
                        preg_match_all('/<a[^>]+>[^>]+a>/', $resourcePost->post_content, $aout);
                        foreach ($aout[0] as $r){
                        ?>
                        <li>
                            <?php
                            echo $r;
                            }
                            ?>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <!--内部通知 或者 地理位置 -->
        <div style="float: left; width:300px; height:180px;margin-left:16px; margin-top:20px;_margin-top:10px;">
            <?php
            if (localrequest()) {
                include('news-inside.php');
            } else {
                ?>
                <div class="map_module">
                    <div style="padding-top: 8px; margin-bottom: 8px;">
                        <a target="_blank" href="http://j.map.baidu.com/dfiR3">
                            <img alt="点击查看大图"
                                 style="border:1px #000000 solid; width:216px;height:132px;text-align:center; margin:30px 0px 0px 40px"
                                 src="<?php bloginfo('template_url'); ?>/images/map.jpg">
                        </a>
                    </div>
                </div>
                <?php
                //echo get_page_by_title('地理位置')->post_content;
            }
            ?>
        </div>
        <!-- 业务支持-->
        <div style="width:310px;float:left;margin-top:20px;margin-left: 20px;">

            <div class="scrollver" style="width: 310px; height: 180px; overflow: hidden">
                <div style="height: 128px; overflow: hidden; margin-top:40px; margin-left:10px">
                    <div style="height: 128px; overflow: hidden;margin: 0px; font-size: 12px">
                        <marquee id="scrollver-m" direction="up" scrolldelay="0" scrollamount="1"
                                 onMouseOut="this.start();"
                                 onMouseOver="this.stop()"
                            >
                            <?php
                            $lx_post = get_page_by_title('业务支持');
                            echo $lx_post->post_content;
                            ?>
                        </marquee>
                    </div>

                </div>
            </div>
        </div>
    </div>
    homehomehomehomehomehome
<?php
//global $localhost_name;
//var_dump($localhost_name);
//print_r($localhost_name);
?>
<?php get_footer(); ?>