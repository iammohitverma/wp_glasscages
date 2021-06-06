<?php
/**
 * Template Name: Gallery Album
 *
 * @package WordPress
 * @subpackage Glass Cage
 * @since Glass Cage 1.0
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

<div class="container-fluid gc-pTB gc-album">
    <div class="container">
        <div class="row">

            <?php
                $args = array(
                    'post_type'=> 'gc-gallery-album',
                    'orderby'   => 'menu_order',
                    'order'    => 'ASC',
                    'posts_per_page' => 24
                );              

                $the_query = new WP_Query( $args );
                if($the_query->have_posts() ) : 
                   //while ( $the_query->have_posts() ) : 
                       $the_query->the_post(); 
                        $post_name = get_the_title();
                       
                        $result = $the_query->posts;
              
            
            foreach($result as $results){ 
                
            
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($results->ID), 'thumbnail_size' );
                $url = $src[0];
            ?>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 box">
                <div class="inner">
                    <a href="<?php get_site_url()?>/gallery-view/?album=<?php echo $results->post_name; ?>">
                        <figure>
                            
                            <?php if($url == ''){ ?>
                            <img src="https://glasscages2.tmdemo.in/wp-content/uploads/2021/02/placeholder-images-image_large.png" class="w-100">
                            <?php } else{ ?> 
                            <img src=" <?php echo $url; ?> " class="w-100">
                            <?php } ?>

                            <figcaption>
                                <?php echo $results->post_title ?>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            </div>
           <?php } 
            //endwhile; 
                    wp_reset_postdata(); 
                else: 
                endif;
            ?>
        </div>
    </div>
</div>




<?php
get_footer();
?>
