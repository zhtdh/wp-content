<?php
?>


<?php
get_header();
?>


        <table class="table table-hover block-shadow">
            <thead> <tr>
                <th style="width:60px;">#</th>
                <th style="width:auto;text-align: left;">标题</th>
                <th style="width:200px;">发布时间</th>
            </tr> </thead>

            <tbody>
            <?php
            if(is_category()) {
                $cur_cat = get_category(get_query_var('cat'));
                $the_query = new WP_Query('cat=' . $cur_cat->cat_ID . '&posts_per_page='. get_option('posts_per_page').  '&paged=' . get_query_var('paged', 5)); //$_GET["paged"]);
                if ($the_query->have_posts()) {
                    $l_index = 0;
                    do {
                        $l_index += 1;
                        $the_query->the_post();
                    ?>
                    <tr>
                        <td scope="row"> <?php echo $l_index;?> </td>
                        <td><a href ="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                        <td><?php  the_date() ?></td>
                    </tr>
                    <?php
                    } while ($the_query->have_posts());
                }
                else {
                    echo "<tr><td></td><td><br/> 嘿！暂时没有数据，过段时间再来看看吧。 <p> &nbsp; </td></tr>";
                }
            }
            ?>
            </tbody>
        </table>

        <?php pagenavi(); ?>

        <!-- here to close header --> 
      
</tr>
</tbody>
</table>
categorycategorycategorycategorycategory
