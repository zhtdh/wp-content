<?php
$showCase = [
    1 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top1.jpg", title=>"top1" ],
    2 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top2.jpg", title=>"top2" ],
    3 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top3.jpg", title=>"top3" ],
    4 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top4.jpg", title=>"top4" ]
];

$gridShowList = [
    1 => [ link=>post_permalink(61), src=>get_bloginfo('template_url')."/img/product1.jpg", title=>"接收机",
        comm=>'接收机' ],
    2 => [ link=>get_category_link(get_category_by_slug('industryapp')->term_id), src=>get_bloginfo('template_url')."/img/软件.png", title=>"系统集成",
        comm=>'系统集成' ],
    3 => [ link=>get_bloginfo('template_url')."/img/高精度车辆.gif", src=>get_bloginfo('template_url')."/img/高精度车辆.gif", title=>"高精度车辆",
        comm=>'高精度车辆' ],
    4 => [ link=>get_category_link(get_category_by_slug('honor')->term_id), src=>get_bloginfo('template_url')."/img/honor.png", title=>"荣誉资质",
        comm=>'荣誉资质' ]/*,
    5 => [ link=>get_bloginfo('template_url')."/img/受通基准站接收机-鼎成.jpg", src=>get_bloginfo('template_url')."/img/受通基准站接收机-鼎成.jpg", title=>"受通基准站接收机-鼎成",
        comm=>'受通基准站接收机-鼎成' ]*/
];

$rightBarList = [
    1 => [ link=>get_option('home'), catename=>"toppage", title=>get_category_by_slug('toppage')->name ],
    2 => [ link=>get_option('home'), catename=>"industrysafe", title=>get_category_by_slug('industrysafe')->name ]/*,
    3 => [ link=>get_option('home'), catename=>"safepublic", title=>get_category_by_slug('safepublic')->name ]*/
];

$rightBarVideo = [link=>get_option('home'),title=>"视频演示",
    src=>"http://www.tudou.com/programs/view/html5embed.action?type=0&amp;code=3HGtLUN0A_s&amp;lcode=&amp;resourceId=0_06_05_99"];

?>




<div class="max-width" style="margin-left: -15px;">
    <div class="row ">
        <div class="col-xs-12 ">
            <div id="carousel-generic" class="carousel slide border-bottom block-shadow" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-generic" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <?php foreach($showCase as $iKey=>$iValue) : ?>
                        <div class="item <?php if ($iKey==1) echo 'active'; ?>" >
                            <a href="<?php echo $iValue["link"] ?>"><img src="<?php echo $iValue["src"] ?>" style="width:970px;height:300px;"> </a>
                            <div class="carousel-caption">
                                <?php //echo $iValue["title"] ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div> <!-- end row of case show -->

    <div class="row " style="margin-top: 10px;"> <!-- start the grid show -->
        <div class="col-xs-8">

            <?php foreach($gridShowList as $iKey=>$iValue) : ?>
                <?php if ($iKey<3) :
                        if ($iKey == 2){
                            ?>
                            <div class="col-xs-6 topgrey-background" style="padding-top: 10px;">
                                <div class="block block-light block-shadow border-allthick" style="height: 230px;">
                                    <h4 class="heading-primary" style="text-align:center;border-bottom: solid 1px; padding-bottom: 5px; ">

                                            <?php echo $iValue['title']; ?>

                                        <?php if (get_category_by_slug('industryapp')->count > 6){ ?>
                                             <a href="<?php echo $iValue['link'] ?>">
                                                 <h6 style="display: inline;float: right;">更多</h6>
                                             </a>
                                        <?php } ?>

                                    </h4>
                                    <ul class="list list-feature home-list" style="float: left;">
                                        <?php
                                        $ps = get_posts(array('category' => get_category_by_slug('industryapp')->term_id,'numberposts' => 6));
                                        foreach($ps as $cur_post){
                                        ?>
                                        <li><a href="<?php echo post_permalink($cur_post->ID); ?>"><?php echo $cur_post->post_title;?></a></li>
                                        <?php } ?>
                                    </ul>

                                </div>
                            </div>
                        <?php
                        }else{
                    ?>

                    <div class="col-xs-6 topgrey-background" style="padding-top: 10px;">
                        <div class="block block-light block-center block-shadow border-allthick" style="height: 230px;">
                            <h4 class="heading-primary" style="text-align:center;border-bottom: solid 1px; padding-bottom: 5px; ">
                                <a href="<?php echo $iValue['link'] ?>">
                                    <?php echo $iValue['title']; ?>
                                </a>
                            </h4>
                            <a href="<?php echo $iValue['link'] ?>"><img class="img-thumbnail" src="<?php echo $iValue['src'] ?>" style="width:240px;height:135px;"></a>
                            <!-- <p> <?php //echo $iValue['comm'] ?></p> -->
                        </div>
                    </div>
                    <?php } ?>
                <?php else : ?>
                    <?php if ($iKey==3) : ?>
                        <div class="col-xs-12" style="background-color: white; height:5px;"> &nbsp; </div>
                        <div class="col-xs-6 topgrey-background"  style="padding-top: 10px;">
                            <div class="block block-light border-allthick block-center block-shadow" style="height: 210px;">
                                <h4 class="heading-primary" style="text-align:center;border-bottom: solid 1px; padding-bottom: 5px; ">
                                    <a href="<?php echo post_permalink(get_page_by_title('应用案例')->ID); ?>">应用案例</a>
                                </h4>
                                <marquee direction="up" scrolldelay="0" scrollamount="1"
                                         onMouseOut="this.start();"
                                         onMouseOver="this.stop()" style="height:80%"
                                    >
                                <?php
                                    $cpage = get_page_by_title('应用案例');
                                    $a_array = explode('</a>',$cpage->post_content);
                                    //var_dump($a_array);
                                    if (count($a_array) > 0){
                                ?>
                                <ul class="list list-feature home-list">
                                    <?php foreach($a_array as $a){
                                        if (strlen($a) > 0){
                                        ?>
                                        <li><?php echo trim($a); ?></li>
                                    <?php }}
                                    ?>
                                </ul>
                                <?php }?>
                                </marquee>
                            </div>
                        </div>
                    <?php endif ?>
                    <?php if ($iKey==4) : ?>
                        <div class="col-xs-6 topgrey-background"  style="padding-top: 10px;">
                            <div class="block block-light border-allthick block-center block-shadow" style="height: 210px">
                                <h4 class="heading-primary" style="text-align:center;border-bottom: solid 1px; padding-bottom: 5px; ">
                                    <?php echo $iValue['comm'] ?>
                                </h4>
                                <a href="<?php echo $iValue['link'] ?>">
                                    <img src="<?php echo $iValue['src'] ?>"
                                         style="width:150px;height:150px;margin-bottom: 15px; margin-left: auto;margin-right: auto;"
                                         class="img-circle img-responsive">
                                </a>

                            </div>
                        </div>
                    <?php endif ?>

                <?php endif ?>
            <?php endforeach ?>

        </div>

        <div class="col-xs-4" style="padding-top:8px; height: 405px;">
            <div class="tab tab-primary border-all block-shadow" role="tabpanel" style="min-height: 190px;">
                <ul class="nav nav-tabs">
                    <li class="active" style="width: 50%;text-align: center;"><a href="#home" data-toggle="tab"><?php echo $rightBarList['1']['title']; ?></a></li>
                    <li style="width: 50%;text-align: center;"> <a href="#profile" data-toggle="tab"><?php echo $rightBarList['2']['title']; ?></a></li>
                    <!--<li><a href="#contact" data-toggle="tab"><?php //echo $rightBarList['3']['title']; ?></a></li> -->
                </ul>

                <div class="tab-content" style="padding: 20px;border-top:1px solid lightgrey;height: 430px;">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <ul class="list list-feature" style="padding-top: -5px; font-size: 85%; line-height: 1.5em;">
                            <?php
                            $the_query = new WP_Query( 'category_name='.$rightBarList['1']['catename'].'&posts_per_page=15' );
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                ?>
                                <li> <i class="glyphicon glyphicon-ok primary-color"></i>
                                    <span><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a> </span> </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                        <ul class="list list-feature" style="padding-top: -5px; font-size: 85%; line-height: 1.5em;">
                            <?php

                            $the_query = new WP_Query( 'category_name='.$rightBarList['2']['catename'].'&posts_per_page=15' );
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                ?>
                                <li> <i class="glyphicon glyphicon-ok primary-color"></i> <span>
                            <a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a> </span> </li>
                            <?php } ?>
                        </ul>
                    </div>
<!--
                    <div role="tabpanel" class="tab-pane fade" id="contact" aria-labelledby="profile-tab">
                        <ul class="list list-feature" style="padding-top: -5px; font-size: 85%; line-height: 1.5em;">
                            <?php
/*
                            $the_query = new WP_Query( 'category_name='.$rightBarList['3']['catename'].'&posts_per_page=15' );
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post(); */
                                ?>
                                <li> <i class="glyphicon glyphicon-ok primary-color"></i> <span>
                            <a href ="<?php //the_permalink(); ?>"><?php //the_title(); ?></a> </span> </li>
                            <?php //} ?>
                        </ul>
                    </div> -->
                </div>
            </div>
            <br>
            <!-- <div class="block block-primary-head no-pad border-allthick block-shadow block-light">
                <h5><i class="glyphicon glyphicon-play-circle color-primary"> </i>
                    <?php //echo $rightBarVideo['title']; ?>
                </h5>
                <div class="block-content">
                    <iframe width="272" height="172" src="
                    <?php
            //echo $rightBarVideo['src'];
            ?>
                    "></iframe>
                </div>
            </div> -->
        </div>
    </div>
</div>
