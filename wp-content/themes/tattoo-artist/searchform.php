<?php
/**
 * The template for displaying search form.
 *
 * @package     Tattoo Artist
 * @since       0.1
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'tattoo-artist' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search …', 'tattoo-artist' ); ?>" value="" name="s">
	</label>
	<button type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'tattoo-artist' ); ?>">
		<i class="fa fa-search"></i>
	</button>
</form>