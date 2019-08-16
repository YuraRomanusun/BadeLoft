<?php

//custom CPT
add_action('init', 'register_cpt');

function register_cpt() {

    register_post_type('mycpt', array(
        'labels' => array(
            'name' => 'My Cpt',
            'singular_name' => 'My Cpt',
            'add_new' => 'Add New My Cpt',
            'add_new_item' => 'Add New My Cpt',
            'edit_item' => 'Edit My Cpt',
            'new_item' => 'New My Cpt',
            'all_items' => 'All My Cpt',
            'view_item' => 'View My Cpt',
            'search_items' => 'Search My Cpt',
            'not_found' => 'Not found My Cpt',
            'not_found_in_trash' => 'No found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'My Cpt'
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'mycpt'),
        'has_archive' => true,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'capability_type' => 'page',
        'query_var' => true,
        'menu_icon' => 'dashicons-flag',
    ));

    //custom taxonomy attached to jobs CPT
    $taxarr = array(
        'label' => 'mytax',
        'public' => true,
        'hierarchical' => true,
        'show_in_nav_menus' => true,
        'args' => array('orderby' => 'term_order'),
        'query_var' => true,
        'show_ui' => true,
        'rewrite' => array('slug' => 'mytax'),
        'show_admin_column' => true,
        //tax labels
        'labels' => array(
            'name' => 'My Tax',
            'singular_name' => 'My Tax',
            'search_items' => 'Search My Tax',
            'popular_items' => 'Popular My Tax',
            'all_items' => 'All cities',
            'parent_item' => 'Parent My Tax',
            'edit_item' => 'Edit My Tax',
            'update_item' => 'Update My Tax',
            'add_new_item' => 'Add New My Tax',
            'new_item_name' => 'New My Tax',
            'separate_items_with_commas' => 'Separate My Taxes with commas',
            'add_or_remove_items' => 'Add or remove My Tax',
            'choose_from_most_used' => 'Choose from most used My Taxes'
        )
    );
    register_taxonomy('mytax', 'mycpt', $taxarr);

    // flush_rewrite_rules();
}
