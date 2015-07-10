<div style="width: 620px;padding: 0;margin: 0;border: 0">
    <div class="articles">
        <div class="articles_caption">
            <h1 style="margin-top: 0px">
                <?php
                $cat = get_category_by_slug('news-company');
                echo $cat->cat_name;
                ?>
            </h1>
        </div>
        <div class="articles_more">
            <a href="<?php echo home_url(); ?>/category/<?php echo $cat->slug; ?>/">更多&gt;&gt;</a>
        </div>
        <div class="articles_content" style="width: 250px;">
            <div class="news_carousel">
                <div data-ride="carousel" class="carousel slide" id="carousel-container">
                    <div class="carousel-inner">
                        <?php

                        $wp_query = new WP_Query('category_name=' . 'news-company' . '&posts_per_page=9&paged=1');
                        $index = 0;
                        if (have_posts()) {
                            do {
                                the_post();
                                $index++; ?>
                                <div
                                    class="item <?php echo $wp_query->current_post == 1 ? 'active' : ''; ?>">
                                    <?php get_the_thumbnail(); ?>
                                    <div style="position: relative;bottom: 1px;">
                                        <h6 style="text-align: center"><?php echo the_title(); ?></h6>
                                    </div>
                                </div>
                            <?php
                            } while (have_posts());
                        }

                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="articles_imagelist_right">
        <div class="articles_imagelist_right_top"></div>
        <div style="float:left;width:310px;margin-right:12px;padding-top:15px;margin-bottom:8px;">
            <ul class="list1_9">
                <?php
                if (is_category()) {
                    $wp_query = new WP_Query('category_name=' . 'news-company' . '&posts_per_page=9&paged=1');
                    if (have_posts()) {
                        do {
                            the_post(); ?>
                            <li>
                                <span> <?php echo '[' . substr($post->post_date, 2, 8) . ']'; ?></span>
                                <a href="<?php the_permalink(); ?>"
                                   target="_blank"><?php echo mb_strimwidth($post->post_title, 0, 35, '...'); ?></a>
                            </li>
                        <?php
                        } while (have_posts());
                    }
                }
                ?>
            </ul>

        </div>
    </div>
</div>

