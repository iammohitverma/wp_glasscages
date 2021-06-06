<?php
/**
 * The home template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/ 
 * for display all bnlog posts
 * @package Glass_Cage
 */

get_header();
?>

<?php 
    if (is_home() && get_option('page_for_posts') ) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
        $featured_image = $img[0];
    }
?>

<section class="container-fluid gc-breadcrumbs" style="background-image:url(<?php echo $featured_image; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="gc-hdng">
                    <?php echo single_post_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<main id="primary" class="site-main">
    <div class="container-fluid gc-blog-wrapper">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9">
                    <?php 
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $args = array(
                            'post_type'=> 'post',
                            'orderby'    => 'ID',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'posts_per_page' => 3, // this will retrive all the post that is published 
                            'paged'           => $paged
                            );
                        $query = new WP_Query( $args );
                        if ( $query-> have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="gc-blog-post">
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="post-image" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                            </div>
                            <div class="col-lg-8 col-12">
                                <div class="post-info">
                                    <h2 class="post-title">
                                        <a href="<?php echo get_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <span class="post-author">
                                                <a href="javascript:void(0)" target="_blank" title="<?php echo the_author(); ?>">
                                                    <?php echo the_author(); ?>
                                                </a>
                                            </span>
                                            <span class="post-date">
                                                <?php echo get_the_date(); ?>
                                            </span>
                                        </div>
                                        <div class="post-description">
                                            <p>
                                                <?php the_field('short_description'); ?> ...[Read More]
                                            </p>
                                            <a href="<?php echo get_permalink() ?>" class="gc-secondary-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endwhile;  ?>   
                        <div class="pagination gc-pagination">
                        <?php 
                            echo paginate_links( array(
                                'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                                'total'        => $query->max_num_pages,
                                'current'      => max( 1, get_query_var( 'paged' ) ),
                                'format'       => '?paged=%#%',
                                'show_all'     => false,
                                'type'         => 'plain',
                                'end_size'     => 2,
                                'mid_size'     => 1,
                                'prev_next'    => true,
                                'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
                                'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
                                'add_args'     => false,
                                'add_fragment' => '',
                            ) );
                        ?>
                    </div>      
                    <?php  endif; wp_reset_postdata();  ?>
                </div>
            </div>
        </div>
    </div>

</main><!-- #main -->


<?php
/* get_sidebar(); */
get_footer();
?>
