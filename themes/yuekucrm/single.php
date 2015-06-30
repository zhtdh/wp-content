<?php get_header(); ?>


<div class="max-width" style="margin-left: -15px;">

    <div class="row " style="height:300px;padding-left:15px">
        <!--<img class="img-responsive block-shadow" src=" -->
        <img style="width:970px;height:300px;" src="
        <?php
        $l_src = "";
        if (is_category('product')) $l_src = bloginfo('template_url') + '/top2.jpg';
        elseif (is_category('company')) $l_src = bloginfo('template_url') + '/top1.jpg';
        else $l_src = 'top3.jpg';
        echo get_stylesheet_directory_uri(). '/img/' .$l_src ;
        ?>">
    </div>

    <br>

    <div class="row" >
        <div class="col-xs-3">
            <?php get_sidebar(1); ?>
            <br>
            <div class="panel-group block-shadow" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a data-toggle="collapse" data-parent="#accordion" href="sec/#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="em-primary" style="color:white;font-size: 12px;"> 扫一扫 </span>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <img class = "img-responsive" src="<?php echo get_bloginfo('template_url') .'/img/top1.jpg'?>" alt="iphone">
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="sec/#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span style="color:white;font-size: 12px;"> 公司文化 </span>
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            创新引领科技，为美好明天努力耕耘！
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-9">

            <ol class="breadcrumb block-shadow">
                <?php include('bread.php'); ?>
            </ol>

            <div class="block-border-all block-shadow postsingle" style="min-height:600px; width:100%;padding:20px;">

                <h3 class="title" style="float:left;color: #00aff0;">
                    <?php
                        the_title();
                    ?>
                </h3>
                <h4 style="clear:both;float: right">
                    <?php
                        echo '--';
                        the_time('Y年n月j日');
                    ?>
                </h4>

                <div style="clear: both;">

                <?php
                if( have_posts() ){
                    the_post();
                    the_content();
                    $imglink = get_post_meta( get_the_ID(), 'linkimage', true );
                    if( !empty( $imglink ) ) {
                        echo("<img class='thumb' src='$imglink' alt=''/> ");
                    }
                }
                ?>

                </div>
            </div>

        </div>
    </div>
</div>


<?php get_footer();?>


