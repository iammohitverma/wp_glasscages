<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package A-WORDPRESS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9">
            <div class="box-singleProduct">
                <?php /**** get post content with limit ****/ 
                    echo the_content(); 
                ?>
            </div>
        </div>
    </div>



</article><!-- #post-<?php the_ID(); ?> -->
