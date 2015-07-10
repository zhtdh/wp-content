<div style="width: 330px; float: right;margin:0px;padding:0px;">

    <div class="notice">
        <div class="notice_list_caption"><h1><?php $cat = get_category_by_slug('news-notice');
                echo $cat->cat_name; ?></h1></div>
        <div class="notice_more"><a href="<?php echo home_url(); ?>/category/<?php echo $cat->slug; ?>">更多&gt;&gt;</a>
        </div>

        <ul class="list-note">
            <?php

            $wp_query = new WP_Query('category_name=' . 'news-notice' . '&posts_per_page=9&paged=1');
            $index = 0;
            if (have_posts()) {
                do {
                    the_post();
                    $index++; ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php echo mb_strimwidth($post->post_title, 0, 35, '...'); ?></a>
                    </li>
                <?php
                } while (have_posts());
            }
            ?>
        </ul>
    </div>

</div>