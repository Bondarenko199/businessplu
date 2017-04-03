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
<?php  ?>
    <section class="home-intro">

    </section>
    <section class="posts">
        <div class="container">
            <div class="posts-header">
                <h2 class="posts-headline"><?php echo get_theme_mod('home_section_1_headline') ?></h2>
                <span class="posts-refinement"><?php echo get_theme_mod('home_section_1_refinement') ?></span>
            </div>
            <ul class="posts-list">

				<?php if ( have_posts() ) : ?>

                <li>
					<?php if ( is_home() && ! is_front_page() ) : ?>
                        <header>
                            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                        </header>

						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;


					endwhile;

					the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
                </li>
            </ul>
        </div>
    </section>

<?php
get_footer();
