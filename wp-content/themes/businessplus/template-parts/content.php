<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package businessplus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="col-2">
            <div class="avatar-container">
                <?php echo get_avatar(get_the_author_meta( 'ID' )) ?>
            </div>
        </div>
        <div class="col-10 post-container">
            <header class="entry-header">
		        <?php
		        if ( is_single() ) :
			        the_title( '<h1 class="entry-title dark-text">', '</h1>' );
		        else :
			        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" class="dark-text" rel="bookmark">', '</a></h2>' );
		        endif;

		        if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
				        <?php businessplus_posted_on(); ?>
                    </div><!-- .entry-meta -->
			        <?php
		        endif; ?>
            </header><!-- .entry-header -->

            <div class="img-container"><?php the_post_thumbnail() ?></div>

            <div class="entry-content">
		        <?php
		        the_content( sprintf(
		        /* translators: %s: Name of current post. */
			        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'businessplus' ), array( 'span' => array( 'class' => array() ) ) ),
			        the_title( '<span class="screen-reader-text">"', '"</span>', false )
		        ) );

		        wp_link_pages( array(
			        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'businessplus' ),
			        'after'  => '</div>',
		        ) );
		        ?>
                <a href="<?php the_permalink() ?>" class="main-button float-right clearfix"><?php echo get_theme_mod('post_button_text')?></a>
            </div>

<!--            <footer class="entry-footer">-->
<!--		        --><?php //businessplus_entry_footer(); ?>
<!--            </footer><!-- .entry-footer -->
        </div>
    </div>

</article><!-- #post-## -->
