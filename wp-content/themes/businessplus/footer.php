<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package businessplus
 */

?>
<footer class="dark-bg main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-element margin">
                <span class="d-block footer-logo-container margin">
                    <?php echo get_custom_logo() ?>
                </span>
                <span class="d-block text-uppercase mid-tone-text rights margin"><?php echo __( '2015 &copy lawyer.', 'businessplus' ) ?></span>
                <ul class="d-flex social-list">
					<?php custom_social( array(
						get_theme_mod( 'social_1' ),
						get_theme_mod( 'social_2' ),
						get_theme_mod( 'social_3' ),
						get_theme_mod( 'social_4' ),
					) ) ?>
                </ul>
            </div>
            <div class="col-md-4 footer-element margin">
                <h2 class="text-uppercase light-text footer-headline margin"><?php echo __('Navigation') ?></h2>
				<?php wp_nav_menu( array(
					'menu_class'     => 'd-flex flex-column footer-nav',
					'theme_location' => 'menu-footer',
					'menu_id'        => '',
				) ); ?>
            </div>
            <div class="col-md-5 footer-element margin">
                <h2 class="text-uppercase light-text footer-headline margin"><?php echo __('Quick contact us') ?></h2>
                <?php echo do_shortcode('[contact-form-7 id="248" title="Footer Form"]') ?>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>
</html>
