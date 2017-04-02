<?php /* Template Name: Home */

get_header();
?>

<section class="intro">
    <div class="container">
        <div class="owl-carousel owl-theme" id="owl">
			<?php
			$args = array(
				'post_type' => 'slide'
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :?>
				<?php while ( $the_query->have_posts() ) : ?>
                    <div class="owl-item">
						<?php $the_query->the_post(); ?>
                        <div class="row d-flex flex-column">
                            <h2 class="light-text col-md-6 slider-header margin"><?php the_title(); ?></h2>
                            <div class="light-text col-md-6 slider-text margin"><?php the_excerpt(); ?></div>
                        </div>
                        <a href="<?php the_permalink() ?>" class="main-button slider-button">Read more</a>
                    </div>
				<?php endwhile; ?>
			<?php else : //no posts ?>
			<?php endif;
			wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<section class="about-us">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-5 col-sm-12 section-header margin">
                <h2 class="headline margin"><?php echo get_theme_mod( 'section_2_headline' ) ?></h2>
                <span class="refinement"><?php echo get_theme_mod( 'section_2_refinement' ) ?></span>
            </div>
            <div class="col-md-7 col-sm-12">
                <p class="main-text margin"><?php echo get_theme_mod( 'section_2_text' ) ?></p>
				<?php
				custom_button( array(
					'custom_link' => 'section_2_custom_button_link',
					'radio_link'  => 'section_2_button_link',
					'button_text' => 'section_2_button_text'
				) );
				?>
            </div>
        </div>
    </div>
</section>
<section class="services">
    <div class="container">
        <div class="section-header margin">
            <h2 class="headline margin"><?php echo get_theme_mod( 'section_3_headline' ) ?></h2>
            <span class="refinement"><?php echo get_theme_mod( 'section_3_refinement' ) ?></span>
        </div>
        <ul class="row">
			<?php
			$args = array(
				'post_type' => 'service'
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :?>
				<?php while ( $the_query->have_posts() ) : ?>
                    <li class=" col-md-6 col-sm-12">
						<?php $the_query->the_post(); ?>
                        <h3 class="service-header"><?php the_title(); ?></h3>
                        <p class="service-text"><?php the_excerpt(); ?></p>
                    </li>
				<?php endwhile; ?>
			<?php else : //no posts ?>
			<?php endif;
			wp_reset_postdata(); ?>
        </ul>
		<?php
		custom_button( array(
			'custom_link' => 'section_3_custom_button_link',
			'radio_link'  => 'section_3_button_link',
			'button_text' => 'section_3_button_text'
		) );
		?>
    </div>
</section>
<section class="clients">
    <div class="container">
        <div class="section-header margin">
            <h2 class="headline margin"><?php echo get_theme_mod( 'section_4_headline' ) ?></h2>
            <span class="refinement"><?php echo get_theme_mod( 'section_4_refinement' ) ?></span>
        </div>
        <div class="owl-carousel owl-theme" id="owl-2">
		    <?php
		    $args = array(
			    'post_type' => 'client'
		    );

		    $the_query = new WP_Query( $args );

		    if ( $the_query->have_posts() ) :?>
			    <?php while ( $the_query->have_posts() ) : ?>
                    <div class="owl-item">
					    <?php $the_query->the_post(); ?>
                        <div class="slider-text margin"><?php the_excerpt(); ?></div>
                        <div class="row client-info">
                            <div class="rounded-circle col-md-3 client-img-container margin">
                                <?php
                                the_post_thumbnail( array(
                                    'class'=> 'img-responsive'
                                ) );
                                ?>
                            </div>
                            <div class="col-md-9">
                                <h2 class="d-block">
                                    <?php the_title(); ?>
                                </h2>
                                <span class="d-block">
                                    <?php the_field('Client_position') ?>
                                </span>
                            </div>
                        </div>
                    </div>
			    <?php endwhile; ?>
		    <?php else : //no posts ?>
		    <?php endif;
		    wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer() ?>
