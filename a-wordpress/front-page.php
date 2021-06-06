<?php
/**
 * Template Name: Front Page
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
 * @package A-WORDPRESS
 */

get_header();
?>
<div class="container-fluid px-0">
    <?php the_content(); ?>
</div>

<?php
get_footer();
?>
