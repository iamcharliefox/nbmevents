<?php


// THEME SUPPORT
function gpx_theme_support(){
    // Adds dynamic title tag support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support( 'custom-logo', array(
        'height'      => 42,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_image_size( 'product-carousel', 200, 150, true );
    add_image_size( 'sponsor', 300, 100 );
}
add_action('after_setup_theme','gpx_theme_support');

// define menus and locations
function gpx_menus(){
    $locations = array(
        'primary' => "Attendee Navigation",
        'offline' => "Offline Navigation",
    );
    register_nav_menus($locations);
}
add_action('init','gpx_menus');



// register and enqueue styles
function gpx_register_styles(){
    $version = wp_get_theme()->get( 'Version');
    wp_enqueue_style('gpx-tabsx', get_template_directory_uri() . "/assets/css/tabs.css", array(), $version, 'all');
    wp_enqueue_style('gpx', get_template_directory_uri() . "/style.css", array('slick-theme'), $version, 'all');
    wp_enqueue_style('slick', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css", array(), '1.8.1', 'all');
    wp_enqueue_style('fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css", array(), '5.15.1', 'all');
    wp_enqueue_style('slick-theme', "https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css", array('slick'), '1.8.1', 'all');
}
add_action( 'wp_enqueue_scripts', 'gpx_register_styles');

// register and enqueue scripts
function gpx_register_scripts() {
    wp_enqueue_script('gpx-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), '3.5.1', true);    
    wp_enqueue_script('gpx-jquery-migrate', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.3.2/jquery-migrate.min.js', array(), '3.3.2', true);    
    wp_enqueue_script('gpx-slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('gpx-jquery'), '1.8.1', true);
    wp_enqueue_script('gpx-lazyload', 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js', array(), '5.2.2', true);
    wp_enqueue_script('gpx-waypoints', 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js', array(), '4.0.1', true);
    wp_enqueue_script('gpx-tabs', get_template_directory_uri() . '/assets/js/tabs.js',array('gpx-jquery'),'1.0', true);
    wp_enqueue_script('gpx-custom', get_template_directory_uri() . '/assets/js/scripts.js',array('gpx-jquery'),'2.4', true);
}   
add_action( 'wp_enqueue_scripts', 'gpx_register_scripts' );


function admin_default_page() {
  return home_url();
}

add_filter('login_redirect', 'admin_default_page');



// adds page specific class to body
function add_page_slug_body_class( $classes ) {
    global $post;
    
    if ( isset( $post ) ) {
        $classes[] = 'page-' . $post->post_name;
    }
    return $classes;
}

add_filter( 'body_class', 'add_page_slug_body_class' );



##################################
//programmatically set default role for new users
##################################
add_filter('pre_option_default_role', function($default_role){
    return 'attendee'; 
    return $default_role; //
});

##################################
//untick the send the new user and email 
##################################
add_action( 'user_new_form', 'dontchecknotify_register_form' );
 
function dontchecknotify_register_form() { 
    echo '<scr'.'ipt>jQuery(document).ready(function($) { 
        $("#send_user_notification").removeAttr("checked"); 
    } ); </scr'.'ipt>';
}

##################################
//remove messy profile section items
##################################

if (current_user_can('sponsor','staff')) {
    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
    add_action( 'personal_options', 'prefix_hide_personal_options' );
};

function prefix_hide_personal_options() {
  ?>
    <script type="text/javascript">
        jQuery( document ).ready(function( $ ){
            $( '#your-profile .form-table:first, #your-profile h3:first, .yoast, .user-description-wrap,  h2, .user-pinterest-wrap, .user-myspace-wrap, .user-soundcloud-wrap, .user-tumblr-wrap, .user-wikipedia-wrap' ).remove();
            $( '#application-passwords-section, .user-first-name-wrap, .user-last-name-wrap, .user-display-name-wrap, .user-url-wrap' ).remove();
            // $( '.user-nickname-wrap' ).remove();
            $("label[for='nickname']").html("Company Name <span class='description'>(required)</span>");
            $("#profile-page").fadeIn();
            $('#profile-page > h1').text('Showcase');
            $('#profile-page input#submit').attr('value', 'Update Showcase');
            
            var showcase_username = $("#user_login").val();

            $('#your-profile').prepend(
                $(document.createElement('button')).prop({
                type: 'button',
                innerHTML: 'View Showcase',
                class: 'btn-styled',
                id: showcase_username
                })
            );

            $('.btn-styled').on('click', function() {
                window.open( '/sponsor/' + this.id, "_blank" );
            });                        


        } );
    </script>
  <?php
}

// change author base to exhibitor
function exhibitor_author_base() {
    global $wp_rewrite;
    $wp_rewrite->author_base = 'sponsor';
}
add_action( 'init', 'exhibitor_author_base' );





// add options menu
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Show Options',
		'menu_title'	=> 'Show Options',
		'menu_slug' 	=> 'options-acf',
		'capability'	=> 'edit_posts',
        'position'      => '2.1',
		'redirect'		=> false
	));          
 
}

function my_login_logo() { ?>
<style type='text/css'>
#login h1 a, .login h1 a {
background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/GPX-NBM-LOGO.png) !important;
height:36px;
width:300px;
background-size: 300px 36px;
background-repeat: no-repeat;
padding-bottom: 30px;
}
.login .button-primary {
    background-color: #004A99 !important;
    border-color: #004A99 !important;
}
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );





// Update CSS within in Admin
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// removes admin bar
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}


// updates active navigation selection for specific post types
function change_page_menu_classes($menu)
{
    global $post;
    if (get_post_type($post) == 'presentations')
    {
        $menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-530', 'menu-item-530 current-menu-item', $menu ); // add the current_page_parent class to the page you want
    }
    elseif (get_post_type($post) == 'sponsor')
    {
        $menu = str_replace( 'current-page-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-531', 'menu-item-531 current-menu-item', $menu ); // add the current_page_parent class to the page you want
    }
    return $menu;
}
add_filter( 'nav_menu_css_class', 'change_page_menu_classes', 10,2 );



// check user roles for access
function check_user_roles( $roles, $user_id = null ) {

    if ( is_numeric( $user_id ) )
        $user = get_userdata( $user_id );
    else
        $user = wp_get_current_user();

    if ( empty( $user ) )
        return false;

    $user_roles = (array) $user->roles;

    foreach ( (array) $roles as $role ) {
        if ( in_array( $role, $user_roles ) )
            return true;
    }

    return false;
}