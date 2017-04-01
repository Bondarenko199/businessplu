<?php /* Template Name: Home */

get_header();
?>

<section class="intro">
    <div class="container">
        <div class="owl-carousel owl-theme" id="owl">
			<?php
			$args = array(
				'post_type'     => 'slide',
				'category_name' => 'intro-slides'
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :?>
				<?php while ( $the_query->have_posts() ) : ?>
                    <div class="owl-item">
						<?php $the_query->the_post(); ?>
                        <div class="row text-sm-center text-md-left flex-column">
                            <h2 class="light-text col-md-6 col-sm-12 slider-headline margin"><?php the_title(); ?></h2>
                            <div class="light-text col-md-6 col-sm-12 slider-text margin"><?php the_excerpt(); ?></div>
                        </div>
                        <a href="<?php the_permalink() ?>" class="main-button">Read more</a>
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
					'custom_link'   => 'section_2_custom_button_link',
					'dropdown_link' => 'section_2_button_link',
					'button_text'   => 'section_2_button_text'
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
				'post_type'      => 'service',
				'posts_per_page' => 4
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :
				$count = 0;
				while ( $the_query->have_posts() ) :
					$count ++ ?>
                    <li class="col-md-6 col-sm-12 service-container margin">
						<?php $the_query->the_post(); ?>
                        <div class="row justify-content-end">
                            <div class="col-10 col-sm-8">
                                <h3 class="service-headline margin"><?php the_title(); ?></h3>
                                <div class="service-text"><?php the_excerpt(); ?></div>
                            </div>
                        </div>
                        <a href="<?php the_permalink() ?>" class="service-hover mid-tone-text fa fa-<?php echo sanitize_title_with_dashes( get_theme_mod( 'service_' . $count ) );
						if ( $count == 4 ) {
							$count = 0;
						} ?> fa-5x"></a>
                    </li>
				<?php endwhile; ?>
			<?php else : //no posts ?>
			<?php endif;
			wp_reset_postdata(); ?>
        </ul>
		<?php
		custom_button( array(
			'custom_link'   => 'section_3_custom_button_link',
			'dropdown_link' => 'section_3_button_link',
			'button_text'   => 'section_3_button_text'
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
        <div class="owl-carousel owl-theme custom-owl" id="owlSecond">
			<?php
			$args = array(
				'post_type' => 'client',
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :
				$count = 0;
				while ( $the_query->have_posts() ) :
					$count ++;
					?>
                    <div class="client-container <?php
					switch ( $count ) {
						case( 1 ):
							echo 'grey-quote-bg';
							break;
						case( 2 ):
							echo 'blue-quote-bg';
							break;
						case( 3 ):
							echo 'pink-quote-bg';
							$count = 0;
							break;
					};
					?>">
						<?php $the_query->the_post(); ?>
                        <div class="client-text margin"><?php the_excerpt(); ?></div>
                        <div class="row client-info">
                            <div class="rounded-circle col-md-3 client-img-container margin">
								<?php
								the_post_thumbnail( 'medium', array(
									'class' => 'img-responsive'
								) );
								?>
                            </div>
                            <div class="col-md-9">
                                <h2 class="d-block client-name margin"><?php the_title(); ?></h2>
                                <span class="d-block client-position margin"><?php the_field( 'Client_position' ) ?></span>
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
<section class="news mid-tone-bg">
    <div class="container">
        <div class="section-header margin">
            <h2 class="headline margin"><?php echo get_theme_mod( 'section_5_headline' ) ?></h2>
            <span class="refinement"><?php echo get_theme_mod( 'section_5_refinement' ) ?></span>
        </div>
        <ul class="clearfix news-list">
			<?php

			global $post;
			$args = array(
				'posts_per_page' => 3,
				'category_name'  => 'news'
			);

			$news_posts = get_posts( $args );
			foreach ( $news_posts as $post ) : setup_postdata( $post ); ?>
				<?php if ( $post == $news_posts[0] ) : ?>
                    <li class="row w-50 float-left first-news-post">
                        <div class="col-2 first-news-post-info">
                            <span class="d-block"><?php echo get_the_date( 'd M-Y' ) ?></span>
                            <span class="d-block"><?php the_author() ?></span>
                            <span class="d-block"><?php comments_number(
									$zero = 'No Com',
									$more = '%-Com'
								) ?></span>


                        </div>
                        <div class="col-10">
                            <div class="news-img-container margin">
                                <a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium', array(
										'class' => 'img-responsive',
									) ) ?>
                                </a>

                            </div>
                            <h3 class="dark-text news-headline margin"><?php the_title() ?></h3>
                            <div class="news-text"><?php the_excerpt(); ?></div>
                        </div>
                    </li>
				<?php else: ?>
                    <li class="w-50 float-md-right news-container margin <?php if ( $post == $news_posts[1] ) {
						echo 'border-bottom';
					}; ?>">
                        <h3 class="dark-text news-headline margin"><?php the_title() ?></h3>
                        <span class="d-block color-text news-date margin"><?php echo get_the_date( 'd-M-Y' ) ?></span>
                        <div class="news-text"><?php the_excerpt(); ?></div>
                    </li>
				<?php endif; ?>
			<?php endforeach;
			wp_reset_postdata(); ?>
        </ul>
    </div>
</section>
<section class="partners">
    <div class="container">
        <div class="section-header margin">
            <h2 class="headline margin"><?php echo get_theme_mod( 'section_6_headline' ) ?></h2>
            <span class="refinement"><?php echo get_theme_mod( 'section_6_refinement' ) ?></span>
        </div>
        <div class="owl-carousel owl-theme custom-owl" id="owl-3">
			<?php
			$args = array(
				'post_type'     => 'slide',
				'category_name' => 'partners-slides',
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) :?>
				<?php while ( $the_query->have_posts() ) : ?>
                    <div class="d-flex align-items-center partner-container">
						<?php $the_query->the_post(); ?>
						<?php
						the_post_thumbnail( 'medium', array(
							'class' => 'img-responsive'
						) );
						?>
                    </div>
				<?php endwhile; ?>
			<?php else : //no posts ?>
			<?php endif;
			wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php get_footer() ?>
