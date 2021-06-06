<?php
/**
 * Template Name: Gallery Album View
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

<?php  
$yes = $_GET['album'];
$args = array(
    'post_type'=> 'gc-gallery-album',
    'name' => $yes,
    );
$the_query = new WP_Query( $args );
$result = $the_query->posts;

//echo "<pre>";
//print_r($result[0]);
//print_r($the_query);

//echo $result[0]->post_title;
//echo $result[0]->ID;

$src = wp_get_attachment_image_src( get_post_thumbnail_id($result[0]->ID), 'thumbnail_size' );
$url = $src[0];
?>

<section class="container-fluid gc-breadcrumbs" style="background-image:url(<?php echo $url; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="gc-hdng">
                    <?php echo $result[0]->post_title; ?>
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid gc-pTB">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="inner">

  
                        <ul id="ul-li" class="gc-gallery-view-album d-flex flex-wrap justify-content-center pl-0 float-left m-0">                
                        <?php
                        //Get the images ids from the post_metadata $post->ID
//                            echo "<pre>";
//                            print_r($result);
//                            echo "</pre>";
                        $gc_images = acf_photo_gallery('gallery_album', $result[0]->ID);
                        //Check if return array has anything in it
                        if( count($gc_images) ):
                            //Cool, we got some data so now let's loop over it
                            foreach($gc_images as $gc_image):
                                $id = $gc_image['id']; // The attachment id of the media
                                $title = $gc_image['title']; //The title
                                $full_image_url= $gc_image['full_image_url']; //Full size image url
                                $thumbnail_image_url= $gc_image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                                $thumbnail_image_url = acf_photo_gallery_resize_image($full_image_url, 300, 250); //Resized size to 262px width by 160px height image url
                            ?>

                            <li class="list-unstyled" data-src="<?php echo $full_image_url; ?>">
                                <img src="<?php echo $thumbnail_image_url; ?>" alt="<?php echo $title; ?>" />
                            </li>


                        <?php endforeach; endif; ?>

                        </ul>

                    
                    
                    
                       

                </div>
            </div>


        </div>
    </div>
</div>
<?php ?>



<?php
get_footer();
?>
