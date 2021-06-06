<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Glass_Cage
 *
 * for display single blog post
 */

get_header();
?>

<main id="primary" class="site-main">

    <div class="container-fluid gc-single-post">
        <div class="container">

            <?php
            while ( have_posts() ) : the_post();

        ?>

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9">
                    <div class="inner">
                        <?php
                            the_title( '<h2 class="post-title">', '</h2>' );
                        ?>

                        <ul class="post-tags">
                            <li>
                                <i class="fas fa-calendar-alt"></i>
                                <span>
                                    <?php echo get_the_date(); ?>
                                    <!---- get post publish date ---->
                                </span>
                            </li>
                            <li>
                                <i class="fas fa-user"></i>
                                <span>
                                    <?php echo the_author(); ?>
                                </span>
                            </li>
                        </ul>

                        <figure class="feat-image">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?> " class="w-100">
                        </figure>

                        <div class="post-cntnt">
                            <?php /**** get post content with limit ****/ 
                            echo get_the_content(); 
                        ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php 

            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'glass-cage' ) . '</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next', 'glass-cage' ) . '</span> ',
                )
            );

            ?>
            <?php endwhile; // End of the loop. ?>


        </div>
    </div>

    <div class="container-fluid comment-main-wrapper">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9">
                    <div class="inner">

                        <?php 
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main><!-- #main -->

<?php
get_footer();
?>
