<?php

// Login area branding styles
function css_login_vova() {
    wp_enqueue_style( 'wp_vova', theme('include/wpadmin/login.css'), false );
}
add_action( 'login_enqueue_scripts', 'css_login_vova', 10 );

// Admin area branding styles
function css_admin_vova() {
    wp_enqueue_style( 'wp_vova', theme('include/wpadmin/admin_vova.css'), false );
}
add_action( 'init', 'css_admin_vova', 10 );

