<div class="list-group block-shadow">
    <a href="#/sec" class="list-group-item active" style="font-size: 12px;">
        快速导航
    </a>

<?php

    $cur_cat = get_category(get_query_var('cat'));

    $categories = get_categories( [
        'orderby' => 'name',
        'parent' => $cur_cat->parent,
        'hide_empty' => 0
    ]);
    foreach ( $categories as $category ) {
    ?>
    <a href="<?php echo get_category_link($category->term_id); ?>" class="list-group-item">
        <i class="glyphicon glyphicon-forward primary-color"></i> <?php echo $category->name ?> </a>
    <?php } ?>
</div>

