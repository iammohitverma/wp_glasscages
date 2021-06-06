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
    <?php
    if ( is_singular() ) : /***** display all single post (from single.php) (put your html in if condition)*****/

        
    ?>



    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9">
            <div class="box-singlePost">
                <figure>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?> " class="w-100">
                </figure>

                <?php
                    the_title( '<p class="hdng d-none">', '</p>' );
                ?>

                <ul class="mt-4">
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
                                $posttags = get_the_tags();
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

                <div class="cntnt">
                    <?php /**** get post content with limit ****/ 
                        echo get_the_content(); 
                    ?>
                </div>
            </div>
        </div>
    </div>




    <?php
    else : /***** display all post (from index.php) (put your html in else condition) *****/ 
    ?>



    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-12 col-md-11 col-lg-10 col-xl-9">
            <div class="box-allPost">
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
                                            $posttags = get_the_tags();
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
                                <?php /**** get post content with limit using get content ****
                                    $article_data = substr(get_the_content(), 0, 200);
                                    echo $article_data; 
                                ****/?>
                                
                                <?php the_field('description'); ?> <!---- displaying description using ACF plugin ------>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php 
    endif;
    ?>


</article><!-- #post-<?php the_ID(); ?> -->
