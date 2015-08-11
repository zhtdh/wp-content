<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-3
 * Time: 上午10:35
 */
get_header();
?>
    <div class="page-container">
        <?php
        if (get_the_title() == '在线留言') {
            include($post->post_content);
        } else {
            if (have_posts()) {
                the_post();
                the_content();
                $imglink = get_post_meta(get_the_ID(), 'linkimage', true);
                if (!empty($imglink)) {
                    echo("<img class='thumb' src='$imglink' alt=''/> ");
                }
            }
        }
        ?>
    </div>

<?php get_footer(); ?>