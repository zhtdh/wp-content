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
        if (have_posts()) {
            the_post();
            the_content();
            $imglink = get_post_meta(get_the_ID(), 'linkimage', true);
            if (!empty($imglink)) {
                echo("<img class='thumb' src='$imglink' alt=''/> ");
            }
        }

        ?>
    </div>
    pagepagepagepagepagepagepagepagepage
<?php get_footer(); ?>