<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="<?php bloginfo('keywords'); ?>" />
    <title>
        <?php
        if ( is_home() ) {  bloginfo('name');    }
        elseif ( is_category() ) {  single_cat_title();    }
        elseif (is_single() || is_page() ) {  single_post_title();   }
        elseif (is_search() ) { echo "搜索结果"; echo " - "; bloginfo('name'); }
        elseif (is_404() ) { echo '页面未找到!';  }
        else { wp_title('',true);   }
        ?>
    </title>
    <link href=" <?php bloginfo('stylesheet_url'); ?> "  />
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/main.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/ex.css" rel="stylesheet">
    <script src="<?php bloginfo('template_url'); ?>/js/jquery11.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>
    <style>
        .bc-menulist {
            text-align:center;
            letter-spacing:2px;
        }
    </style>
</head>
<body>
<br/>


<div class="container">
    <div class="row">
        <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="logo">
        <div style="float:right; padding-top: 40px; margin-right: 15px;" >
            <a href="/wp-admin" ><span style="font-size: large; " class="glyphicon glyphicon-user"></span></a>
        </div>
    </div>

    <div class="row" style="line-height:40px; height:40px;font-size: 12px;">
        <nav class="navbar navbar-default navbar-static-top nav-background " role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

<?php
$menu_items = wp_get_nav_menu_items('navmenu');
$cacheMenu=[];
foreach ($menu_items as $iFor){
    if ($iFor->menu_item_parent == "0"){
        $cacheMenu[$iFor->ID] = $iFor;
        $cacheMenu[$iFor->ID]->children=[];
    }
}
foreach ($menu_items as $iFor){
    if ( $iFor->menu_item_parent != "0"){
        if ( array_key_exists($iFor->menu_item_parent, $cacheMenu) ){
            $cacheMenu[$iFor->menu_item_parent]->children[] = $iFor;
        }
    }
}
?>
                        <?php foreach ($cacheMenu as $iNavMenu) : ?>
                            <?php if (count($iNavMenu->children) > 0) :?>
                                <li class="dropdown nav-item">
                                    <a href="<?php echo $iNavMenu->url ?>" class="dropdown-toggle"  data-toggle="dropdown"> <?php echo $iNavMenu->title ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu nav-menu-color" role="menu">
                                        <?php foreach($iNavMenu->children as $iNavMenuSub) : ?>
                                            <li class="bc-menulist"><a href="<?php echo $iNavMenuSub->url ?>"> <?php echo $iNavMenuSub->title ?> </a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </li>
                            <?php else : ?>
                                <li class="nav-item"><a href="<?php echo $iNavMenu->url ?> "><?php echo $iNavMenu->title ?> </a></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
    </div> <!-- nva -->
