<?php 
/**
 * Sam functions and Definitions
 *
 * @link https://wordpress.org/
 *
 * @package WordPress
 * @subpackage Sam
 */


// Including the block file
include 'inc/blocks/block.php';

// Including business post_type file
include 'inc/post_type/business.php';

// Including business contact shortcode file
include 'inc/shortcodes/business-contacts.php';

// Including business metabox file
include 'inc/meta_box/meta-box.php';


add_action( 'wp_enqueue_scripts', 'sam_enqueue_styles' );

/**
 * Enqueue styles and scripts.
 */
function sam_enqueue_styles() {

    // Theme Version
	$theme_version = wp_get_theme()->get( 'Version' );

    // Register Child Theme Stylesheet.
    wp_enqueue_style( 'sam', get_stylesheet_uri(), array(), $theme_version, 'all');

    // Register theme custom stylesheet.
    wp_enqueue_style( 'sam-theme-styles', get_stylesheet_directory_uri() . '/assets/css/theme-styles.css', array(), $theme_version, 'all');

    // Register Custom Functionality js file.
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri().'/assets/js/custom.js', array( 'jquery' ), $theme_version, true);

    // Localize a registered custom-script with Ajax URL for a JavaScript variable.
    wp_localize_script('custom', 'myAjax', array( 'ajaxurl' => admin_url('admin-ajax.php')));

}


add_filter('upload_mimes', 'cxc_mime_types');
add_filter('mime_types',  'cxc_mime_types');

/**
 * Adding svg support
 */
function cxc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}


add_action( 'wp_ajax_add_business_contact', 'add_business_contact' );
add_action( 'wp_ajax_nopriv_add_business_contact', 'add_business_contact' );

/**
 * wp ajax for posting business on submit form
 */
function add_business_contact(){
    if(isset($_POST['business_name']) && !empty($_POST['business_name'])){
        $my_post = array(
            'post_title'    => $_POST['business_name'],
            'post_status'   => 'publish',
            'post_type'   => 'business',
        );

        $url = '';

        $post_id = wp_insert_post( $my_post );
        add_post_meta($post_id,'first_name',$_POST['first_name']);
        add_post_meta($post_id,'last_name',$_POST['last_name']);
        add_post_meta($post_id,'cage',$_POST['cage']);
        add_post_meta($post_id,'duns',rand());
        add_post_meta($post_id,'message',$_POST['message']);
        add_post_meta($post_id,'business_status','Active');
        if($post_id){
            $to = $_POST['admin_mail'];
            $subject = 'The Business';
            $body = '<p><strong>First Name:</strong>' .$first_name. '</p><p><strong>Last Name:</strong>' .$last_name.'</p>
            <p><strong>Cage:</strong>' .$cage.'<p><strong>message:</strong>' .$message.'</p>';
            $headers = array( 'Content-Type: text/html; charset=UTF-8' );
            $sent_message = wp_mail( $to, $subject, $body, $headers);
            $url = site_url().'/thank-you';
        }
    }
    wp_send_json(array('url' => $url));
}


add_action( 'admin_enqueue_scripts', 'load_admin_business_box_style' );

/**
 * Including Style For meta box
 */
function load_admin_business_box_style() {

    wp_enqueue_style('business-meta-css', get_stylesheet_directory_uri() . '/assets/css/admin-style.css');

}