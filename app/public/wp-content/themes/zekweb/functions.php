<?php
// Code để trỏ canonical về 1 link chính
add_filter( 'wpseo_canonical', 'devvn_rank_math_canonical_url', 99 );
add_filter( 'rank_math/frontend/canonical', 'devvn_rank_math_canonical_url', 99 );

function devvn_rank_math_canonical_url( $canonical_url ) {
    if ( is_category() || is_tag() ) {
        $canonical_url = get_term_link( get_queried_object_id() );
    } elseif ( is_home() ) {
        $canonical_url = get_permalink( get_option( 'page_for_posts' ) );
    }
    return $canonical_url;
}



// Hỗ trợ nhúng iframe ở mô tả

remove_filter('pre_term_description', 'wp_filter_kses');

add_filter('term_description', 'wp_kses_post');



/*
* Xoá bỏ link feed rss trong WordPress
*/
function wp_disable_feeds() {
    wp_safe_redirect(home_url(), 301);
    die();
}
   
add_action('do_feed', 'wp_disable_feeds', 1);
add_action('do_feed_rdf', 'wp_disable_feeds', 1);
add_action('do_feed_rss', 'wp_disable_feeds', 1);
add_action('do_feed_rss2', 'wp_disable_feeds', 1);
add_action('do_feed_atom', 'wp_disable_feeds', 1);
add_action('do_feed_rss2_comments', 'wp_disable_feeds', 1);
add_action('do_feed_atom_comments', 'wp_disable_feeds', 1);
 
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3 );

// Them thumbnail cho post & page
 /* === Add Thumbnails to Posts/Pages List === */
if ( !function_exists('o99_add_thumbs_column_2_list') && function_exists('add_theme_support') ) {

    //  // set your post types , here it is post and page...
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );

    function o99_add_thumbs_column_2_list($cols) {

        $cols['thumbnail'] = __('Thumbnail');

        return $cols;
    }

    function o99_add_thumbs_2_column($column_name, $post_id) {

            $w = (int) 60;
            $h = (int) 60;

            if ( 'thumbnail' == $column_name ) {
                // back comp x WP 2.9
                $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                // from gal
                $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                if ($thumbnail_id)
                    $thumb = wp_get_attachment_image( $thumbnail_id, array($w, $h), true );
                elseif ($attachments) {
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        $thumb = wp_get_attachment_image( $attachment_id, array($w, $h), true );
                    }
                }
                    if ( isset($thumb) && $thumb ) {
                        echo $thumb;
                    } else {
                        echo __('None');
                    }
            }
    }

    // for posts
    add_filter( 'manage_posts_columns', 'o99_add_thumbs_column_2_list' );
    add_action( 'manage_posts_custom_column', 'o99_add_thumbs_2_column', 10, 2 );

    // for pages
    add_filter( 'manage_pages_columns', 'o99_add_thumbs_column_2_list' );
    add_action( 'manage_pages_custom_column', 'o99_add_thumbs_2_column', 10, 2 );
}

function bootstrap_pagination( \WP_Query $wp_query = null, $echo = true, $params = [] ) {
    if ( null === $wp_query ) {
        global $wp_query;
    }

    $add_args = [];

    // add query (GET) parameters to generated page URLs
    if (isset($_GET['sort'])) {
        $add_args['sort'] = (string)$_GET['sort'];
    }

    $current = max( 1, get_query_var('paged') );
    $total   = $wp_query->max_num_pages;

    $pages = paginate_links( array_merge([
    'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link(999999999) ) ),
    'format'    => '?paged=%#%',
    'current'   => $current,
    'total'     => $total,
    'type'      => 'array',
    'show_all'  => false,
    'end_size'  => 1,
    'mid_size'  => 2,
    'prev_next' => false,   // Tắt prev/next của WordPress mặc định
    'add_args'  => $add_args,
], $params ));

    if ( is_array($pages) ) {
        $pagination = '<nav class="pagination"><ul class="page-numbers">';

        // === Custom prev button ===
        if ( $current > 1 ) {
            $prev_link = get_pagenum_link( $current - 1 );
            $pagination .= '<li><a class="prev page-numbers" href="' . esc_url($prev_link) . '">Trước</a></li>';
        } else {
            $pagination .= '<li><span class="prev page-numbers disabled">Trước</span></li>';
        }

        // === Page numbers ===
        foreach ( $pages as $page ) {
            $pagination .= '<li>' . $page . '</li>';
        }

        // === Custom next button ===
        if ( $current < $total ) {
            $next_link = get_pagenum_link( $current + 1 );
            $pagination .= '<li><a class="next page-numbers" href="' . esc_url($next_link) . '">Sau</a></li>';
        } else {
            $pagination .= '<li><span class="next page-numbers disabled">Sau</span></li>';
        }

        $pagination .= '</ul></nav>';

        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}



add_filter('wpcf7_autop_or_not', '__return_false');
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

register_nav_menu( 'main', 'Main' );
register_sidebar( array(
    'name'          => __( 'Footer', 'theme_text_domain' ),
    'id'            => 'footer',
    'description'   => '',
    'class'         => '',
    'before_widget' => '<div id="%1s" class="widget %2s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>'
) );

register_sidebar( array(
    'name'          => __( 'Sidebar', 'theme_text_domain' ),
    'id'            => 'sidebar',
    'description'   => '',
    'class'         => '',
    'before_widget' => '<div id="%1s" class="widget %2s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="widget-title">',
    'after_title'   => '</div>'
) );

//Đưa trình soạn thảo WordPress 5.0 về phiên bản cũ không dùng plugin  
add_filter('use_block_editor_for_post', '__return_false');

function rename_post_formats( $safe_text ) {
    if ( $safe_text == 'Đứng riêng' )
    return 'Sản phẩm';
    if ( $safe_text == 'Chat' )
    return 'Hỏi đáp';
    if ( $safe_text == 'Chuẩn' )
    return 'Tin tức';
    return $safe_text;
    }
    add_filter( 'esc_html', 'rename_post_formats' );
    add_theme_support( 'post-formats', array( 'aside' ,'chat') );


class home_xn extends WP_Widget {
function __construct(){
parent::__construct('home_xn',
'Xem nhiều',
array('description' => ''));
}
function widget( $args, $instance ) {
extract($args);
$title = apply_filters( 'widget_title',
empty($instance['title']) ? '' : $instance['title'],
$instance, $this->id_base);
$sp = apply_filters( 'widget_text', $instance['sp'], $instance );
echo $before_widget;
?>

<div class="widget-title"><?php echo ($title);?></div>
<div class="widget-post">
    <?php $new=new WP_Query('showposts=5&meta_key=post_views_count&orderby=meta_value_num&order=DESC');while($new->have_posts()) : $new->the_post();?>
    <div class="item">
        <div class="img">
            <a href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium', array('alt'   => trim(strip_tags( $post->post_title )),'title' => trim(strip_tags( $post->post_title )),)); ?></a>
        </div>
        <div class="info">
            <div class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
            <div class="date"><?php the_time('d.m.Y'); ?></div>
        </div>
    </div>
    <?php endwhile;wp_reset_query();wp_reset_postdata();?>
</div>



<?php
echo $after_widget;
}
function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['sp'] =  $new_instance['sp'];

return $instance;
}
function form( $instance ) {
$instance = wp_parse_args( (array) $instance,
array( 'title' => '', 'sp' => '' ) );
$title = strip_tags($instance['title']);
$sp = ($instance['sp']);

?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Tiêu đề :'); ?> </label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
    name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title?>" />
</p>



<?php
}
}
register_widget('home_xn');
class home_news extends WP_Widget {
function __construct(){
parent::__construct('home_news',
'Tin mới',
array('description' => ''));
}
function widget( $args, $instance ) {
extract($args);
$title = apply_filters( 'widget_title',
empty($instance['title']) ? '' : $instance['title'],
$instance, $this->id_base);
$sp = apply_filters( 'widget_text', $instance['sp'], $instance );
echo $before_widget;
?>

<div class="widget-title"><?php echo ($title);?></div>
<div class="widget-post">
    
    <?php $new=new WP_Query('showposts=5&orderby=date&order=DESC');while($new->have_posts()) : $new->the_post();?>
    <div class="item">
        <div class="img">
            <a href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium', array('alt'   => trim(strip_tags( $post->post_title )),'title' => trim(strip_tags( $post->post_title )),)); ?></a>
        </div>
        <div class="info">
            <div class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
            <div class="date"><?php the_time('d.m.Y'); ?></div>
        </div>
    </div>
    <?php endwhile;wp_reset_query();wp_reset_postdata();?>
    
</div>



<?php
echo $after_widget;
}
function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['sp'] =  $new_instance['sp'];

return $instance;
}
function form( $instance ) {
$instance = wp_parse_args( (array) $instance,
array( 'title' => '', 'sp' => '' ) );
$title = strip_tags($instance['title']);
$sp = ($instance['sp']);

?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Tiêu đề :'); ?> </label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
    name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title?>" />
</p>



<?php
}
}
register_widget('home_news');


 class Home_style_55 extends WP_Widget {
function __construct(){
parent::__construct('Home_style_55',
'Tin tức sidebar',
array('description' => ''));
}
function widget( $args, $instance ) {
extract($args);
$title = apply_filters( 'widget_title',empty($instance['title']) ? '' : $instance['title'],$instance, $this->id_base);
$sp = apply_filters( 'widget_text', $instance['sp'], $instance );
$sl = apply_filters( 'widget_text', $instance['sl'], $instance );
echo $before_widget;
?>
<div class="widget-title"><?php echo get_cat_name($sp ); ?></div>
<div class="widget-post">
    <?php $new=new WP_Query('showposts='.$sl.'&cat='.$sp);
    while($new->have_posts()) : $new->the_post();  ?>
    <div class="item">
        <div class="img">
            <a href="<?php the_permalink()?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium', array('alt'   => trim(strip_tags( $post->post_title )),'title' => trim(strip_tags( $post->post_title )),)); ?></a>
        </div>
        <div class="info">
            <div class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
            <div class="date"><?php the_time('d.m.Y'); ?></div>
        </div>
    </div>
    <?php endwhile;wp_reset_query();wp_reset_postdata();?>
</div>
<?php
echo $after_widget;
}
function update( $new_instance, $old_instance ) {
$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['sp'] =  $new_instance['sp'];
$instance['sl'] =  $new_instance['sl'];
return $instance;
}
function form( $instance ) {
$instance = wp_parse_args( (array) $instance,
array( 'title' => '', 'sp' => '', 'sl' => '' ) );
$title = strip_tags($instance['title']);
$sp = ($instance['sp']);$sl = ($instance['sl']);
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
    <?php _e('Tiêu đề :'); ?> </label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
    name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo  get_cat_name($sp);?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('sp'); ?>">
    <?php _e('Id Chuyên Mục.'); ?> </label>
    <select name="<?php echo $this->get_field_name('sp'); ?>" id="<?php echo $this->get_field_id('sp'); ?>">
        <?php $args = array(
        'orderby' => 'name','hide_empty'=>0,
        'order' => 'ASC'
        );$categories=get_categories( $args ); foreach($categories as $category) {?>
        <option value="<?php echo $category->term_id; ?>" <?php if($category->term_id ==$sp){echo 'selected="selected"';} ?>><?php echo $category->cat_name; ?></option>
        
        <?php } ?>
    </select>
</p>
<p>
    <label for="<?php echo $this->get_field_id('sl'); ?>">
    <?php _e('Số Lượng :'); ?> </label>
    <input class="widefat" id="<?php echo $this->get_field_id('sl'); ?>"
    name="<?php echo $this->get_field_name('sl'); ?>" type="number" value="<?php echo  $sl;?>" />
</p>
<?php
}
}
register_widget('Home_style_55');


add_filter( 'widget_text', 'do_shortcode' );

function crunchify_remove_version() {
    return '';
}
add_filter('the_generator', 'crunchify_remove_version');

remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];
if(empty($first_img)){ //Defines a default image
$first_img = "/images/default.jpg"; //Duong dan anh mac dinh khi khong tim duoc anh dai dien
}
return $first_img;
}

// Quản lý trang
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
                'page_title'    => 'Theme General Settings',
                'menu_title'    => 'Site Management',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'manage_options',
                        'redirect'      => false
    ));
    };
// End Quản lý trang
        
   
   add_theme_support('post-thumbnails');

    function remove_default_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
    }

   //Đếm số lượt xem

    function getPostViews($postID){ // hàm này dùng để lấy số người đã xem qua bài viết
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){ // Nếu như lượt xem không có
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    return "0"; // giá trị trả về bằng 0
    }
    return $count; // Trả về giá trị lượt xem
    }
    function setPostViews($postID) {// hàm này dùng để set và update số lượt người xem bài viết.
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
    $count = 0;
    delete_post_meta($postID, $count_key);
    add_post_meta($postID, $count_key, '0');
    }else{
    $count++; // cộng đồn view
    update_post_meta($postID, $count_key, $count); // update count
    }
    }

//Ẩn WordPress Version
function wpb_remove_version() {
return '';
}
add_filter('the_generator', 'wpb_remove_version');



//Vô hiệu hóa XML-RPC trong WordPress
add_filter('xmlrpc_enabled', '__return_false');

//Bảo vệ WordPress khỏi các truy vấn nguy hiểm
global $user_ID; if($user_ID) {
        if(!current_user_can('administrator')) {
                if (strlen($_SERVER['REQUEST_URI']) > 255 ||
                        stripos($_SERVER['REQUEST_URI'], "eval(") ||
                        stripos($_SERVER['REQUEST_URI'], "CONCAT") ||
                        stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||
                        stripos($_SERVER['REQUEST_URI'], "base64")) {
                                @header("HTTP/1.1 414 Request-URI Too Long");
                                @header("Status: 414 Request-URI Too Long");
                                @header("Connection: Close");
                                @exit;
                }
        }
}

function wp_nav_menu_no_ul()
{
    $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'main',
        'fallback_cb'=> 'fall_back_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);

}

function fall_back_menu(){
    return;
}

function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="sub-menu" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class');

function add_classes_on_li($classes, $item, $args) {
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-links"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
    .notice-error{display:none}
  </style>';
}


add_filter('xmlrpc_enabled', '__return_false');

function wpse_11826_search_by_title( $search, $wp_query ) {
    if ( ! empty( $search ) && ! empty( $wp_query->query_vars['search_terms'] ) ) {
        global $wpdb;

        $q = $wp_query->query_vars;
        $n = ! empty( $q['exact'] ) ? '' : '%';

        $search = array();

        foreach ( ( array ) $q['search_terms'] as $term )
            $search[] = $wpdb->prepare( "$wpdb->posts.post_title LIKE %s", $n . $wpdb->esc_like( $term ) . $n );

        if ( ! is_user_logged_in() )
            $search[] = "$wpdb->posts.post_password = ''";

        $search = ' AND ' . implode( ' AND ', $search );
    }

    return $search;
}

add_filter( 'posts_search', 'wpse_11826_search_by_title', 10, 2 );

//Allow Contributors to Add Media
if ( current_user_can('contributor') && !current_user_can('upload_files') )
add_action('admin_init', 'allow_contributor_uploads');

function allow_contributor_uploads() {
$contributor = get_role('contributor');
$contributor->add_cap('upload_files');
}



//* Loại bỏ các icon không cần thiết 

function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );


function disable_emojis_tinymce( $plugins ) {
if ( is_array( $plugins ) ) {
return array_diff( $plugins, array( 'wpemoji' ) );
} else {
return array();
}
}

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
if ( 'dns-prefetch' == $relation_type ) {
$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/'  );
$urls = array_diff( $urls, array( $emoji_svg_url ) );
}
return $urls;
}

//* Disable Gutenberg stylesheet in front
function wps_deregister_styles() {
wp_dequeue_style( 'wp-block-library' );
wp_dequeue_style( 'wp-block-library-theme' );
wp_dequeue_style( 'wc-block-style' );
}
add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );


//* Loại bỏ Query String trong WordPress
function remove_cssjs_ver( $src ) {
if( strpos( $src, '?ver=' ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


// Xoá thông báo tài khoản admin là chuẩn xác
add_filter( 'admin_email_check_interval', '__return_false' );


include_once( get_stylesheet_directory() . '/admin/admin.php' );

// Tự động bổ xung file jquery.min.js
function enqueue_jquery_script() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery_script');
// End
// Đặt số bài viết của danh mục tin vào trong thẻ span
add_filter('wp_list_categories', 'wrap_category_count_in_span', 10, 2);
function wrap_category_count_in_span($output, $args) {
    // Tìm và thay thế số bài viết trong ngoặc đơn
    $output = preg_replace('/\((\d+)\)/', '<span>($1)</span>', $output);
    return $output;
}
// End

?>