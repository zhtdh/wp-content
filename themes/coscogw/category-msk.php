<?php
/**
 * Created by PhpStorm.
 * User: zhangtao
 * Date: 15-6-25
 * Time: 下午4:22
 */
get_header();
//include_once('header.php');
?>
    <div class="category-container">
        <img src="<?php bloginfo('template_url'); ?>/images/imgMaersk.jpg">
        <?php
        //取分类目录left-sidebar
        get_sidebar(1);
        ?>
        <div class="DRight">    <!-- 首页mask -->
            <div style="margin-left: 10px;">
                <table cellspacing="0" cellpadding="0"
                       background="<?php bloginfo('template_url'); ?>/images/maerskbk.jpg" width="697" height="500"
                       style="-moz-border-radius: 15px; -webkit-border-radius: 15px;">

                    <tbody>
                    <tr>
                        <td align="center" width="350" style="line-height: 60px;">

                            <a href="<?php echo home_url(); ?>/?p=117"
                               style="font-size:24px; font-weight: bold; padding: 20px 60px; border: 1px solid #84bbf3; background-color: #66c4dd; -moz-border-radius: 15px; -webkit-border-radius: 15px;">提单查询</a>

                        </td>
                        <td align="center" width="350" style="line-height: 60px;">
                            <a href="<?php echo home_url(); ?>/?p=118"
                               style="font-size:24px; font-weight: bold; padding: 20px 60px; border: 1px solid #84bbf3; background-color: #66c4dd; -moz-border-radius: 15px; -webkit-border-radius: 15px;">单箱查询</a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="350" style="line-height: 60px;">
                            <a href="<?php echo home_url(); ?>/?p=119"
                               style="font-size:24px; font-weight: bold; padding: 20px 60px; border: 1px solid #84bbf3; background-color: #66c4dd; -moz-border-radius: 15px; -webkit-border-radius: 15px;">实时盘存</a>

                        </td>
                        <td align="center" width="350" style="line-height: 60px;">
                            <a href="<?php echo home_url(); ?>/?p=120"
                               style="font-size:24px; font-weight: bold; padding: 20px 60px; border: 1px solid #84bbf3; background-color: #66c4dd; -moz-border-radius: 15px; -webkit-border-radius: 15px;">最新通知</a>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="350" style="line-height: 60px;">
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="350" style="line-height: 60px;">
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="350" style="line-height: 60px;">
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" width="350" style="height: 150px;">
                        </td>
                        <td>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    category-msk/category-msk/category-mskcategory-mskcategory-mskcategory-mskcategory-mskcategory-msk
<?php get_footer(); ?>