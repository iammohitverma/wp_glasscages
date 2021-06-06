<?php
/**
 * Template Name: Service Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 *
 * The Custom template for displaying any user choosen  pages
 *
 * This is the template that displays all user choosen page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Glass_Cage
 */

get_header();
?>

<div class="container-fluid gc-pTB gc-service-body" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-3 zIndx-b">
                <div class="row position-sticky" style="top:0px">
                    <div class="col-12">

                        <div class="gc-sidebar-toggle-wrapper d-lg-none">
                            <p id="gc-sidebar-toggler"></p>
                            <div class="gc-backdrop"></div>
                        </div>

                        <div class="inner" id="gc-sidebar-wrapper">

                            <span class="gc-sidebar-close d-lg-none">
                                <i class="fas fa-times"></i> &nbsp; CLOSE
                            </span>

                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'sidebar',
                                        'menu' => 'side-bar-menu',
                                        'menu_class' => 'gc-sidebar-wrapper',
                                        'menu_id'        => 'sidebar-menu',
                                        'container_class' => 'sidebar-container',
                                    )
                                )
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9 zIndx-s">
                <div class="inner">

                    <?php the_content(); ?>

                </div>
            </div>
        </div>
    </div>
</div>




<?php
get_footer();
?>
