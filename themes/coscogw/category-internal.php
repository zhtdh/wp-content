<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-25
 * Time: 下午4:22
 */
get_header();
?>
    <div class="category-container">
        <img src="<?php bloginfo('template_url'); ?>/images/banner3.jpg">

        <?php
        //取分类目录left-sidebar
        if (localrequest()){
            get_sidebar(1);
        }
        ?>
        <div class="DRight">
            <?php
            if (!localrequest()){
                echo "<h2>"."非内部员工禁止访问" . "</h2>";
            }
            ?>
        </div>
    </div>

    category-internalcategory-internalcategory-internalcategory-internalcategory-internal
<?php get_footer(); ?>