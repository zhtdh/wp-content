<?php get_header();?>

<?php
$cur_cat = get_the_category(get_the_ID());
$cur_post = get_page(get_the_ID());
//var_dump($cur_cat[0]);
get_sidebar(1);?>
    <div class="main_right">
        <p class="Stitle">
            <font style="float:right; margin-right:10px;">您当前的页面是：
                <a href="/">首页</a> &gt;
                <a href="<?php echo get_category_link($cur_cat[0]->cat_ID); ?>"><?php echo $cur_cat[0]->name; ?></a>
            </font>
            <span><?php echo $cur_cat[0]->name; ?></span>
        </p>
        <div class="about_nr">
            <h1 style="text-align: center"><?php echo $cur_post->post_title;?></h1>
            </br>
            <?php echo $cur_post->post_content; ?>
        </div>
    </div>

<?php get_footer(); ?>