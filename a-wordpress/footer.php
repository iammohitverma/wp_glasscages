<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A-WORDPRESS
 */

?>

<footer id="colophon" class="site-footer container-fluid">
    <div class="site-info d-none">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'a-wordpress' ) ); ?>">
            <?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'a-wordpress' ), 'WordPress' );
				?>
        </a>
        <span class="sep"> | </span>
        <?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'a-wordpress' ), 'a-wordpress', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
    </div><!-- .site-info -->

    <div class="container">
        <div class="row">

            <div class="col-12">
                <p class="ftr-headline">Every month, we help 500,000+ people like you build a website.</p>
            </div>

            <div class="col-12 col-sm-12 col-md-12 text-center">
                <div class="inner">
                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo-footer.png" class="ftr-logo">
                </div>
                <div class="inner">
                    <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer',
                                    'menu' => 'footer-menu',
                                    'container_class' => 'footer-navbar',
                                )
                            )
                        ?>
                </div>
            </div>
        </div>
    </div>



</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/bootstrap/bundle/bootstrap.bundle.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/light-gallery/js/lightgallery-all.min.js"></script>

</body>

</html>


<script>
    $(document).ready(function() {
        if ($(window).width() < 992) {
            $(".dropdown").on('click', function() {
                $(".dropdown-menu").toggleClass("d-block");
            });
        }
        /***light gallery initialization ***/
        jQuery('#ul-li').lightGallery({
            mode: 'lg-fade',
            cssEasing: 'cubic-bezier(0.25, 0, 0.25, 1)',
            thumbnail: true,
            animateThumb: false,
            showThumbByDefault: false,
            thumbnail: true
        });
    });

</script>
