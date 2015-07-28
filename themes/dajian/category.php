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

        <div class="yshwl_nr">
            <div style="text-align:center; margin-top:10px;"></div>
            <div class="yshwl_nrlb">
                <ul>
                    <?php
                    $the_query = new WP_Query('cat=' . $cur_cat->cat_ID . '&posts_per_page=' . '3' . '&paged=' . get_query_var('paged', 1)); //$_GET["paged"]);
                    //$wp_query = new WP_Query('cat=' . $cur_cat->cat_ID . '&posts_per_page='. get_option('posts_per_page')); //$_GET["paged"]);
                    if ($the_query->have_posts()) {
                        $l_index = 0;
                        do {
                            $l_index += 1;
                            $the_query->the_post();
                            ?>
                            <li>
                                <span><?php the_time('Y年n月j日'); ?></span>
                                <a class="a4" target="_blank" title="<?php the_title(); ?>"
                                   href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php
                        } while ($the_query->have_posts());
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