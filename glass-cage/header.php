<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Glass_Cage
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/gif" sizes="16x16">

    <?php wp_head(); ?>

    <link href="<?php bloginfo( 'template_url' ); ?>/assets/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_url' ); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_url' ); ?>/assets/light-gallery/css/lightgallery.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_url' ); ?>/assets/style.css" rel="stylesheet">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-522059-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-522059-1');
	</script>
</head>

<body <?php body_class(); ?>  onload="myFunctionScroll()">
    <?php wp_body_open(); ?>
    <div id="page" class="site">

        <?php if ( !is_404() ) { ?>
        <div class="container-fluid gc-top-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-4 left">

                        <?php
                            if (is_active_sidebar('mail-widgets')) {
                                dynamic_sidebar('mail-widgets');
                            }
                        ?>

                    </div>

                    <div class="col-md-4 d-none d-md-block text-center">
                        <p>
							<b>
								Made in the USA <img src="https://glasscages.com/wp-content/uploads/2021/03/united-states.png">
								<span>Since 1988</span>
							</b>
						</p>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 right">
                        <?php
                            if (is_active_sidebar('social-widgets')) {
                                dynamic_sidebar('social-widgets');
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <header class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="gc-nav-bar">
                            <div class="gc-logo d-flex align-items-center flex-wrap">
                                <!--<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo.png" class="logo">-->

                                <!-- <h1 class="gc-logoBrand">GlassCage.com</h1>-->

                                <a href="<?php echo get_home_url() ?>">
                                    <?php 
                                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                                        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                                        echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="Glass Cage" class="logo gc-logoBrand">';
                                    ?>
                                </a>
                            </div>

                            <div class="gc-toggler" id="gc-toggle">
                                <i class="fas fa-bars"></i>
                            </div>

                            <div class="gc-menu">
                                <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'header',
                                                'menu' => 'header-menu',
                                                'menu_class' => 'gc-navbar-wrapper mb-2 mb-lg-0',
                                                'menu_id'        => 'primary-menu',
                                                'container_class' => 'd-lg-flex justify-content-end',
                                            )
                                        )
                                    ?>
                            </div>
                            <div class="gc-call-to-action d-flex align-items-center justify-content-end">
                                <a href="tel:615-446-8877" class="gc-secondary-btn">Call Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <?php } ?>
