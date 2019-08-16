<?php
require_once 'include/plugins/init.php';
require_once('include/wpadmin/admin-addons.php');
//require_once('include/cpt.php');

add_image_size( 'gal_big', '977', '597', true );
add_image_size( 'gal_small', '475', '360', true );
add_image_size( 'single_illustration', '1000', '', false );

//Remove default woocommerce sort
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

function woocommerce_comments_custom( $comment, $args, $depth ) {
    //var_dump($comment);
    $noHideContent = substr($comment->comment_content, 0, 120);
    $hideContent = substr($comment->comment_content, 120);
    $ellipsis = $hideContent != "" ? '<span class="ellipsis">...</span>' : '';
    $comment->comment_content = '<div class="readmore">'.$noHideContent.$ellipsis.'<span class="moreText">'.$hideContent.'</span></div>';
    //$comment->comment_content = $noHideContent;
    //$comment->comment_content .= do_shortcode('[wpex more="Read more" less="Read less"]'.$hideContent.'[/wpex]');
		$GLOBALS['comment'] = $comment;
		wc_get_template( 'single-product/review.php', array( 'comment' => $comment, 'args' => $args, 'depth' => $depth ) );
	}

function patricks_woocommerce_catalog_orderby( $orderby ) {
    $orderby["price"] = __('Price: Low to High', 'woocommerce');
    $orderby["price-desc"] = __('Price: High to Low', 'woocommerce');
    $orderby["date"] = __('Newest Arrivals', 'woocommerce');
    $orderby["rating"] = __('Avg. Customer Review', 'woocommerce');
    $orderby["popularity"] = __('Relevance', 'woocommerce');
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "patricks_woocommerce_catalog_orderby", 20 );

function remove_wc_product_cart_buttons($quantity, $product) {
    return sprintf( '<a href="%s" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s">%s</a>',
        esc_url( $product->add_to_cart_url() ),
        esc_attr( $product->id ),
        esc_attr( $product->get_sku() ),
        esc_attr( 1 ),
        $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
        esc_attr( $product->product_type ),
        esc_html( $product->add_to_cart_text() )
    );
}
add_filter('woocommerce_loop_add_to_cart_link', 'remove_wc_product_cart_buttons', 10, 2);

function getTitleTab($name, $id)
{
	$titleTabId = get_field($name, $id);
	if($titleTabId != "" && $titleTabId != null && $titleTabId != " ")
    {
        return $titleTabId;
    }
    else
    {
	    $titleTabOpt = get_field($name, 'option');
        return $titleTabOpt;
    }
}
function getOrderTab($name, $id)
{
	$orderTab = get_field($name, $id);
	if($orderTab != "" && $orderTab != null && $orderTab != " ")
	{
		return $orderTab;
	}
	else
	{
		$orderTabOpt = get_field($name, 'option');
		return $orderTabOpt;
	}
}

function getRemoveTab($name, $id)
{
	$removeTab = get_field($name, $id);
	if($removeTab)
	{
		return $removeTab;
	}
	else
	{
		$orderTabOpt = get_field($name, 'option');
		return $orderTabOpt;
	}
}


add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    global $product;
    $prodID = $product->id;
    unset( $tabs['description'] );      	// Remove the description tab
    //unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
	$titleTab = getTitleTab('seventh_tab', $prodID);
	$orderTab = getOrderTab('seventh_tab_order', $prodID);
    $tabs['reviews']['title'] = __( $titleTab );
    $tabs['reviews']['priority'] = $orderTab;
	if(getRemoveTab("seventh_tab_remove", $prodID)) unset( $tabs['reviews'] );
	$titleTab = getTitleTab('first_tab', $prodID);
	$orderTab = getOrderTab('first_tab_order', $prodID);
    //$tabs['description']['title'] = __( $titleTab );
    //$tabs['description']['priority'] = $orderTab;
    //$tabs['description']['callback'] = 'woo_description_tab_content';
	//if(getRemoveTab("first_tab_remove", $prodID)) unset( $tabs['description'] );
	$titleTab = getTitleTab('second_tab', $prodID);
	$orderTab = getOrderTab('second_tab_order', $prodID);
    //$tabs['additional_information']['title'] = __( $titleTab );
    //$tabs['additional_information']['priority'] = $orderTab;
    //$tabs['additional_information']['callback'] = 'woo_additional_information_tab_content' ;
	//if(getRemoveTab("second_tab_remove", $prodID)) unset( $tabs['additional_information'] );
	//$titleTab = getTitleTab('third_tab', $prodID);
	//$orderTab = getOrderTab('third_tab_order', $prodID);
    /*$tabs['videos'] = array(
        'title' 	=> __( $titleTab, 'woocommerce' ),
        'priority' 	=> $orderTab,
        'callback' 	=> 'woo_videos_tab_content'
    );*/
	//if(getRemoveTab("third_tab_remove", $prodID)) unset( $tabs['videos'] );
    //$titleTab = getTitleTab('fourth_tab', $prodID);
	//$orderTab = getOrderTab('fourth_tab_order', $prodID);
    /*$tabs['stone_resin_characteristics'] = array(
        'title' 	=> __( $titleTab, 'woocommerce' ),
        'priority' 	=> $orderTab,
        'callback' 	=> 'woo_stone_resin_characteristics_tab_content'
    );*/
	//if(getRemoveTab("fourth_tab_remove", $prodID)) unset( $tabs['stone_resin_characteristics'] );
    //$titleTab = getTitleTab('fifth_tab', $prodID);
	//$orderTab = getOrderTab('fifth_tab_order', $prodID);
    /*$tabs['renderer'] = array(
        'title' 	=> __( $titleTab, 'woocommerce' ),
        'priority' 	=> $orderTab,
        'callback' 	=> 'woo_renderer_tab_content'
    );*/
	//if(getRemoveTab("fifth_tab_remove", $prodID)) unset( $tabs['renderer'] );
    //$titleTab = getTitleTab('sixth_tab', $prodID);
	//$orderTab = getOrderTab('sixth_tab_order', $prodID);
    /*$tabs['customer_photos'] = array(
        'title' 	=> __( $titleTab, 'woocommerce' ),
        'priority' 	=> $orderTab,
        'callback' 	=> 'woo_customer_photos_tab_content'
    );*/
	//$titleTab = getTitleTab('ninth_tab', $prodID);
	//$orderTab = getOrderTab('ninth_tab_order', $prodID);
	//if(getRemoveTab("ninth_tab_remove", $prodID)) unset( $tabs['customer_photos'] );
	/*$tabs['illustration'] = array(
		'title' 	=> __( $titleTab, 'woocommerce' ),
		'priority' 	=> $orderTab,
		'callback' 	=> 'woo_illustration_tab_content'
	);*/
	//if(getRemoveTab("ninth_tab_remove", $prodID)) unset( $tabs['illustration'] );
	//if(!get_field('illustrations',$prodID)) unset( $tabs['illustration'] );




    return $tabs;
}

function woo_illustration_tab_content()
{
	global $product;
	$product_id = $product->get_ID();
	//if ($cphoto = get_field('illustrations',$product_id)) { ?>
	<?php if ($cillustration = get_field('illustrations',$product_id)) { $ilCount = 0; ?>
        <div class="illustrations-box">
            <div class="right">
                <?php foreach ($cillustration as $cim) { ?>
                    <?php if ($cim['size'] && $cim['image']) { ?>
                        <figure><img src="<?php echo $cim['image']; ?>" alt=""></figure>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="left flex">
                <div class="range-title">Choose your height</div>
                <div class="range-slider-box">
                    <div id="slider-range" data-heights="<?php foreach ($cillustration as $cCount) {echo "".$cCount['size']." ";} ?>"></div>
                    <!--                <div id="slider-update-value"></div>-->
                    <div class="slider-values">
                        <?php foreach ($cillustration as $cil) { ?>
                            <div><?php echo $cil['size']; ?></div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
	<?php }
	wp_reset_postdata();
}

function woo_customer_photos_tab_content()
{
    global $product;
    $product_id = $product->get_ID();
    if ($cphoto = get_field('customers_photo',$product_id)) { ?>
        <?php
        $queryTab = new WP_Query(array('p' => $cphoto[0], 'post_type' => 'gallery'));
        while ($queryTab->have_posts()) {
            $queryTab->the_post(); ?>
            <a class="c-photos" href="<?php echo get_the_permalink($cphoto[0]); ?>"><p>Customers Project
                    Photos</p><?php the_post_thumbnail(); ?></a>
        <?php } ?>
    <?php }
    wp_reset_postdata();
}

function woo_description_tab_content()
{
    global $product;
    $product_id = $product->get_ID();
    echo "<p>";
    the_content();
    echo "</p>";
    if ($features = get_field("features",$product_id)): ?>
        <div class="sn-features flex">
            <strong><?php echo get_field("features_text",$product_id); ?></strong>
            <ul>
                <?php
                foreach ($features as $feature): ?>
                    <li><a data-fancybox
                           href="<?php echo $feature['features_file']; ?>"><?php echo $feature['title']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;
}

function woo_renderer_tab_content()
{
    global $product;
    $product_id = $product->get_ID();
    if (get_field('image_tech',$product_id) || get_field('3d_model',$product_id)) { ?>
        <div class="sn-tech-char">
            <div>
                <?php /*if (get_field('image_tech', $product_id)) { ?>
                    <div class="left">
                        <img src="<?php echo get_field('image_tech', $product_id); ?>" alt="">
                    </div>
                <?php } */?>
                <?php if (get_field('3d_model',$product_id)) { ?>
                    <div class="right">
                        <iframe src="<?php echo get_field('3d_model', $product_id); ?>" frameborder="0" seamless
                                allowfullscreen="allowfullscreen"></iframe>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}
function woo_stone_resin_characteristics_tab_content()
{
    global $product;
    $product_id = $product->get_ID();
    ?>
    <div class="sr-char separator">
<!--        <h2>--><?php //echo get_field("description_title", $product_id); ?><!--</h2>-->
        <?php echo get_field("description_tech", $product_id); ?>
    </div>
    <?php
}
function woo_videos_tab_content()
{
    global $product;
    $product_id = $product->get_ID();
    ?>
    <?php if (get_field('is_there_a_video',$product_id)): ?>
        <div class="video-covers flex separator">
            <?php foreach (get_field('videos', $product_id) as $video): ?>
                <?php
                $vid = $video['video_link'];
                $vid_ex = explode("v=", $vid);
                $imgurl = 'http://img.youtube.com/vi/' . $vid_ex[1] . '/0.jpg';
                $imgurl = (@file_get_contents($imgurl)) ? $imgurl : 'http://img.youtube.com/vi/' . $vid_ex[1] . '/maxresdefault.jpg';
                $content = file_get_contents("http://youtube.com/get_video_info?video_id=" . $vid_ex[1]);
                parse_str($content, $ytarr);
                ?>
                <a data-fancybox
                   href="<?php echo $video['choice_type'] == 'link' ? $video['video_link'] : $video['video']; ?>"><img
                            src="<?php echo $video['choice_type'] != 'link' ? $video['preview_image'] : $imgurl; ?>"
                            alt=""><span
                            class="video-title"><?php echo $video['choice_type'] = 'link' ? $ytarr['title'] : $video['video_title']; ?></span></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php
}
function woo_additional_information_tab_content() {
    global $product;
    $product_id = $product->get_ID();
    ?>
    <div class="sn-downloads flex">
        <div class="item">
            <table>
                <?php
                $attributes = get_post_meta( $product_id , '_product_attributes' );
                $attributes = $attributes[0];
                foreach($attributes as $attribute):?>
                    <?php if($attribute['value'] != ""): ?>
                        <tr>
                            <th><?php echo $attribute['name']; ?>: </th>
                            <td><?php echo $attribute['value']; ?></td>
                        </tr>
                    <?php endif; endforeach; ?>
            </table>
        </div>
        <div class="item">
            <table class="docs">
                <?php if($download_links = get_field('download_links', $product_id)): ?>
                    <?php foreach($download_links as $key => $download_link): ?>
                        <tr>
                            <?php echo $key == 0 ? '<th rowspan="4">Download:</th>' : ""; ?>
                            <td><a class="alt-download-doc <?php echo $download_link['file_type'] == "PDF" ? "alt-pdf" : "alt-dwg"; ?>" href="<?php if ($download_link['file_type'] == "PDF") { ?>http://docs.google.com/viewerng/viewer?url=<?php echo $download_link['file']; } else {echo $download_link['file'];}  ?>" target="_blank"><?php echo $download_link['title_link']; ?></a></td>
                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>
            </table>
        </div>
        <?php if (get_field('cupc_logo',$product_id)) { ?>
            <div class="item flex">
                <img src="<?php /*echo get_field('image_logo');*/ echo theme('img/cUPC-Logo.png'); ?>" alt="">
            </div>
        <?php } ?>
    </div>
    <?php
}

add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );
function custom_woocommerce_product_add_to_cart_text() {
    global $product;
    $product_type = $product->product_type;
    switch ( $product_type ) {
    case 'variable':
                return __( 'VIEW DETAILS', 'woocommerce' );
            break;
    }
}


add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
    function jk_related_products_args( $args ) {
  	$args['posts_per_page'] = 3; // 3 related products
  	$args['columns'] = 1; // arranged in 1 columns
  	return $args;
}


if ( ! function_exists( 'is_ajax' ) ) {
 /**
  * is_ajax - Returns true when the page is loaded via ajax.
  * @return bool
  */
 function is_ajax() {
  return defined( 'DOING_AJAX' );
 }
}

add_action( 'wp_ajax_loadMoreNewsPress', 'loadMoreNewsPress_ajax');
add_action( 'wp_ajax_nopriv_loadMoreNewsPress', 'loadMoreNewsPress_ajax');
function loadMoreNewsPress_ajax($paged = 1){
    extract($_POST);

    $args = array(
      'post_type' => 'newspress',
      'posts_per_page'  => 4,
      'paged'  => $paged,
      'orderby'  => 'date',
      'order'  => "DESC",
    );
    $posts = new WP_Query($args);

    $npPosts = $posts->posts;
    foreach($npPosts as $npPost):
    ?>
      <div class="item">
          <?php echo get_the_post_thumbnail($npPost); ?>
          <div class="bottom">
              <strong><?php echo get_the_date('F Y',$npPost); ?></strong>
              <h5><?php echo $npPost->post_title; ?></h5>
              <p><?php echo $npPost->post_content; ?></p>
              <a href="<?php echo get_field('link_button', $npPost->ID); ?>"><?php echo get_field('text', $npPost->ID); ?></a>
          </div>
      </div>
    <?php endforeach;

    $num_pages = $posts->max_num_pages;
    if($num_pages != $paged)
    {
      ?><div class="button button-center" id='newspress-more' data-paged="<?php echo $paged+1;?>">Show more</div><?php
    }

    if (is_ajax()) {
        exit();
    }
}



add_action( 'wp_ajax_loadMorePosts', 'loadMorePosts_ajax');
add_action( 'wp_ajax_nopriv_loadMorePosts', 'loadMorePosts_ajax');
function loadMorePosts_ajax($paged = 1, $cat_id = '',$ppp = 4, $ids = ''){
    extract($_POST);

//var_dump("TEST");
    $args = array(
      'post_type' => 'post',
      'posts_per_page'  => $ppp,
      'paged'  => $paged > 1 ? $paged-1 : $paged,
      'orderby'  => 'date',
      'order'  => "DESC",
      'post__not_in'  => unserialize($ids),
      'tax_query' => array(
    		array(
    			'taxonomy' => 'category',
    			'field'    => 'id',
    			'terms'    => $cat_id,
    		),
    	),
    );
    $posts = new WP_Query($args);
    //var_dump($posts);

    if ($posts->have_posts()) : while ($posts->have_posts()) : $posts->the_post(); ?>
        <div class="item">
            <?php if (has_post_thumbnail()) { ?>
                <a class="top" href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                    <div><?php the_author(); ?> | <?php echo get_the_date(); ?></div>
                </a>
            <?php } ?>
            <div class="bottom">
                <h5><?php the_title(); ?></h5>
                <p><?php echo wp_trim_words(get_the_content(), 60); ?></p>
                <a href="<?php the_permalink(); ?>">View article...</a>
                <div class="flex">
                    <div class="tags">
                        <strong>TAGS:</strong>
                        <?php
                        //echo "<pre>";
                        $categories = wp_get_post_terms(get_the_ID(),'category');
                        foreach($categories as $category): ?>
                        <?php //var_dump($category); ?>
                        <a href="<?php echo get_term_link($category->term_id); ?>"><?php echo $category->name; ?> | </a>
                  <?php endforeach; ?>
                    </div>
                    <div class="comments-count">Comments: <?php $comments = wp_count_comments(get_the_ID()); echo $comments->total_comments; ?></div>
                </div>
            </div>
        </div>
    <?php endwhile; endif;
    if($ppp != 4)
    {
      $ids = array();
      foreach($posts->posts as $post)
      {
        array_push($ids, $post->ID);
      }
      echo '<input type="hidden" id="notinids" value="'.serialize($ids).'">';
    }
    $num_pages = $posts->max_num_pages;

    if(($num_pages) == ($paged > 1 ? $paged-1 : $paged) && $ppp == 4)
    {
      echo '<input type="hidden" id="nobutton">';
    }

    if (is_ajax()) {
        exit();
    }
}

function content_btn($atts,$content){
    extract(shortcode_atts(array(
        'text' => 'Learn More',
        'link' => site_url(),
        'class' => false,
        'target' => false
    ), $atts ));
    return '<a href="' . $link . '" class="button'.($class?' '.$class:'').'" '.($target?'target="'.$target.'"':'').'>' . $text . '</a>';
}
add_shortcode("button", "content_btn");


add_action( 'wp_ajax_loadGallery', 'loadGallery' );
add_action( 'wp_ajax_nopriv_loadGallery', 'loadGallery' );
function loadGallery($id = null) {
	extract( $_POST );
	$jsonResult = array();

	ob_start();
    $result = get_field('gallery_gal', $id);
    foreach($result as $key => $item)
    {
        ?>

        <a data-fancybox="gallery-images" href="<?php echo image_src($item['ID'], 'full'); ?>">
            <img data-defer="<?php echo image_src($item['ID'], 'gal_small'); ?>" src="<?php echo wpa_placeholder($item['ID'], 'gal_small'); ?>" alt="<?php echo $item['alt']; ?>" />
        </a>
        
        <?php
    }
	$str                 = ob_get_clean();
    $jsonResult['html']  = utf8_encode( $str );
    
	if ( is_ajax() ) {
		die( json_encode( $jsonResult ) );
	}
	return $jsonResult;
}

function js_variables(){
    $variables = array (
        'ajax_url' => admin_url('admin-ajax.php'),
    );
    echo(
        '<script type="text/javascript">window.wp_data = '.
        json_encode($variables).
        ';</script>'
    );
}
add_action('wp_head','js_variables');

/*CPT Gallery*/ /*NEWS PRESS*/
add_action( 'init', 'add_post_type' );
function add_post_type() {
   //custom taxonomy attached to CPT
   $taxname = 'Category';
   $taxlabels = array(
           'name'                          => $taxname,
           'singular_name'                 => $taxname,
           'search_items'                  => 'Search '.$taxname,
           'popular_items'                 => 'Popular '.$taxname,
           'all_items'                     => 'All '.$taxname.'s',
           'parent_item'                   => 'Parent '.$taxname,
           'edit_item'                     => 'Edit '.$taxname,
           'update_item'                   => 'Update '.$taxname,
           'add_new_item'                  => 'Add New '.$taxname,
           'new_item_name'                 => 'New '.$taxname,
           'separate_items_with_commas'    => 'Separate '.$taxname.'s with commas',
           'add_or_remove_items'           => 'Add or remove '.$taxname.'s',
           'choose_from_most_used'         => 'Choose from most used '.$taxname.'s'
   );
   $labels = array(
           'name' => _x( 'Tags', 'taxonomy general name' ),
           'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
           'search_items' =>  __( 'Search Tags' ),
           'popular_items' => __( 'Popular Tags' ),
           'all_items' => __( 'All Tags' ),
           'parent_item' => null,
           'parent_item_colon' => null,
           'edit_item' => __( 'Edit Tag' ),
           'update_item' => __( 'Update Tag' ),
           'add_new_item' => __( 'Add New Tag' ),
           'new_item_name' => __( 'New Tag Name' ),
           'separate_items_with_commas' => __( 'Separate tags with commas' ),
           'add_or_remove_items' => __( 'Add or remove tags' ),
           'choose_from_most_used' => __( 'Choose from the most used tags' ),
           'menu_name' => __( 'Tags' ),
   );
   $taxarr = array(
           'label'                         => $taxname,
           'labels'                        => $taxlabels,
           'public'                        => true,
           'hierarchical'                  => true,
           'show_in_nav_menus'             => true,
           'args'                          => array( 'orderby' => 'term_order' ),
           'query_var'                     => true,
           'show_ui'                       => true,
           'rewrite'                       => array( 'slug' => 'cat-gal' ),
           'show_admin_column'             => true
   );
   register_taxonomy( 'cat_gal', 'gallery', $taxarr );
   register_taxonomy('tag_gal','gallery',array(
           'hierarchical' => false,
           'labels' => $labels,
           'show_ui' => true,
           'update_count_callback' => '_update_post_term_count',
           'query_var' => true,
           'rewrite' => array( 'slug' => 'tags' ),
   ));
   register_post_type( 'gallery',
           array(
                   'labels' => array(
                           'name' => 'Badeloft Gallery',
                           'singular_name' => 'Badeloft Gallery',
                           'menu_name' => 'Badeloft Gallery'
                   ),
                   'public'                => true,
                   'show_ui'               => true,
                   'show_in_menu'          => true,
                   'supports'              => array( 'title', 'editor', 'thumbnail' ),
                   'rewrite'               => array( 'slug' => 'gal' ),
                   'has_archive'           => true,
                   'hierarchical'          => true,
                   'show_in_nav_menus'     => true,
                   'capability_type'       => 'page',
                   'query_var'             => true,
                   'menu_icon'             => 'dashicons-images-alt',
           ));


    register_post_type( 'Showroom',
        array(
            'labels' => array(
                'name' => 'Showroom',
                'singular_name' => 'Showroom',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New',
                'edit_item' => 'Edit',
                'new_item' => 'New',
                'all_items' => 'All',
                'view_item' => 'View',
                'search_items' => 'Search',
                'not_found' =>  'Not found',
                'not_found_in_trash' => 'No found in Trash',
                'parent_item_colon' => '',
                'menu_name' => 'Showroom'
            ),
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'rewrite'               => array( 'slug' => 'showroom' ),
            'has_archive'           => true,
            'hierarchical'          => true,
            'show_in_nav_menus'     => true,
            'capability_type'       => 'page',
            'query_var'             => true,
            'menu_icon'             => 'dashicons-admin-site',
        ));

      //NEWS PRESS
      register_post_type( 'newspress',
          array(
              'labels' => array(
                  'name' => 'News Press',
                  'singular_name' => 'News Press',
                  'add_new' => 'Add New',
                  'add_new_item' => 'Add New',
                  'edit_item' => 'Edit',
                  'new_item' => 'New',
                  'all_items' => 'All',
                  'view_item' => 'View',
                  'search_items' => 'Search',
                  'not_found' =>  'Not found',
                  'not_found_in_trash' => 'No found in Trash',
                  'parent_item_colon' => '',
                  'menu_name' => 'News Press'
              ),
              'public'                => true,
              'show_ui'               => true,
              'show_in_menu'          => true,
              'supports'              => array( 'title', 'editor', 'thumbnail' ),
              'rewrite'               => array( 'slug' => 'newspress' ),
              'has_archive'           => true,
              'hierarchical'          => true,
              'show_in_nav_menus'     => true,
              'capability_type'       => 'page',
              'query_var'             => true,
              'menu_icon'             => 'dashicons-format-aside',
          ));

    register_post_type( 'infopages',
        array(
            'labels' => array(
                'name' => 'Info Pages',
                'singular_name' => 'Info Page',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New',
                'edit_item' => 'Edit',
                'new_item' => 'New',
                'all_items' => 'All',
                'view_item' => 'View',
                'search_items' => 'Search',
                'not_found' =>  'Not found',
                'not_found_in_trash' => 'No found in Trash',
                'parent_item_colon' => '',
                'menu_name' => 'Info Pages'
            ),
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'supports'              => array( 'title', 'editor', 'thumbnail' ),
            'rewrite'               => array( 'slug' => 'info' ),
            'has_archive'           => true,
            'hierarchical'          => true,
            'show_in_nav_menus'     => true,
            'capability_type'       => 'page',
            'query_var'             => true,
            'menu_icon'             => 'dashicons-admin-site',
        ));

    flush_rewrite_rules();
}



add_action('woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta');

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ($_POST['est_shipp_date']) update_post_meta( $order_id, 'estimated_shipping_date', esc_attr($_POST['est_shipp_date']));
    if ($_POST['billing_contact_method']) update_post_meta( $order_id, 'contact_method', esc_attr($_POST['billing_contact_method']));
}





/* block remove "product_cat" from product category URL */
function filter_term_link( $termlink, $term, $taxonomy ) {
    if ( 'product_cat' != $taxonomy ) {
        return $termlink;
    }
    $termlink = str_replace( '/product-category/', '/', $termlink );
    return $termlink;
};
add_filter( 'term_link', 'filter_term_link', 10, 3 );
/* end of block */
/* Fix request when removed products_cat slug */
add_filter('request', function( $vars ) {
	global $wpdb;
	if( !empty( $vars['pagename'] ) || !empty( $vars['category_name'] ) || !empty( $vars['name'] ) || !empty( $vars['attachment'] ) ) {
		$slug = !empty( $vars['pagename'] ) ? $vars['pagename'] : ( ! empty( $vars['name'] ) ? $vars['name'] : ( !empty( $vars['category_name'] ) ? $vars['category_name'] : $vars['attachment'] ) );
		$exists = $wpdb->get_var( $wpdb->prepare( "SELECT t.term_id FROM $wpdb->terms t LEFT JOIN $wpdb->term_taxonomy tt ON tt.term_id = t.term_id WHERE tt.taxonomy = 'product_cat' AND t.slug = %s" ,array( $slug )));
		if( $exists ){
			$old_vars = $vars;
			$vars = array('product_cat' => $slug );
			if ( !empty( $old_vars['paged'] ) || !empty( $old_vars['page'] ) )
				$vars['paged'] = ! empty( $old_vars['paged'] ) ? $old_vars['paged'] : $old_vars['page'];
		}
	}
	return $vars;
});
/* end of block */


/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

    register_sidebar( array(
        'name'          => 'Home right sidebar',
        'id'            => 'home_right_1',
        'before_widget' => '<div class="widgetSidebar %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );




/**
 * This class can be used to get the most common colors in an image.
 * It needs one parameter:
 * 	$image - the filename of the image you want to process.
 * Optional parameters:
 *
 *	$count - how many colors should be returned. 0 mmeans all. default=20
 *	$reduce_brightness - reduce (not eliminate) brightness variants? default=true
 *	$reduce_gradients - reduce (not eliminate) gradient variants? default=true
 *	$delta - the amount of gap when quantizing color values.
 *		Lower values mean more accurate colors. default=16
 *
 * Author: 	Csongor Zalatnai
 *
 * Modified By: Kepler Gelotte - Added the gradient and brightness variation
 * 	reduction routines. Kudos to Csongor for an excellent class. The original
 * 	version can be found at:
 *
 *	http://www.phpclasses.org/browse/package/3370.html
 *
 */
class GetMostCommonColors
{
	var $PREVIEW_WIDTH    = 150;
	var $PREVIEW_HEIGHT   = 150;
	var $error;
	/**
	 * Returns the colors of the image in an array, ordered in descending order, where the keys are the colors, and the values are the count of the color.
	 *
	 * @return array
	 */
	function Get_Color( $img, $count=20, $reduce_brightness=true, $reduce_gradients=true, $delta=16 )
	{
		if (is_readable( $img ))
		{
			if ( $delta > 2 )
			{
				$half_delta = $delta / 2 - 1;
			}
			else
			{
				$half_delta = 0;
			}
			// WE HAVE TO RESIZE THE IMAGE, BECAUSE WE ONLY NEED THE MOST SIGNIFICANT COLORS.
			$size = GetImageSize($img);
			$scale = 1;
			if ($size[0]>0)
				$scale = min($this->PREVIEW_WIDTH/$size[0], $this->PREVIEW_HEIGHT/$size[1]);
			if ($scale < 1)
			{
				$width = floor($scale*$size[0]);
				$height = floor($scale*$size[1]);
			}
			else
			{
				$width = $size[0];
				$height = $size[1];
			}
			$image_resized = imagecreatetruecolor($width, $height);
			if ($size[2] == 1)
				$image_orig = imagecreatefromgif($img);
			if ($size[2] == 2)
				$image_orig = imagecreatefromjpeg($img);
			if ($size[2] == 3)
				$image_orig = imagecreatefrompng($img);
			// WE NEED NEAREST NEIGHBOR RESIZING, BECAUSE IT DOESN'T ALTER THE COLORS
			imagecopyresampled($image_resized, $image_orig, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
			$im = $image_resized;
			$imgWidth = imagesx($im);
			$imgHeight = imagesy($im);
			$total_pixel_count = 0;
			for ($y=0; $y < $imgHeight; $y++)
			{
				for ($x=0; $x < $imgWidth; $x++)
				{
					$total_pixel_count++;
					$index = imagecolorat($im,$x,$y);
					$colors = imagecolorsforindex($im,$index);
					// ROUND THE COLORS, TO REDUCE THE NUMBER OF DUPLICATE COLORS
					if ( $delta > 1 )
					{
						$colors['red'] = intval((($colors['red'])+$half_delta)/$delta)*$delta;
						$colors['green'] = intval((($colors['green'])+$half_delta)/$delta)*$delta;
						$colors['blue'] = intval((($colors['blue'])+$half_delta)/$delta)*$delta;
						if ($colors['red'] >= 256)
						{
							$colors['red'] = 255;
						}
						if ($colors['green'] >= 256)
						{
							$colors['green'] = 255;
						}
						if ($colors['blue'] >= 256)
						{
							$colors['blue'] = 255;
						}
					}
					$hex = substr("0".dechex($colors['red']),-2).substr("0".dechex($colors['green']),-2).substr("0".dechex($colors['blue']),-2);
					if ( ! isset( $hexarray[$hex] ) )
					{
						$hexarray[$hex] = 1;
					}
					else
					{
						$hexarray[$hex]++;
					}
				}
			}
			// Reduce gradient colors
			if ( $reduce_gradients )
			{
				// if you want to *eliminate* gradient variations use:
				// ksort( $hexarray );
				arsort( $hexarray, SORT_NUMERIC );
				$gradients = array();
				foreach ($hexarray as $hex => $num)
				{
					if ( ! isset($gradients[$hex]) )
					{
						$new_hex = $this->_find_adjacent( $hex, $gradients, $delta );
						$gradients[$hex] = $new_hex;
					}
					else
					{
						$new_hex = $gradients[$hex];
					}
					if ($hex != $new_hex)
					{
						$hexarray[$hex] = 0;
						$hexarray[$new_hex] += $num;
					}
				}
			}
			// Reduce brightness variations
			if ( $reduce_brightness )
			{
				// if you want to *eliminate* brightness variations use:
				// ksort( $hexarray );
				arsort( $hexarray, SORT_NUMERIC );
				$brightness = array();
				foreach ($hexarray as $hex => $num)
				{
					if ( ! isset($brightness[$hex]) )
					{
						$new_hex = $this->_normalize( $hex, $brightness, $delta );
						$brightness[$hex] = $new_hex;
					}
					else
					{
						$new_hex = $brightness[$hex];
					}
					if ($hex != $new_hex)
					{
						$hexarray[$hex] = 0;
						$hexarray[$new_hex] += $num;
					}
				}
			}
			arsort( $hexarray, SORT_NUMERIC );
			// convert counts to percentages
			foreach ($hexarray as $key => $value)
			{
				$hexarray[$key] = (float)$value / $total_pixel_count;
			}
			if ( $count > 0 )
			{
				// only works in PHP5
				// return array_slice( $hexarray, 0, $count, true );
				$arr = array();
				foreach ($hexarray as $key => $value)
				{
					if ($count == 0)
					{
						break;
					}
					$count--;
					$arr[$key] = $value;
				}
				return $arr;
			}
			else
			{
				return $hexarray;
			}
		}
		else
		{
			$this->error = "Image ".$img." does not exist or is unreadable";
			return false;
		}
	}
	function _normalize( $hex, $hexarray, $delta )
	{
		$lowest = 255;
		$highest = 0;
		$colors['red'] = hexdec( substr( $hex, 0, 2 ) );
		$colors['green']  = hexdec( substr( $hex, 2, 2 ) );
		$colors['blue'] = hexdec( substr( $hex, 4, 2 ) );
		if ($colors['red'] < $lowest)
		{
			$lowest = $colors['red'];
		}
		if ($colors['green'] < $lowest )
		{
			$lowest = $colors['green'];
		}
		if ($colors['blue'] < $lowest )
		{
			$lowest = $colors['blue'];
		}
		if ($colors['red'] > $highest)
		{
			$highest = $colors['red'];
		}
		if ($colors['green'] > $highest )
		{
			$highest = $colors['green'];
		}
		if ($colors['blue'] > $highest )
		{
			$highest = $colors['blue'];
		}
		// Do not normalize white, black, or shades of grey unless low delta
		if ( $lowest == $highest )
		{
			if ($delta <= 32)
			{
				if ( $lowest == 0 || $highest >= (255 - $delta) )
				{
					return $hex;
				}
			}
			else
			{
				return $hex;
			}
		}
		for (; $highest < 256; $lowest += $delta, $highest += $delta)
		{
			$new_hex = substr("0".dechex($colors['red'] - $lowest),-2).substr("0".dechex($colors['green'] - $lowest),-2).substr("0".dechex($colors['blue'] - $lowest),-2);
			if ( isset( $hexarray[$new_hex] ) )
			{
				// same color, different brightness - use it instead
				return $new_hex;
			}
		}
		return $hex;
	}
	function _find_adjacent( $hex, $gradients, $delta )
	{
		$red = hexdec( substr( $hex, 0, 2 ) );
		$green  = hexdec( substr( $hex, 2, 2 ) );
		$blue = hexdec( substr( $hex, 4, 2 ) );
		if ($red > $delta)
		{
			$new_hex = substr("0".dechex($red - $delta),-2).substr("0".dechex($green),-2).substr("0".dechex($blue),-2);
			if ( isset($gradients[$new_hex]) )
			{
				return $gradients[$new_hex];
			}
		}
		if ($green > $delta)
		{
			$new_hex = substr("0".dechex($red),-2).substr("0".dechex($green - $delta),-2).substr("0".dechex($blue),-2);
			if ( isset($gradients[$new_hex]) )
			{
				return $gradients[$new_hex];
			}
		}
		if ($blue > $delta)
		{
			$new_hex = substr("0".dechex($red),-2).substr("0".dechex($green),-2).substr("0".dechex($blue - $delta),-2);
			if ( isset($gradients[$new_hex]) )
			{
				return $gradients[$new_hex];
			}
		}
		if ($red < (255 - $delta))
		{
			$new_hex = substr("0".dechex($red + $delta),-2).substr("0".dechex($green),-2).substr("0".dechex($blue),-2);
			if ( isset($gradients[$new_hex]) )
			{
				return $gradients[$new_hex];
			}
		}
		if ($green < (255 - $delta))
		{
			$new_hex = substr("0".dechex($red),-2).substr("0".dechex($green + $delta),-2).substr("0".dechex($blue),-2);
			if ( isset($gradients[$new_hex]) )
			{
				return $gradients[$new_hex];
			}
		}
		if ($blue < (255 - $delta))
		{
			$new_hex = substr("0".dechex($red),-2).substr("0".dechex($green),-2).substr("0".dechex($blue + $delta),-2);
			if ( isset($gradients[$new_hex]) )
			{
				return $gradients[$new_hex];
			}
		}
		return $hex;
	}
}
/*
    Base64 image Placeholder generator
*/
class PictureThis {
	const DEFAULT_BG = '#f5f5f5';
	const DEFAULT_FG = '#FFF';
	const DEFAULT_H = 100;
	const DEFAULT_W = 200;
	private static function _getRgb($color) {
		$color = str_replace('#', null, $color);
		if(strlen($color) == 3) {
			$r = substr($color, 0, 1);
			$g = substr($color, 1, 1);
			$b = substr($color, 2, 1);
			$color = $r.$r.$g.$g.$b.$b;
		}
		$rgb = array(
			'r' => hexdec(substr($color, 0, 2)),
			'g' => hexdec(substr($color, 2, 2)),
			'b' => hexdec(substr($color, 4, 2))
		);
		return $rgb;
	}
	public static function display(array $options = array()) {
		$width = self::DEFAULT_W;
		if(isset($options['w']) && is_numeric($options['w']) && $options['w'] > 0) {
			$width = $options['w'];
		}
		$height = self::DEFAULT_H;
		if(isset($options['h']) && is_numeric($options['h']) && $options['h'] > 0) {
			$height = $options['h'];
		}
		$image = imagecreate($width, $height);
		$text = "$width x $height";
		if(isset($options['t']) && $options['t']) {
			$text = $options['t'];
		} else {
			$text = '';
		}
		$bg = self::DEFAULT_BG;
		if(isset($options['bg'])) {
			$bg = $options['bg'];
		}
		$bg = self::_getRgb($bg);
		$bg_color = imagecolorallocate($image, $bg['r'], $bg['g'], $bg['b']);
		$fg = self::DEFAULT_FG;
		if(isset($options['fg'])) {
			$fg = $options['fg'];
		}
		$fg = self::_getRgb($fg);
		$fg_color = imagecolorallocate($image, $fg['r'], $fg['g'], $fg['b']);
		$text_width = imagefontwidth(5) * strlen($text);
		$center = ceil($width / 2);
		$x = $center - (ceil($text_width/2));
		$center = ceil($height / 2);
		$y = $center - 6;
		imagestring($image, 5, $x, $y, $text, $fg_color);
		ob_start();
		imagepng($image);
		$contents = ob_get_contents();
		ob_end_clean();
		imagedestroy($image);
		return 'data:image/png;base64,'.base64_encode($contents);
	}
}
function placeImg($w = 1000, $h = 500, $bg = '#f5f5f5', $fg = false, $t = false){
	$args = array();
	return PictureThis::display(
		array(
			'w'  => $w,
			'h'  => $h,
			't'  => $t,
			'bg' => $bg,
			'fg' => $fg
		)
	);
}
function wpa_placeholder($id, $s){
	$ex            = new GetMostCommonColors();
	$colors        = $ex->Get_Color(get_attached_file($id), 1, true, true, 16);
	$size          = wp_get_attachment_image_src($id, $s);
	$dominant      = '#' . array_keys($colors)[0];
	$args = array();
	return PictureThis::display(
		array(
			'w'  => $size[1],
			'h'  => $size[2],
			'bg' => $dominant
		)
	);
}

//require_once('optimize-core.php');


add_filter( 'posts_orderby', 'order_search_by_posttype', 10, 1 );
function order_search_by_posttype( $orderby ){
    if( ! is_admin() && is_search() ) :
        global $wpdb;
        $orderby =
            "
            CASE WHEN {$wpdb->prefix}posts.post_type = 'product' THEN '1' 
                 WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '2' 
                 WHEN {$wpdb->prefix}posts.post_type = 'page' THEN '3' 
                 WHEN {$wpdb->prefix}posts.post_type = 'attachment' THEN '4' 
                 WHEN {$wpdb->prefix}posts.post_type = 'showroom' THEN '5' 
                 WHEN {$wpdb->prefix}posts.post_type = 'newspress' THEN '6' 
                 WHEN {$wpdb->prefix}posts.post_type = 'infopages' THEN '7' 
                 WHEN {$wpdb->prefix}posts.post_type = 'gallery' THEN '8' 
            ELSE {$wpdb->prefix}posts.post_type END ASC, 
            {$wpdb->prefix}posts.post_title ASC";
    endif;
    return $orderby;
}

/*
add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'filter_dropdown_option_html', 12, 2 );
function filter_dropdown_option_html( $html, $args ) {
    $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __( 'Choose an option', 'woocommerce' );
    $show_option_none_html = '<option value="">' . esc_html( $show_option_none_text ) . '</option>';

    $html = str_replace($show_option_none_html, '', $html);

    return $html;
}
*/


if ( ! function_exists( 'badeloft_setup' ) ) :
function badeloft_setup() {
	add_theme_support( 'woocommerce');
 
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on twentyfifteen, use a find and replace
     * to change 'twentyfifteen' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'badeloft', get_template_directory() . '/languages' );
 
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
 
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded  tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
 
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );
  
    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );
 
    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
 
    
}
endif; // badeloft_setup
add_action( 'after_setup_theme', 'badeloft_setup' );