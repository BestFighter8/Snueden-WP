<?php
/**
 * side bar template
 *
 * @package Tattoo Artist
 */
?>
<?php if ( ! is_active_sidebar( 'tattoo-artist-woocommerce-sidebar' ) ) {	return; } ?>
<div class="col-lg-4 pl-lg-4 my-5 order-0">
	<div class="sidebar">
		<?php dynamic_sidebar('tattoo-artist-woocommerce-sidebar'); ?>
	</div>
</div>