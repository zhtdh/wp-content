<?php get_header(); ?>

<?php get_sidebar(1); ?>
    <div class="main_right">
        <?php
        if (is_category()) {
        $cur_cat = get_category(get_query_var('cat'));
        ?>
        <p class="Stitle">
            <font style="float:right; margin-right:10px;">您当前的页面是：
                <a href="/">首页</a> &gt;
                <a href="<?php echo get_category_link($cur_cat->cat_ID); ?>"><?php echo $cur_cat->name; ?></a>
            </font>
            <span><?php echo $cur_cat->name; ?></span>
        </p>

        <div class="partners_nr">
            <div style="text-align:center; margin-top:10px;"></div>
            <div class="yshwl_nrlb">
                <ul>
                    <?php
                    $wp_query = new WP_Query('cat=' . $cur_cat->cat_ID . '&posts_per_page=' . '9' . '&paged=' . get_query_var('paged', 5)); //$_GET["paged"]);

                    //$wp_query = new WP_Query('cat=' . $cur_cat->cat_ID . '&posts_per_page='. get_option('posts_per_page')); //$_GET["paged"]);
                    if ($wp_query->have_posts()) {
                        $l_index = 0;
                        do {
                            $l_index += 1;
                            $wp_query->the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <img width="160" height="120" src="<?php echo get_the_thumbnail_src(); ?>">
                                </a>
                            </li>
                        <?php
                        } while ($wp_query->have_posts());
                    } else {
                        echo " 嘿！暂时没有数据，过段时间再来看看吧。 <p> &nbsp;";
                    }
                    }
                    ?>

                </ul>
                <?php pagenavi(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>