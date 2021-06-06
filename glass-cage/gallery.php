<?php 
function galler_function(){
?>

<div class="row">                 
    <?php
//Get the images ids from the post_metadata $post->ID
$images = acf_photo_gallery('gc_gallery_wall', '7');
//Check if return array has anything in it
if( count($images) ):
    //Cool, we got some data so now let's loop over it
    foreach($images as $image):
        $id = $image['id']; // The attachment id of the media
        $title = $image['title']; //The title
        $caption= $image['caption']; //The caption
        $full_image_url= $image['full_image_url']; //Full size image url
        $full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
        $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
        $url= $image['url']; //Goto any link when clicked
        $target= $image['target']; //Open normal or new tab
        $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
        $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
    ?>
    <div class="col-xs-6 col-md-3">
        <div class="thumbnail">
            <?php if( !empty($url) ){ ?>
                <a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>>
            <?php } ?>
                <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>">
            <?php if( !empty($url) ){ ?></a><?php } ?>
        </div>
    </div>
    <?php endforeach; endif; ?>
</div>

<? } ?>