<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
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

<section class="container-fluid gc-breadcrumbs" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="gc-hdng">
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid px-0">
    <div class="container">
        <?php the_content(); ?>
    </div>
</div>

<?php
//get_sidebar();
get_footer();
