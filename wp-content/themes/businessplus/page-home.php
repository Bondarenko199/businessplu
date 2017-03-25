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

			$the_query = new WP_Query($args);

			if ($the_query->have_posts()) :?>
                <?php while ($the_query->have_posts()) : ?>
                    <div class="owl-item">
                        <?php $the_query->the_post(); ?>
                        <div class="row d-flex flex-column">
                            <h2 class="light-text col-md-6 slider-header margin"><?php the_title(); ?></h2>
                            <div class="light-text col-md-6 slider-text margin"><?php the_excerpt(); ?></div>
                        </div>
                        <a href="<?php the_permalink() ?>" class="main-button">Read more</a>
                    </div>
                <?php endwhile; ?>
            <?php else : //no posts ?>
			<?php endif; wp_reset_postdata(); ?>
</section>
<section class="about-us">
    <div class="container">
<!--	    --><?php
//	    $the_slug = 'about-us';
//	    $args = array(
//		    'name'           => $the_slug,
//		    'post_type'      => 'post',
//		    'post_status'    => 'publish',
//		    'posts_per_page' => 1
//	    );
//	    $query = new WP_Query( $args );
//	    if ($query->have_posts()):?>
<!--		    --><?php //while ( $query->have_posts() ) : $query->the_post(); ?>
<!--                <div class="row d-flex">-->
<!--                    <div class="col-md-5 section-header margin">-->
<!--                        <h2 class="headline margin">-->
<!--                            --><?php //the_title(); ?>
<!--                        </h2>-->
<!--                        <span class="refinement">-->
<!--                            --><?php //foreach (get_post_custom_values('refinement') as $value) : echo $value?>
<!--                            --><?php //endforeach; ?>
<!--                        </span>-->
<!--                    </div>-->
<!--                    <div class="col-md-7">-->
<!--                        <div class="main-text margin">--><?php //the_excerpt(); ?><!--</div>-->
<!--                        <a href="--><?php //the_permalink(); ?><!--" class="main-button" data-text="Read more">Read more</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--		    --><?php //endwhile; ?>
<!--	    --><?php //else : //no posts ?>
<!--	    --><?php //endif; wp_reset_postdata(); ?>

        <div class="row d-flex">
            <div class="col-md-5 section-header margin">
                <h2 class="headline margin"><?php echo get_theme_mod('section_2_headline') ?></h2>
                <span class="refinement"><?php echo get_theme_mod('section_2_refinement') ?></span>
            </div>
            <div class="col-md-7">
                <p class="main-text margin"><?php echo get_theme_mod('section_2_text') ?></p>
                <a href="#" class="main-button" data-text="Read more">Read more</a>
            </div>
        </div>
    </div>
</section>
<section class="services">
    <div class="container">
        <div class="section-header margin">
            <h2 class="headline margin"><?php echo get_theme_mod('section_3_headline') ?></h2>
            <span class="refinement"><?php echo get_theme_mod('section_3_refinement') ?></span>
        </div>
    </div>
</section>

<?php get_footer() ?>
