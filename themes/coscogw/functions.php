<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-6
 * Time: 上午7:51
 */
add_theme_support('post-thumbnails');
function get_the_thumbnail()
{
    global $post;
    if (has_post_thumbnail()) {
        //如果存在缩略图读取之
        //echo '<a href="' . get_permalink () . '" title="'.trim ( strip_tags ( $post->post_title ) ).'">';
        $domsxe = simplexml_load_string(get_the_post_thumbnail());
        $thumbnailsrc = $domsxe->attributes()->src;
        echo '<img class="container img-responsive" src="' . $thumbnailsrc . '" alt="' . trim(strip_tags($post->post_title)) . '" />';
        //echo '</a>';
    } else {
        //读取文章第一张图片为缩略图
        $content = $post->post_content;
        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
        $n = count($strResult [1]);
        if ($n > 0) {
            //文章第一张图片
            //echo '<a href="' . get_permalink () . '" title="'.trim ( strip_tags ( $post->post_title ) ).'"><img src="' . $strResult [1] [0] . '" /></a>';
            echo '<img class="container img-responsive" src="' . $strResult [1] [0] . '" />';
        } else {
            //如果文章没有图片则读取默认图片
            //echo '<a href="' . get_permalink () . '" title="'.trim ( strip_tags ( $post->post_title ) ).'"><img src="' . get_bloginfo ( 'template_url' ) . '/images/logo.gif" /></a>';
            echo '<img class="container img-responsive" src="' . get_bloginfo('template_url') . '/images/minilogo.png"/>';
        }
    }
}

?>