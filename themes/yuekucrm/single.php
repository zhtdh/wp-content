<?php get_header(); ?>

<br>-------------------single -------------<br>

<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<?php the_tags('标签：', ', ', ''); ?>

<?php the_time('Y年n月j日') ?>


<?php
if( have_posts() ){
    the_post();
    the_content();
    $imglink = get_post_meta( get_the_ID(), 'linkimage', true );
    if( !empty( $imglink ) ) {
        echo("<img class='thumb' src='$imglink' alt=''/> ");
    }
}
?>




<p class="clearfix"> <a href="<?php echo get_option('home'); ?>" class="button float" >&lt;&lt; 返回首页</a>

    <?php get_sidebar(); ?>


