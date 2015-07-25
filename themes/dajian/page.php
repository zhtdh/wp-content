<?php get_header(); ?>

<?php get_sidebar(1); ?>
    <div class="main_right">
        <p class="Stitle">
            <font style="float:right; margin-right:10px;">您当前的页面是：
                <a href="/">首页</a> &gt;
                <a href="<?php echo get_page_link(); ?>"><?php echo get_the_title(); ?></a>
            </font>
            <span><?php echo get_the_title(); ?></span>
        </p>
        <?php
        if (get_the_title() == '在线留言') {
            include('message.php');
        }
        else{
            ?>
            <div class="about_nr">
                <?php echo get_page(get_the_ID())->post_content; ?>
            </div>

        <?php

        }
        ?>
    </div>
<?php get_footer(); ?>