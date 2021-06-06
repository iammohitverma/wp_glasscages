<?php 
//function gc_gallery_function($gc_atts){
//    $gc_default = array(
//        'id' => '0',
//    );
//    $page_id = shortcode_atts($gc_default, $gc_atts);
    
?>


    <ul id="ul-li" class="d-flex flex-wrap justify-content-center pl-0 float-left m-0">                
        <?php
        //Get the images ids from the post_metadata $post->ID
        $gc_images = acf_photo_gallery('gc_gallery_wall', $gc_page_id['id']);
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

<? //} ?>

