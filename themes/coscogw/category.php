<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-5
 * Time: 下午5:22
 */
get_header();
?>
    <div class="category-container">
        <img src="<?php bloginfo('template_url'); ?>/images/banner3.jpg">
        <?php
        //取分类目录left-sidebar
        get_sidebar(1);
        ?>
        <div class="category-right">

        </div>
    </div>
<?php get_footer(); ?>