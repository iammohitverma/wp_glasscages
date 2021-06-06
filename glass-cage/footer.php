<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glass_Cage
 */

?>


<footer class="site-footer" id="colophon">
    <div class="container-fluid footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-lg-0 mb-5">
                    <div class="footer-logo">
                        <a href="<?php echo get_home_url() ?>">
                            <img class="img-fluid" src="https://glasscages.com/wp-content/uploads/2021/02/footer-logo-e1613624087916.png" alt="footer logo" />
                        </a>
                    </div>
                    <?php
                        if (is_active_sidebar('footer-short-desc-widgets')) {
                            dynamic_sidebar('footer-short-desc-widgets');
                        }
                    ?>
                </div>
                <div class="col-lg-4 col-md-12 mb-lg-0 mb-5">
                    <h4 class="f-title text-white">Explore</h4>
                    <div class="footer-nav">
                        <!--
                        <ul>
                            <li><a href="#">Social Media</a></li>
                            <li><a href="#">Ask Joe</a></li>
                            <li><a href="#">Warranty</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Ordering and Shipping Info</a></li>
                            <li><a href="#">Switch to old site</a></li>
                        </ul>
-->

                        <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer',
                                        'menu' => 'footer-menu',
                                    )
                                )
                            ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-lg-0">
                    <h4 class="f-title text-white">Email</h4>
                    <!--
                    <h4 class="f-title text-white">Newsletter</h4>
                    <div class="email-subscribe">
                        <?#php echo do_shortcode("[email-subscribers-form id='1']"); ?>
                    </div>
-->
                    <div class="address">
                        <?php
                            if (is_active_sidebar('mail-widgets')) {
                                dynamic_sidebar('mail-widgets');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="copyright-bar container">

            <div class="row">
                <div class="col-12 col-sm-6 left">
                    <p class="mb-md-0 copyright-text">@ Copyright 2021 by Glasscages</p>
                </div>

                <div class="col-12 col-sm-6 right">
                    <?php
                            if (is_active_sidebar('social-widgets')) {
                                dynamic_sidebar('social-widgets');
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>



<!--<script src="<?php bloginfo( 'template_url' ); ?>/assets/jquery/jquery-3.5.1.slim.min.js"></script>-->
<script src="<?php bloginfo( 'template_url' ); ?>/assets/bootstrap/js/popper.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php bloginfo( 'template_url' ); ?>/assets/light-gallery/js/lightgallery-all.min.js"></script>
<!-- <script src="https://www.google.com/recaptcha/api.js?render=6LfLNJYaAAAAAE_fZc0hG8U1919zx8jRNLvPysz3"></script> -->

<script>
    jQuery(document).ready(function() {

        /*** main menu toggle ***/
        jQuery("#gc-toggle").click(function() {
            //jQuery(".gc-menu").toggleClass("gc-show");
            jQuery(".gc-menu").slideToggle();

        })

        /*** sidebar toggle and backdrop ***/
        jQuery("#gc-sidebar-toggler").click(function() {
            jQuery("#gc-sidebar-wrapper").toggleClass("gc-sidebar-show");
            jQuery(".gc-backdrop").addClass("backdrop-show");
        })

        jQuery(".gc-backdrop").click(function() {
            jQuery("#gc-sidebar-wrapper").removeClass("gc-sidebar-show");
            jQuery(this).removeClass("backdrop-show");
        })

        jQuery(".gc-sidebar-close").click(function() {
            jQuery("#gc-sidebar-wrapper").removeClass("gc-sidebar-show");
            jQuery(".gc-backdrop").removeClass("backdrop-show");
        })


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



    var elmnt = document.getElementById("timelineScroll");

    function timelineScrollRight() {
        var slX = elmnt.scrollLeft;
        //alert(slX);
        slX = slX + 600;
        elmnt.scrollTo(slX, 0);
        //console.log(slX);
    }

    function timelineScrollLeft() {
        var srX = elmnt.scrollLeft;
        //alert(slX);
        srX = srX - 600;
        elmnt.scrollTo(srX, 0);
        //console.log(slX);
    }

    function myFunctionScroll() {
//        var slX = elmnt.scrollLeft;
//        //alert(slX);
//        slX = slX + 600;
        elmnt.scrollTo(1500, 0);
        //console.log(slX);
    }
	jQuery('.gc-product-table tr td').html(function(i,h){
		return h.replace(/&nbsp;/g,'');
	});

</script>
</body>

</html>
