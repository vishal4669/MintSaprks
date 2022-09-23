<?php
/**
 * Business Contact Shortcode
 *
 * @link https://wordpress.org/
 *
 * @package WordPress
 * @subpackage Sam
 */

add_shortcode( 'business_contacts', 'business_contacts_callback' );
function business_contacts_callback() {

	ob_start();
	?>

	<section class="contact-us">
		<h1 class="contact-us__heading">List Your Business</h1>
		<form class="wpcf7-form init business-contact-form">
			<input type="hidden" name="action" value="add_business_contact">
			<p>
				<label> First Name<br>
					<span class="wpcf7-form-control-wrap">
						<input type="text" name="first_name">
						<span class="wpcf7-not-valid-tip">Please fill out this field.</span>
					</span>
				</label>
			</p>
			<p>
				<label> Last Name<br>
					<span class="wpcf7-form-control-wrap">
						<input type="text" name="last_name">
						<span class="wpcf7-not-valid-tip">Please fill out this field.</span>
					</span>
				</label>
			</p>
			<p>
				<label>Business Name<br>
					<span class="wpcf7-form-control-wrap">
						<input type="text" name="business_name">
						<span class="wpcf7-not-valid-tip">Please fill out this field.</span>
					</span>
				</label>
			</p>
			<p>
				<label>Cage<br>
					<span class="wpcf7-form-control-wrap">
						<input type="text" name="cage">
						<span class="wpcf7-not-valid-tip">Please fill out this field.</span>
					</span>
				</label>
			</p>
			<div class="full-row">
				<label>Message<br>
					<span class="wpcf7-form-control-wrap" data-name="your-message">
						<textarea aria-required="true" aria-invalid="false" name="message"></textarea>
						<span class="wpcf7-not-valid-tip">Please fill out this field.</span>
					</span>
				</label>
			</div>
			<div class="full-row">
				<input type="submit" value="Submit" class="wpcf7-form-control has-spinner wpcf7-submit"><span
				class="wpcf7-spinner"></span>
			</div>
		</form>
	</section>

	<?php 
	$args = array(
		'post_type'=> 'business',
		'orderby'    => 'ID',
		'post_status' => 'publish',
		'order'    => 'DESC',
		'posts_per_page' => -1,
	);
	$result = new WP_Query( $args );
	if ( $result->have_posts() ) : ?>
		<section class="sam-search">

			<h2 class="contact-us__heading">Recent Contacts</h2>

			<table class="sam-search__table">

				<thead class="sam-search__thead">
					<tr class="sam-search__tr">
						<th class="sam-search__th">Status</th>
						<th class="sam-search__th">Business Name</th>
						<th class="sam-search__th">CAGE</th>
						<th class="sam-search__th">DUNS</th>
						<th class="sam-search__th"></th>
					</tr>
				</thead>

				<?php while ( $result->have_posts() ) : $result->the_post(); ?>


					<tbody class="sam-search__tbody">
						<tr class="sam-search__tr clickable-row" onclick='window.location="#"'>
							<td class="sam-search__td">
								<span class="mob-status">Status:</span>
								<?php 
								$business_status = get_post_meta(get_the_ID(),'business_status',true);
								if(!empty($business_status)) {
									?><span class="status__<?php echo $business_status; ?> <?php echo $class; ?>"><?php echo $business_status; ?></span><?php
								}
								?>

							</td>
							<td class="sam-search__td full-with">
								<span class="mob-status">Business Name:</span>
								<?php the_title(); ?>
							</td>
							<td class="sam-search__td">
								<span class="mob-status">CAGE:</span>
								<?php 
								$cage = get_post_meta(get_the_ID(),'cage',true);
								if(!empty($cage)) {
									echo $cage;
								}
								?>

							</td>
							<td class="sam-search__td">
								<span class="mob-status">DUNS:</span>
								<?php 
								$duns = get_post_meta(get_the_ID(),'duns',true);
								if(!empty($duns)) {
									echo $duns;
								}
								?>
							</td>
							<td class="sam-search__td result-arrow">
								<div class="result-arrow__img"></div>
							</td>
						</tr>

					</tbody>
				<?php endwhile; ?>
			</table>
		</section>
	<?php endif;
	wp_reset_postdata();
	return ob_get_clean();
}