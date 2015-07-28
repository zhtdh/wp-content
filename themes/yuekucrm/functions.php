<?php
//注册菜单
if( function_exists('register_nav_menus') ){
    register_nav_menus(
        array(
            'primary' => __( '主导航菜单' ),
        )
    );
}

//注册侧边栏
if ( function_exists('register_sidebar') ) {
	  register_sidebar(array(
        'name'=>'首页侧边栏',
        'before_widget' => '<li id="%1$s" class="sidebar_li %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
  ));
 }
//缩略图功能
add_theme_support('post-thumbnails');



/* Pagenavi */
/*
function pagenavi( $before = '', $after = '', $p = 2 ) {  // $p是有效范围
    if ( is_singular() ) return;
    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ( $max_page == 1 ) return;
    if ( empty( $paged ) ) $paged = 1;  // 当前页
    echo $before.'<div id="pagenavi" style="text-align: center;clear:both;"> <ul class="pagination block-shadow"> '."\n";
    echo '<span class="pages">页面: ' . $paged . '/' . $max_page . ' </span> ';
    if ( $paged > 1 ) p_link( $paged - 1, '上1页', '<i class="glyphicon glyphicon-fast-backward"></i>' );
    if ( $paged > $p + 1 ) p_link( 1, '第1页' );
    if ( $paged > $p + 2 ) echo '... ';
    for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
        if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span>" : p_link( $i );
    }
    if ( $paged < $max_page - $p - 1 ) echo '... ';
    if ( $paged < $max_page - $p ) p_link( $max_page, '最后页' );
    if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '<i class="glyphicon glyphicon-fast-forward"></i>' );
    echo '</ul></div>'.$after."\n";
}
*/
function p_link( $i, $title = '', $linktype = '' ) {
    if ( $title == '' ) $title = "第{$i}页";
    if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
    echo "<a class='page-numbers' href='" . esc_html( get_pagenum_link( $i ) ) . "' title='{$title}'>{$linktext}</a>";
}
function pagenavi($before = '', $after = '', $p = 2 ) {  // $p是有效范围
    if ( is_singular() ) return;
    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;
    if ( $max_page == 1 ) return;
    if ( empty( $paged ) ) $paged = 1;  // 当前页
    echo $before.'<div id="pagenavi" style="text-align: center;clear:both;"> <ul class="pagination block-shadow"> '."\n";
    echo '<span class="pages">页面: ' . $paged . '/' . $max_page . ' </span> ';
    if ( $paged > 1 ) p_link( $paged - 1, '上1页', '上一页' );
    if ( $paged > $p + 1 ) p_link( 1, '第1页' );
    if ( $paged > $p + 2 ) echo '... ';
    for( $i = $paged - $p; $i <= $paged + $p; $i++ ) {
        if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span>" : p_link( $i );
    }
    if ( $paged < $max_page - $p - 1 ) echo '... ';
    if ( $paged < $max_page - $p ) p_link( $max_page, '最后页' );
    if ( $paged < $max_page ) p_link( $paged + 1,'下一页', '下一页' );
    echo '</ul></div>'.$after."\n";
}
/*
function p_link( $i, $title = '', $linktype = '' ) {
    if ( $title == '' ) $title = "第{$i}页";
    if ( $linktype == '' ) { $linktext = $i; } else { $linktext = $linktype; }
    echo "<a class='page-numbers' href='" . esc_html( get_pagenum_link( $i ) ) . "' title='{$title}'>{$linktext}</a>";
}
*/

function get_the_thumbnail_src()
{
    global $post;
    if (has_post_thumbnail()) {
        //如果存在缩略图读取之
        //echo '<a href="' . get_permalink () . '" title="'.trim ( strip_tags ( $post->post_title ) ).'">';
        $domsxe = simplexml_load_string(get_the_post_thumbnail());
        return $domsxe->attributes()->src;
        //$thumbnailsrc = $domsxe->attributes()->src;
        //echo '<img class="container img-responsive" src="' . $thumbnailsrc . '" alt="' . trim(strip_tags($post->post_title)) . '" />';
        //echo '</a>';
    } else {
        //读取文章第一张图片为缩略图
        $content = $post->post_content;
        preg_match_all('/<img.*?(?: |\\t|\\r|\\n)?src=[\'"]?(.+?)[\'"]?(?:(?: |\\t|\\r|\\n)+.*?)?>/sim', $content, $strResult, PREG_PATTERN_ORDER);
        $n = count($strResult [1]);
        if ($n > 0) {
            //文章第一张图片
            //echo '<a href="' . get_permalink () . '" title="'.trim ( strip_tags ( $post->post_title ) ).'"><img src="' . $strResult [1] [0] . '" /></a>';
            //echo '<img class="container img-responsive" src="' . $strResult [1] [0] . '" />';
            return $strResult [1][0];
        } else {
            //如果文章没有图片则读取默认图片
            //echo '<a href="' . get_permalink () . '" title="'.trim ( strip_tags ( $post->post_title ) ).'"><img src="' . get_bloginfo ( 'template_url' ) . '/images/logo.gif" /></a>';
            //echo '<img class="container img-responsive" src="' . get_bloginfo('template_url') . '/images/minilogo.png"/>';
            return '#';
        }
    }
}
?>
