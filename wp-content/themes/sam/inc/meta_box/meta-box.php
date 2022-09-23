<?php
add_action('add_meta_boxes','business_meta_box');

/**
 * Add meta box in business post type
 */
function business_meta_box(){

    // For Business Information
	add_meta_box( 'business_meta_box', esc_html__( 'Business Information', 'example' ),  'business_meta_box_content', 'business', 'normal', 'default' );

    // For Business Status
	add_meta_box( 'business_facts_meta_box', 'Business Status', 'business_status_meta_box', 'business', 'normal', 'default' );

}

/**
 * Meta Callback
 */
function business_meta_box_content(){
	global $post;
	$first_name = get_post_meta($post->ID, 'first_name', true);
	$last_name = get_post_meta($post->ID, 'last_name', true);
	$cage = get_post_meta($post->ID, 'cage', true);
	$duns = get_post_meta($post->ID, 'duns', true);
	$message = get_post_meta($post->ID, 'message', true);
	?>
	<div class="wc-business-meta">
		<table id="business_info">
			<tbody>
				<tr>
					<td><strong>First Name:</strong></td>
					<td><?php echo $first_name;?></td>
				</tr>
				<tr>
					<td><strong>Last Name:</strong></td>
					<td><?php echo $last_name;?></td>
				</tr>
				<tr>
					<td><strong>Cage:</strong></td>
					<td><?php echo $cage;?></td>
				</tr>
				<tr>
					<td><strong>DUNS:</strong></td>
					<td><?php echo $duns;?></td>
				</tr>
				<tr>
					<td><strong>Message:</strong></td>
					<td><?php echo $message;?></td>
				</tr>
			</tbody>
		</table>
	</div>
	<?php
}


/**
 * Meta Callback
 */
function business_status_meta_box( $post ){

    // make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'select_post_meta_box_nonce' );

	$business_status = get_post_meta( $post->ID, 'business_status', true );

	?>
	<div class='inside'>
		<p>
			<input type="radio" id="active" name="business_status" value="Active" <?php echo ( $business_status == 'Active' ) ? 'checked': ''; ?> />
			<label for="active">Active</label><br>
			<input type="radio" id="expiring" name="business_status" value="Expiring" <?php echo ( $business_status == 'Expiring' ) ? 'checked': ''; ?> />
			<label for="expiring">Expiring</label><br>
			<input type="radio" id="expired" name="business_status" value="Expired" <?php echo ( $business_status == 'Expired' ) ? 'checked': ''; ?> />
			<label for="expired">Expired</label>
		</p>
	</div>
	<?php
}


add_action('save_post', 'save_business_meta_box_data');

/**
 * Save Meta
 */
function save_business_meta_box_data( $post_id ){

	if ( !isset( $_POST['select_post_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['select_post_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}

	if ( isset( $_POST['business_status'] ) ) {
		update_post_meta( $post_id, 'business_status', $_POST['business_status'] );
	}

}