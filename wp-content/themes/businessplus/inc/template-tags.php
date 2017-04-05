<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package businessplus
 */

if ( ! function_exists( 'blog_name_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */

	function businessplus_posted_on() {
		$sticky_mod = get_theme_mod( 'post_meta_settings' ) == '1' ? the_title() : '';

		$time_string = '<time class="entry-date" datetime="%1$s">
			<span class="mid-tone-text day">%2$s</span> 
		</time>';
 // линки должны быть на автора и на дату, которые ведут в архив
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'F-d-Y' ) ),
			esc_html( get_the_date( 'F-d-Y' ) )
		);

		$author = sprintf(
			esc_html( get_the_author() ) );

		$posted_on = sprintf(
			'<span class="d-block date-link" rel="bookmark">Posted by ' . $author . ', ' . $time_string . '</span>'
		);

		echo $posted_on;
		// WPCS: XSS OK.
	}

endif;


if ( ! function_exists( 'businessplus_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function businessplus_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'businessplus' ) );
			if ( $categories_list && businessplus_categorized_blog() ) {
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'businessplus' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'businessplus' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'businessplus' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'businessplus' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}

		edit_post_link(
			sprintf(
			/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'businessplus' ),
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
function businessplus_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'businessplus_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'businessplus_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so businessplus_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so businessplus_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in businessplus_categorized_blog.
 */
function businessplus_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'businessplus_categories' );
}

add_action( 'edit_category', 'businessplus_category_transient_flusher' );
add_action( 'save_post', 'businessplus_category_transient_flusher' );

if ( ! function_exists( 'custom_button' ) ) :

	function custom_button( $links = array( 'custom_link', 'dropdown_link', 'button_text' ) ) {

		$custom_link   = get_theme_mod( $links['custom_link'] );
		$dropdown_link = get_page_link( intval( get_theme_mod( $links['dropdown_link'] ) ) );
		$button_text = get_theme_mod( $links['button_text'] );

		if ( $custom_link ) :
			// у тебя же тут чистый пхп код, альтернативный синтаксис не нужен. Printf используешь неправильно, мы говорили об этом на уроке
			printf( '<a href="' . $custom_link . '" class="main-button">' . $button_text . '</a>' );
		else :
			printf( '<a href="' . $dropdown_link . '" class="main-button">' . $button_text . '</a>' );
		endif;
	}

endif;

if ( ! function_exists( 'custom_social' ) ) :

	function custom_social( $socials = array() ) {

		foreach ( $socials as $key => $social ) :

			$key += 1;
			$social = array(
				'name' => sanitize_title_with_dashes( $social ),
				'link' => 'social_' . $key . '_link',
			);
			$name   = $social['name'];
			$link   = get_theme_mod( $social['link'] );
			printf(
				'<li class="' . $name . '-container">
                    <a href="' . $link . '" class="fa fa-' . $name . ' mid-tone-text color-text_hover social-button margin" aria-hidden="true"></a>
                </li>'
			);

		endforeach;
	}

endif;