<br>
-------------------category -------------
<br>

<?php if (is_category('product')) : ?>
    <p>This is the text to describe product</p>
<?php elseif (is_category('company')) : ?>
    <p>This is the text to describe comapny</p>
<?php else : ?>
    <p>This is some generic text to describe all other category pages,
        I could be left blank</p>
<?php endif; ?>

<hr/>
<p>Category: <?php single_cat_title(); ?></p>

<?php
if(is_category()) {
    $cur_cat = get_category(get_query_var('cat'));
    $the_query = new WP_Query( 'cat='.$cur_cat->cat_ID.'&posts_per_page=3' );
    echo('下面帖子：');
    while ( $the_query->have_posts() ) {
        $the_query->the_post();

        ?>
        <br/>
        <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>

    <?php
    }

    echo('<hr/>子栏目：');
    //echo  wp_list_categories('orderby=id&show_count=1&hide_empty=0&use_desc_for_title=0&child_of='.$cur_cat->cat_ID );


    //$variable = wp_list_categories('style=list&echo=0&show_count=1&title_li=');
    //echo $variable;

    // --------
echo 'current cat: is ' . $cur_cat->cat_ID;
$categories = get_categories( [
    'orderby' => 'name',
    'parent' => $cur_cat->cat_ID,
    'hide_empty' => 0
] );
foreach ( $categories as $category ) {
    echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a><br/>';
}


}