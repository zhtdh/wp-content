<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-5
 * Time: 下午6:36
 * 分类目录界面   left-sidebar
 */
?>
<div class="category-left">
    <div class="category-left-top">
        <h1>
            <?php
            if (is_category()) {
                $cat = get_category(get_query_var('cat'));
            } elseif (is_single()) {
                $cat = get_the_category()[0];
            }
            echo $cat->cat_name;

            ?>
        </h1>
    </div>
    <ul class="category-left-list">
        <?php
        $current_posts = get_posts("category={$cat->cat_ID}&numberposts=10&orderby=post_date&order=ASC");
        if ($current_posts) {
            foreach ($current_posts as $current_post) {
                ?>
                <li><span></span><a href='<?php echo post_permalink($current_post->ID); ?>'>
                        <?php echo $current_post->post_title; ?>
                    </a></li>
            <?php
            }
        }
        ?>
    </ul>
</div>
