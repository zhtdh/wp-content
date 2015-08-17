<?php get_header();
$cur_cat = get_the_category(get_the_ID());
$cur_post = get_page(get_the_ID());
?>

<p class="Stitle">
    <font style="float:right; margin-right:10px;">您当前的页面是：
        <a href="/">首页</a> &gt;
        <a href="<?php echo get_category_link($cur_cat[0]->cat_ID); ?>"><?php echo $cur_cat[0]->name; ?></a>
    </font>

</p>

            <div class="block-border-all block-shadow" style="min-height:600px; width:100%;padding:20px;">

                <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> ---------  <?php the_time('Y年n月j日') ?>    </h3>

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

            </div>




</td>

<!-- here to close header -->

</tr>
</tbody>
</table>











<?php get_footer(); ?>
