<?php
if (is_category(9)) {
    wp_redirect("/?p=38");
    exit;
}
elseif (is_category(3)){
    wp_redirect("/?p=27");
    exit;
}
?>

<?php
get_header();
?>


<div class="max-width" style="margin-left: -15px;">

<div class="row " style="height:300px;padding-left:15px">
    <!-- <img class="img-responsive block-shadow max-height:300px;" src="-->
    <img style="width:970px;height:300px;" src="
    <?php
        $l_src = "";
        if (is_category('product')) $l_src =  'top2.jpg';
        elseif (is_category('about')) {  exit; }
        elseif (is_category('comanpyinfo')) { exit; }
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

        <table class="table table-hover block-shadow">
            <thead> <tr>
                <th style="width:60px;">#</th>
                <th style="width:auto;text-align: left;">标题</th>
                <th style="width:200px;">发布时间</th>
            </tr> </thead>

            <tbody>
            <?php
            if(is_category()) {
                $cur_cat = get_category(get_query_var('cat'));
                $the_query = new WP_Query('cat=' . $cur_cat->cat_ID . '&posts_per_page='. get_option('posts_per_page').  '&paged=' . get_query_var('paged', 5)); //$_GET["paged"]);
                if ($the_query->have_posts()) {
                    $l_index = 0;
                    do {
                        $l_index += 1;
                        $the_query->the_post();
                    ?>
                    <tr>
                        <td scope="row"> <?php echo $l_index;?> </td>
                        <td><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                        <td><?php  the_date() ?></td>
                    </tr>
                    <?php
                    } while ($the_query->have_posts());
                }
                else {
                    echo "<tr><td></td><td><br/> 嘿！暂时没有数据，过段时间再来看看吧。 <p> &nbsp; </td></tr>";
                }
            }
            ?>
            </tbody>
        </table>

        <?php pagenavi(); ?>

    </div>
</div>
</div>
