<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package businessplus
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<section id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
    <div class="section-header margin">
		<?php
		printf(
			'<h2 class="headline">' . esc_html__( 'Comments', 'businessplus' ) . '</h2> <span class="refinement">' . esc_html__( 'Suggestions & feedback', 'businessplus' ) . '</span>' ); ?>
    </div><!-- .comments-title -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'businessplus' ); ?></h2>
            <div class="nav-links">

                <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'businessplus' ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'businessplus' ) ); ?></div>

            </div><!-- .nav-links -->
        </nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<?php
	function mytheme_comment( $comment, $args, $depth ){
	$GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="row comment-container">
            <div class="col-2 comment-author vcard">
				<?php echo get_avatar( $comment, $size = '85','', '', array( 'class' => 'img-responsive rounded-circle' ) ) ?>


            </div>
            <div class="col-10">
				<?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php esc_html( __( 'Waiting for check.', 'businessplus' ) ) ?></em>
                    <br/>
				<?php endif; ?>

                <div class="comment-meta commentmetadata">
                    <a href="<?php echo get_comment_author_link() ?>" class="dark-text text-uppercase fn meta-link"><?php echo get_comment_author_link() ?></a>
                    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" class="color-text text-uppercase meta-link"><?php printf( '%1$s', get_comment_date() ) ?></a>
					<?php edit_comment_link( '(Edit)', '', '' ) ?>
                </div>
                <div class="comment-text"><?php comment_text() ?></div>

                <div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'reply_text' => __( '' ), 'max_depth' => $args['max_depth'] ) ) ) ?>
                </div>
            </div>

        </div>
		<?php
		}
		?>

        <ul>
			<?php wp_list_comments( 'type=comment&callback=mytheme_comment' ); ?>
        </ul>


        <!--		<ul class="comment-list">-->
        <!--			--><?php
		//				wp_list_comments( array(
		//					'style'      => 'ul',
		//					'short_ping' => true,
		//				) );
		//			?>
        <!--		</ul><!-- .comment-list -->-->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'businessplus' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'businessplus' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'businessplus' ) ); ?></div>

                </div><!-- .nav-links -->
            </nav><!-- #comment-nav-below -->
			<?php
		endif; // Check for comment navigation.

		endif; // Check for have_comments().


		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'businessplus' ); ?></p>
			<?php
		endif;

		comment_form();
		?>

</section><!-- #comments -->
