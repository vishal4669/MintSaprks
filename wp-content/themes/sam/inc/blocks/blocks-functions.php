<?php
/**
 * blocks callbacks
 *
 * @link https://wordpress.org/
 *
 * @package WordPress
 * @subpackage Sam
 */


/**
 * Icon Box Callback
 */
function icon_box_block_callback( $block ) {

    // Including icon-box-block.php
	include 'block-templates/icon-box-block.php';

}


/**
 * Help Box Callback
 */
function help_box_block_callback( $block ) {

    // Including help-box-block.php
    include 'block-templates/help-box-block.php';

}


/**
 * Page Welcome Title Callback
 */
function page_welcome_title_block_callback( $block ) {

    // Including welcome-title-block.php
    include 'block-templates/welcome-title-block.php';

}