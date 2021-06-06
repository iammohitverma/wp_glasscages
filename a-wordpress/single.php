<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package A-WORDPRESS
 */

get_header();
?>

<div class="container-fluid ap-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    <?php echo get_the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</div>

<main id="primary" class="site-main">
    <div class="container-fluid ap-blogPosts">
        <div class="container">
            <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'a-wordpress' ) . '</span> <span class="d-none nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'a-wordpress' ) . '</span> <span class="d-none nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
        </div>
    </div>
</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
