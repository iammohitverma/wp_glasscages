<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A-WORDPRESS
 */

get_header();
?>


<div class="container-fluid ap-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Blog Posts</h1>
            </div>
        </div>
    </div>
</div>


<main id="primary" class="site-main">
    <div class="container-fluid ap-blogPosts">
        <div class="container">
            <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>

            <?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        </div>
    </div>

</main><!-- #main -->




<!---- you can also display post like this ----->
<div class="container-fluid ap-blogPosts d-none">
    <div class="container">

        <?php 
            $args = array(
                'post_type'=> 'post',
                'orderby'    => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => -1 // this will retrive all the post that is published 
                );
            $result = new WP_Query( $args );
            if ( $result-> have_posts() ) : ?>
        <?php while ( $result->have_posts() ) : $result->the_post(); ?>

        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9">
                <div class="box">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center">
                            <div class="inner">
                                <figure>
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?> " class="w-100">
                                </figure>
                            </div>
                        </div>
                        <div class="col-12 col-md-8 col-lg-8 d-flex align-items-center">
                            <div class="inner">
                                <a href="<?php echo get_permalink() ?>">
                                    <h3 class="hdng">
                                        <?php the_title(); ?>
                                        <!---- get post title ---->
                                    </h3>
                                </a>

                                <ul>
                                    <li>
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>
                                            <?php echo get_the_date(); ?>
                                            <!---- get post publish date ---->
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fas fa-tags"></i>
                                        <span>
                                            <?php  /*---- get post tags ----*/
                                                $posttags = get_the_category();
                                                if ($posttags) {
                                                  foreach($posttags as $tag) {
                                                    echo $tag->name . ' '; 
                                                  }
                                                }
                                            ?>
                                        </span>

                                        <span class="d-none">
                                            <?php  /*---- get post categories ----*/
                                                $postcat = get_the_category();
                                                if ($postcat) {
                                                  foreach($postcat as $cat) {
                                                    echo $cat->name . ' '; 
                                                  }
                                                }
                                            ?>
                                        </span>
                                    </li>
                                </ul>

                                <p class="cntnt">
                                    <?php /**** get post content with limit ****/ 
                                        $article_data = substr(get_the_content(), 0, 200);
                                        echo $article_data; 
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php 
            endwhile;
            endif; wp_reset_postdata();
        ?>

    </div>
</div>

<?php
/* get_sidebar(); */
get_footer();
?>
