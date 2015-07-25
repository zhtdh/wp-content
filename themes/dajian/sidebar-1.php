<?php
    $newscat = get_category(get_category_by_slug('news'));
    $sidecats_query = new WP_Query('category_name=' . 'news' . '&posts_per_page=3&paged=1');
    //var_dump($sidecats_query->posts);
?>
<div class="main_left">
    <div class="Snews">
        <p class="Sleft_title">
            <a href="<?php echo get_category_link($newscat->term_id);?>">
                <img class="more" src="<?php bloginfo('template_url');?>/images/more1.jpg">
            </a>
            <img src="<?php bloginfo('template_url');?>/images/news_title.jpg">
        </p>
        <ul>
            <?php
                foreach($sidecats_query->posts as $cat){

                    ?>
                    <li>
                        <a target="_blank" href="<?php echo get_page_link($cat->ID);?>">
                            <?php echo mb_strimwidth($cat->post_title, 0, 39, '...'); ?>
                        </a>
                    </li>
                <?php
                }
            ?>
        </ul>
    </div>
    <div class="Spicshow">
        <p class="Spicshow_title">
            <img src="<?php bloginfo('template_url');?>/images/picshow.jpg">
        </p>
        <div style=" margin-left:1px;clear:both; padding-top:3px; text-align:center; border:#DCE3ED solid 1px; border-top:none;padding-bottom:3px;">
            <div class="banner" style="width: 100%">
                <div data-ride="carousel" class="carousel slide" id="left-carousel-container">
                    <div class="carousel-inner">
                        <div class="item active"><img alt="第一张图" src="<?php bloginfo('template_url'); ?>/images/leftbanner_1.jpg"></div>
                        <div class="item"><img alt="第二张图" src="<?php bloginfo('template_url'); ?>/images/leftbanner_2.jpg"></div>
                        <div class="item"><img alt="第三张图" src="<?php bloginfo('template_url'); ?>/images/leftbanner_3.jpg"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="Scontact">
        <img src="<?php bloginfo('template_url')?>/images/ct.jpg" style="BORDER-BOTTOM: #dce3ed 1px solid">
        <div class="Scontact_nr">
            <p style="LINE-HEIGHT: 24px; MARGIN-TOP: 10px; COLOR: #333333; MARGIN-LEFT: 10px; CLEAR: both">
                <strong><font color="#ff0000">青岛瑞亚通达物流有限公司</font>&nbsp;</strong><br>
                联系人：<br>
                张经理：18653250606<br>
                电话：86916965<br>
                详细地址：青岛经济技术开发区江山北路10号</p>
        </div>
    </div>
</div>

