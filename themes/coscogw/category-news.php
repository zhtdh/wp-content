<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-5
 * Time: 下午5:22
 */
get_header();
//include_once('header.php');
?>
    <div style="margin: 0 auto;overflow: hidden;text-align: left;width: 970px;">
        <?php
        include('news-company.php');
        include('news-notice.php');
        if (localrequest()){
        ?>
        <div style="float: left; width: 620px;border:0; margin:0; padding:0; margin-top:10px">
            <?php
            include('news-inside.php');
            }
            ?>
        </div>
    </div>
    <br>
<?php get_footer(); ?>