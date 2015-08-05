<?php get_header();?>

<div class="Company">
    <p class="Company_title"><img src="<?php bloginfo('template_url')?>/images/Company_title.jpg"></p>
    <div class="Company_content">
        <div class="news" style="height: 220px;">
            <p class="news_title"><img src="<?php bloginfo('template_url')?>/images/lianxititle.jpg"></p>
            <ul>
                <p style="line-height:165%; font-size:13px; margin-left:13px; margin-right:5px; margin-top:15px;">
                <?php
                    echo get_page_by_title('联系我们')->post_content;
                ?>
            </ul>
        </div>
        <div style=" margin-left:3px;height: 220px;" class="yshwl">
            <p class="yshwl_title">
                <span style="float:left"><img src="<?php bloginfo('template_url')?>/images/bg6.jpg"></span>
                <a href="/公司简介"><img class="more" src="<?php bloginfo('template_url')?>/images/more1.jpg"></a>
                <img src="<?php bloginfo('template_url')?>/images/abouttitle.jpg"></p>
            <ul>
                <p style="line-height:165%; font-size:13px; margin-left:9px; margin-right:5px; margin-top:15px;">  &nbsp;&nbsp;&nbsp;&nbsp;青岛瑞亚通达物流有限公司是一家集公路运输、货运代理、城际配送于一体的跨区域、网络型、信息化、并具有供应链管理能力的综合型物流企业。<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;青岛瑞亚通达物流旗下拥有和整合各种运输车辆多台，物流设备多套，仓库、分拨场地1万多平方米，日吞吐能力450余吨。公司与国内外多家企业建立合作关系，网络覆盖全国大部分，在全国多个大中城市开通专、快线长途零担与整车业务，并在山东半岛区域内开展城际配送业务。</p>
            </ul>
        </div>
        <div style="margin-left:3px;" class="picshow">
            <p class="picshow_title">
                <img src="<?php bloginfo('template_url')?>/images/picshow.jpg">
            </p>
            <div style="clear:both; padding-top:6px; text-align:center; border:#DCE3ED solid 1px; border-top:none;">

                <div data-ride="carousel" class="carousel slide" id="left-carousel-container">
                    <div class="carousel-inner">
                        <div class="item active"><img alt="第一张图" src="<?php bloginfo('template_url'); ?>/images/IMG_3238.jpg"></div>
                        <div class="item"><img alt="第二张图" src="<?php bloginfo('template_url'); ?>/images/leftbanner_2.jpg"></div>
                        <div class="item"><img alt="第三张图" src="<?php bloginfo('template_url'); ?>/images/IMG_7867.jpg"></div>
                    </div>
                </div>

            </div>
        </div>
        <div style="float:left;">
            <img src="<?php bloginfo('template_url')?>/images/bottom2.jpg"></div>
        <div class="clear"></div>
    </div>
</div>
<div style="clear:both;">

</div>
<div class="Services">
        <p class="Services_title"><img src="<?php bloginfo('template_url');?>/images/Services_title.jpg"></p>
        <div class="Smain">
            <p class="Stu"><img src="<?php bloginfo('template_url');?>/images/s1.jpg"></p>

            <p class="Sjsh_title">公路运输</p>

            <p class="Sjsh_content">青岛瑞亚通达物流是面向全国的物流公司，为了适应市场的需求，
                公司开拓了上全国各地区的干线运输、整车零担等业务。<br>
            </p>
            <p class="Smore">
                <img src="<?php bloginfo('template_url');?>/images/jt.jpg">
                <font style="MARGIN-LEFT: 3px"><a href="<?php echo home_url();?>/服务项目" class="a2">read more</a></font>
            </p>
        </div>
        <div class="Smain">
            <p class="Stu"><img src="<?php bloginfo('template_url');?>/images/s2.jpg"></p>
            <p class="Sjsh_title">大件运输</p>
            <p class="Sjsh_content">公司承运各类大型，特种物件，超长、超宽、超高 、超重，等大型货物运输业务。大建运输主要经营 有，矿山设备、机械设备、电站设备...</p>
            <p class="Smore">
                <img src="<?php bloginfo('template_url');?>/images/jt.jpg">
                <font style="MARGIN-LEFT: 3px"><a href="<?php echo home_url();?>/服务项目" class="a2">read more</a></font>
            </p>
        </div>
        <div class="Smain">
            <p class="Stu"><img src="<?php bloginfo('template_url');?>/images/s3.jpg"></p>
            <p class="Sjsh_title">木箱运输</p>
            <p class="Sjsh_content">木箱包装： 我公司有专业的木工师傅，技术 精湛，专为客户定做木箱包装。比如客户的精密 仪器、电器设备、电脑配件、贵重器件...</p>
            <p class="Smore">
                <img src="<?php bloginfo('template_url');?>/images/jt.jpg">
                <font style="MARGIN-LEFT: 3px"><a href="<?php echo home_url();?>/服务项目" class="a2">read more</a></font>
            </p>
        </div>
        <div class="clear"></div>
    </div>
<?php get_footer(); ?>