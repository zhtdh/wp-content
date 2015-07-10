<?php
get_header();
?>


<div class="max-width" style="margin-left: -15px;">

<div class="row " style="height:300px;padding-left:15px">
    <!-- <img class="img-responsive block-shadow img-stretch-page" src=" -->
    <img style="width:970px;height:300px;" src="
    <?php
        $l_src = "";
        if (is_category('product')) $l_src =  'top2.jpg';
        elseif (is_category('about')) {  exit; }
        elseif (is_category('comanpyinfo')) { exit; }
        else $l_src = 'top1.jpg';
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
                        <img style="margin-right: auto;margin-left: auto;" class = "img-responsive" src="<?php echo get_bloginfo('template_url') .'/img/weixin.jpg'?>" alt="<?php bloginfo('name');?>">
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


        <div class="block-border-all block-shadow" style="min-height:400px; width:100%;padding:20px;">

          <?php
          if(is_category()) {
              $cur_cat = get_category(get_query_var('cat'));
              $the_query = new WP_Query('cat=' . $cur_cat->cat_ID ); //$_GET["paged"]);
              if ($the_query->have_posts()) {
                  $l_index = 0;
                  global $post;
                  do {
                      $l_index += 1;
                      $the_query->the_post();
                      if (($l_index % 3 ) == 1) echo('<div class="row">');
                      //$l_ex_img_link = get_post_meta($post->ID, 'ex_img', true);
                      $l_img_link = get_the_thumbnail_src();
                  ?>

                    <div class="col-xs-4  block-center" style="padding:5px;">
                        <a href="<?php echo $l_img_link; ?>" class="thumbnail img-stretch">
                          <img style="height:200px;" src="<?php echo $l_img_link; ?>" alt="placeholder thumbnail">
                        </a>
                        <br/>
                        <?php the_title(); ?>
                        <br/>
                        <a href="<?php the_permalink(); ?>" type="button" class="btn btn-primary btn-xs">
                          <i class="glyphicon glyphicon-forward"></i> 详细信息
                        </a>
                    </div>

                  <?php
                    if (($l_index % 3 ) == 0) echo('</div>');
                  } while ($the_query->have_posts());
              }
              else {
                  echo "<tr><td></td><td><br/> 嘿！暂时没有数据，过段时间再来看看吧。 <p> &nbsp; </td></tr>";
              }
          }
          ?>






        </div>


    </div>
</div>
</div>

<?php get_footer(); ?>