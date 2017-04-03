<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package businessplus
 */

get_header(); ?>


    <section class="home-intro">

    </section>
    <section class="posts">
        <div class="container">
            <div class="posts-header">
                <h2 class="headline dark-text"><?php echo get_theme_mod( 'home_section_1_headline' ) ?></h2>
                <span class="refinement dark-text"><?php echo get_theme_mod( 'home_section_1_refinement' ) ?></span>
            </div>
            <ul class="posts-list">

				<?php if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile; ?>

                    <!--					--><?php //the_posts_navigation(); ?>

                    <div class="pag-wrap col-sm-12 center-xs">
						<?php
						global $wp_query;

						$big = 999999999; // need an unlikely integer

						echo paginate_links( array(
							'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format'    => '?paged=%#%',
							'total'     => $wp_query->max_num_pages,
							'prev_text' => '',
							'next_text' => ''
						) );
						?>
                    </div>

				<?php else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
            </ul>
        </div>
    </section>

<?php
get_footer();