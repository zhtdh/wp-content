<div class="articles_list">
    <div class="articles_list_caption">
        <h1 style="margin-top: 0px">
            <?php
            $cat = get_category_by_slug('news-inside');
            echo $cat->cat_name;
            ?>
        </h1>
    </div>
    <div class="articles_list_more">
        <a href="<?php echo home_url(); ?>/category/<?php echo $cat->slug; ?>">更多&gt;&gt;</a>
    </div>
    <div style="padding-top:10px;margin-bottom:8px;">
        <ul class="list-note">
            <?php

            $wp_query = new WP_Query('category_name=' . 'news-inside' . '&posts_per_page=9&paged=1');
            $index = 0;
            if (have_posts()) {
                do {
                    the_post();
                    $index++; ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth($post->post_title, 0, 69, '...'); ?></a>
                    </li>
                <?php
                } while (have_posts());
            }

            ?>
        </ul>
    </div>
</div>
