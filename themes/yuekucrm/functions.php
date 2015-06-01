<?php
//注册菜单
if( function_exists('register_nav_menus') ){
    register_nav_menus(
        array(
            'primary' => __( '主导航菜单' ),
        )
    );
}
