<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Tattoo Artist
 */

if ( ! function_exists( 'tattooartist_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tattooartist_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'tattoo-artist' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'tattoo-artist' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;


if ( ! function_exists( 'tattooartist_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function tattooartist_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'tattoo-artist' ) );
		if ( $categories_list && tattooartist_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'tattoo-artist' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'tattoo-artist' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'tattoo-artist' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'tattoo-artist' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'tattoo-artist' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tattooartist_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'tattooartist_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'tattooartist_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so tattooartist_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so tattooartist_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in tattooartist_categorized_blog.
 */
function tattooartist_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tattooartist_categories' );
}
add_action( 'edit_category', 'tattooartist_category_transient_flusher' );
add_action( 'save_post',     'tattooartist_category_transient_flusher' );


/**
 * Function that returns if the menu is sticky
 */
if (!function_exists('tattooartist_sticky_menu')):
    function tattooartist_sticky_menu()
    {
        $is_sticky = get_theme_mod('hide_show_sticky', false);

        if ($is_sticky == false):
            return 'not-sticky';
        else:
            return 'is-sticky-on';
        endif;
    }
endif;


/**
 * Register Google fonts for tattooartist.
 */
function tattoo_artist_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Work Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,600;1,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function tattoo_artist_scripts_styles() {
    wp_enqueue_style( 'tattooartist-fonts', tattoo_artist_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'tattoo_artist_scripts_styles' );


/**
 * Register Breadcrumb for Multiple Variation
 */
function tattooartist_breadcrumbs_style() {
	get_template_part('./template-parts/sections/section','breadcrumb');	
}


/**
 * This Function Check whether Sidebar active or Not
 */
if(!function_exists( 'tattooartist_post_layout' )) :
function tattooartist_post_layout(){
	if(is_active_sidebar('tattoo-artist-sidebar-primary'))
		{ echo 'col-lg-8'; } 
	else 
		{ echo 'col-lg-12'; }  
} endif;



/**
 *	tattooartist Dynamic Styles
 */
 
if( ! function_exists( 'tattooartist_theme_dynamic_style' ) ):
    function tattooartist_theme_dynamic_style() {

		$output_css = '';	
				
		/**
		 *  Breadcrumb Style
		 */
		
		$breadcrumb_bg_img			= get_theme_mod('breadcrumb_bg_img'); 
		
		if($breadcrumb_bg_img != '') { 
			$output_css .=".breadcrumb-section:after  {
					content: '';
					background-color:#081C75;
					opacity: 0.75;
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					width: 100%;
					height: 100%;
					z-index: -2;
				}\n";
		}else{
			$output_css .=".slider-area::after  {
					content: '';
					position: absolute;
					left: 0;
					right: 0;
					bottom: 0;
					width: 100%;
					height: 87px;
					animation: moveleftbounce 3s linear infinite
				}.breadcrumb-section {
					background: #607377;
				}\n";
		}		

		 /**
		 *  Clip Art
		 */
		 $hs_clipart		= get_theme_mod('hs_clipart','1');	
		 if($hs_clipart!='1'):
			$output_css .=".animation-shap,.shape-1,shape-2,.shape-3 {
					display:none;
				}\n";
		 endif;
		 
		 
		 
        wp_add_inline_style( 'tattooartist-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'tattooartist_theme_dynamic_style' );



/**
 * Menus
 */

/**
 * Filters classes of wp_list_pages items to match menu items.
 *
 * Filter the class applied to wp_list_pages() items with children to match the menu class, to simplify.
 * styling of sub levels in the fallback. Only applied if the match_menu_classes argument is set.
 *
 * @since Tattoo Artist 1.0
 *
 * @param string[] $css_class    An array of CSS classes to be applied to each list item.
 * @param WP_Post  $page         Page data object.
 * @param int      $depth        Depth of page, used for padding.
 * @param array    $args         An array of arguments.
 * @param int      $current_page ID of the current page.
 * @return array CSS class names.
 */
function tattooartist_filter_wp_list_pages_item_classes( $css_class, $page, $depth, $args, $current_page ) {

	// Only apply to wp_list_pages() calls with match_menu_classes set to true.
	$match_menu_classes = isset( $args['match_menu_classes'] );

	if ( ! $match_menu_classes ) {
		return $css_class;
	}

	// Add current menu item class.
	if ( in_array( 'current_page_item', $css_class, true ) ) {
		$css_class[] = 'current-menu-item';
	}

	// Add menu item has children class.
	if ( in_array( 'page_item_has_children', $css_class, true ) ) {
		$css_class[] = 'menu-item-has-children';
	}

	return $css_class;

}

add_filter( 'page_css_class', 'tattooartist_filter_wp_list_pages_item_classes', 10, 5 );


/**
 * Adds a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @since Tattoo Artist 1.0
 *
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param WP_Post  $item  Menu item data object.
 * @param int      $depth Depth of menu item. Used for padding.
 * @return stdClass An object of wp_nav_menu() arguments.
 */
function tattooartist_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		// Wrap the menu item link contents in a div, used for positioning.
		$args->before = '<div class="ancestor-wrapper">';
		$args->after  = '';

		// Add a toggle to items with children.
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';
			$toggle_duration      = tattooartist_toggle_duration();

			// Add the sub menu toggle.
			$args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' .
				/* translators: Hidden accessibility text. */
				__( 'Show sub menu', 'tattoo-artist' ) .
			'</span><i class="fa fa-chevron-down" aria-hidden="true"></i>
			</button>';

		}

		// Close the wrapper.
		$args->after .= '</div><!-- .ancestor-wrapper -->';

		// Add sub menu icons to the primary menu without toggles.
	} elseif ( 'primary_menu' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$args->after = '<span class="icon"></span>';
		} else {
			$args->after = '';
		}
	}

	return $args;

}

add_filter( 'nav_menu_item_args', 'tattooartist_add_sub_toggles_to_main_menu', 10, 3 );


/**
 * Toggles animation duration in milliseconds.
 *
 * @since Tattoo Artist 1.0
 *
 * @return int Duration in milliseconds
 */
function tattooartist_toggle_duration() {
	/**
	 * Filters the animation duration/speed used usually for submenu toggles.
	 *
	 * @since Tattoo Artist 1.0
	 *
	 * @param int $duration Duration in milliseconds.
	 */
	$duration = apply_filters( 'tattooartist_toggle_duration', 250 );

	return $duration;
}



