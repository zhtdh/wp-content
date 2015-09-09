<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-3
 * Time: 上午10:35
 */
if (get_the_title() == '注销') {
    $fromurl = empty($_GET['fromurl']) ? home_url() : $_GET['fromurl'];
    session_start();
    $_SESSION['ship-query'] = null;
    $_SESSION['EMPLOYEENO'] = null;
    Header("HTTP/1.1 303 See Other");
    Header("Location: $fromurl");
    exit;
}
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