<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A-WORDPRESS
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <!--    <link href="<?php echo get_stylesheet_directory_uri() ?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="<?php bloginfo( 'template_url' ); ?>/assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_url' ); ?>/assets/style.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_url' ); ?>/assets/light-gallery/css/lightgallery.css" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        

        <header id="masthead" class="site-header d-none">
            <div class="site-branding">
                <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
			else :
				?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
			endif;
			$a_wordpress_description = get_bloginfo( 'description', 'display' );
			if ( $a_wordpress_description || is_customize_preview() ) :
				?>
                <p class="site-description"><?php echo $a_wordpress_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'a-wordpress' ); ?></button>
                <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
            </nav><!-- #site-navigation -->
        </header><!-- #masthead -->


        <header class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid px-0">
                                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ) ?>; ">
                                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/images/logo.png">
                                    <?php 
//                                        $custom_logo_id = get_theme_mod( 'custom_logo' );
//                                        $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
//                                        echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="Glass Cage" class="logo gc-logoBrand">';
                                    ?>
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <!--<div class="collapse navbar-collapse d-lg-flex justify-content-end" id="navbarSupportedContent">-->
                                    <ul class="navbar-nav mb-2 mb-lg-0 d-none">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Dropdown
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">Action</a></li>
                                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'header',
                                                'menu' => 'nav-bar',
                                                'menu_class' => 'navbar-nav mb-2 mb-lg-0',
                                                'menu_id'        => 'primary-menu',
                                                'container_id' => 'navbarSupportedContent',
                                                'container_class' => 'collapse navbar-collapse d-lg-flex justify-content-end',
                                            )
                                        )
                                    ?>
                                <!--</div>-->
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
