<?php
/**
 * Register Block
 *
 * @link https://wordpress.org/
 *
 * @package WordPress
 * @subpackage Sam
 */

// Including the block functions file
include 'blocks-functions.php';

add_action('acf/init', 'register_sam_blocks');

/**
 * Registering blocks
 */
function register_sam_blocks() {

    if( function_exists('acf_register_block') ) {

        // Register Icon Box
        acf_register_block(array(
            'name'              => 'icon-box-block',
            'title'             => __('Icon Box'),
            'description'       => __(''),
            'render_callback'   => 'icon_box_block_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'icon-box-block', 'quote' ),
        ));

        // Register Help Box
        acf_register_block(array(
            'name'              => 'help-box-block',
            'title'             => __('Help Box'),
            'description'       => __(''),
            'render_callback'   => 'help_box_block_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'help-box-block', 'quote' ),
        ));

        // Register Page Welcome Title
        acf_register_block(array(
            'name'              => 'page-welcome-title',
            'title'             => __('Page Welcome Title'),
            'description'       => __(''),
            'render_callback'   => 'page_welcome_title_block_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'page-welcome-title', 'quote' ),
        ));

    }

}