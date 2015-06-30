<?php
$showCase = [
    1 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top1.jpg", title=>"top1" ],
    2 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top2.jpg", title=>"top2" ],
    3 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top3.jpg", title=>"top3" ],
    4 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/top4.jpg", title=>"top4" ]
];

$gridShowList = [
    1 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/硬件.png", title=>"硬件",
        comm=>'' ],
    2 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/软件.png", title=>"软件",
        comm=>'' ],
    3 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/高精度车辆.jpg", title=>"高精度车辆",
        comm=>'高精度车辆' ],
    4 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/GNSS高精度.jpg", title=>"GNSS高精度",
        comm=>'GNSS高精度' ],
    5 => [ link=>get_option('home'), src=>get_bloginfo('template_url')."/img/受通基准站接收机-鼎成.jpg", title=>"受通基准站接收机-鼎成",
        comm=>'受通基准站接收机-鼎成' ]
];

$rightBarList = [
    1 => [ link=>get_option('home'), catename=>"toppage", title=>"首页文章" ],
    2 => [ link=>get_option('home'), catename=>"industrysafe", title=>"行业安全" ],
    3 => [ link=>get_option('home'), catename=>"safepublic", title=>"公共安全" ]
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
                                <?php echo $iValue["title"] ?>
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
                <?php if ($iKey<3) : ?>
                    <div class="col-xs-6 topgrey-background" style="padding-top: 10px;">
                        <div class="block block-light block-center block-shadow border-allthick">
                            <h4 class="heading-primary"><a href="<?php echo $iValue['link'] ?>"> <?php echo $iValue['title']; ?> </a> </h4>
                            <a href="<?php echo $iValue['link'] ?>"><img class="img-thumbnail" src="<?php echo $iValue['src'] ?>" style="width:240px;height:135px;"></a>
                            <p> <?php echo $iValue['comm'] ?></p>
                        </div>
                    </div>
                <?php else : ?>
                    <?php if ($iKey==3) : ?>
                        <div class="col-xs-12" style="background-color: white; height:5px;"> &nbsp; </div>
                    <?php endif ?>
                    <div class="col-xs-4 topgrey-background"  style="padding-top: 10px;">
                        <div class="block block-light border-allthick block-center block-shadow">
                            <a href="<?php echo $iValue['link'] ?>"><img src="<?php echo $iValue['src'] ?>" style="width:150px;height:120px;margin-bottom: 15px;"
                                                                class="pull-left img-circle img-responsive"></a>
                            <p> <?php echo $iValue['comm'] ?> </p>
                        </div>
                    </div>

                <?php endif ?>
            <?php endforeach ?>

        </div>

        <div class="col-xs-4" style="padding-top:8px;">
            <div class="tab tab-primary border-all block-shadow" role="tabpanel" style="min-height: 190px;">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active" ><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><?php echo $rightBarList['1']['title']; ?></a></li>
                    <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><?php echo $rightBarList['2']['title']; ?></a></li>
                    <li role="presentation"><a href="#contact" role="tab" id="contact-tab" data-toggle="tab" aria-controls="contact"><?php echo $rightBarList['3']['title']; ?></a></li>
                </ul>

                <div id="myTabContent" class="tab-content" style="padding: 20px;border-top:1px solid lightgrey;">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <ul class="list list-feature" style="padding-top: -5px; font-size: 85%; line-height: 1.5em;">
                            <?php
                                $the_query = new WP_Query( 'category_name='.$rightBarList['1']['catename'].'&posts_per_page=5' );
                                while ( $the_query->have_posts() ) {
                                    $the_query->the_post();
                                ?>
                                <li style="height:26px;"> <i class="glyphicon glyphicon-ok primary-color"></i>
                                    <span><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a> </span> </li>
                                <?php } ?>
                        </ul>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                        <ul class="list list-feature" style="padding-top: -5px; font-size: 85%; line-height: 1.5em;">
                        <?php

                        $the_query = new WP_Query( 'category_name='.$rightBarList['2']['catename'].'&posts_per_page=5' );
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            ?>
                            <li style="height:26px;"> <i class="glyphicon glyphicon-ok primary-color"></i> <span>
                            <a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a> </span> </li>
                        <?php } ?>
                        </ul>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="contact" aria-labelledby="profile-tab">
                        <p> 这里是一些静态文本啦。 </p>
                    </div>
                </div>
            </div>
            <br>
            <div class="block block-primary-head no-pad border-allthick block-shadow block-light">
                <h5><i class="glyphicon glyphicon-play-circle color-primary"> </i> <?php echo $rightBarVideo['title']; ?> </h5>
                <div class="block-content">
                    <iframe width="272" height="172" src="<?php echo $rightBarVideo['src']; ?>"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>