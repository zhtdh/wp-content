<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-3
 * Time: 上午10:35
 */
get_header();
?>
<div class="category-container">
    <?php
    ?>
    <img src="<?php bloginfo('template_url'); ?>/images/<?php
    if (in_category('msk')) {
        echo 'imgMaersk.jpg';
    } else {
        echo 'banner3.jpg';
    }
    ?>">
    <?php
    //取分类目录left-sidebar
    get_sidebar(1);
    if (in_category(['business', 'msk'])) {
        //此处定义 $business_db 数据库链接
        include_once('dbconnect.php');
        $business_db = new PDO($oracle_connectStr, $oracle_connectName, $oralce_connectPW);
        include($post->post_content);
        $business_db = null;
        //echo '关闭';
    } else {
        ?>

        <div class="category-right">
            <h1 class="h7line"><?php single_post_title();?></h1>

            <p>
                <?php
                echo $post->post_content;
                ?>
            </p>
        </div>
    <?php } ?>
</div>
singlesinglesinglesinglesinglesingle