<?php 
    if( have_rows('gc-timeline') ):
    $timelineArr = get_field('gc-timeline');
    $i =0; 

    $latestYear = end($timelineArr);
    //echo print_r($latestYear);
?>

<div class="row gc-timeline-row" id="tl_hero_up">
    <div class="col-12">
        <div class="row d-flex justify-content-center" id="tlAnimate">
            <div class="col-12 col-sm-12 col-md-5">
                <figure>
                    <img src="<?php echo $latestYear['timeline_hero']['url']; ?>" id="tl_hero_replace">
                </figure>
            </div>

            <div class="col-12 col-sm-12 col-md-5 d-flex align-items-center">
                <div class="hero-cntnt inner">
                    <div style="--bg-color: #9d1c2d">
                        <h3>
                            <?php echo $latestYear['year']; ?>
                        </h3>
                        <h5>
                            <?php echo $latestYear['heading']; ?>
                        </h5>
                        <p>
                            <?php echo $latestYear['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 gc-timeline-pTB gc-timeline-map" id="timelineScroll">

        <ul class="gc-timeline">

            <?php 
            while( have_rows('gc-timeline') ) : the_row(); 
                $images = get_sub_field('timeline_hero' );
                
                if($i == 0){
                    $gc_tlColor = '166671';
                } else if($i == 1){
                    $gc_tlColor = '1abec6';
                } else if($i == 2){
                    $gc_tlColor = '91a210';
                } else if($i == 3){
                    $gc_tlColor = 'feab48';
                } else if($i == 4){
                    $gc_tlColor = 'f65020';
                } else if($i == 5){
                    $gc_tlColor = '9d1c2d';
                }
            
            ?>

            <li>
                <div class="gc-years gc_pulse" style="--bg-color: #<?php echo $gc_tlColor ; ?>" data="<?php echo $i; ?>">

                    <p class="gc-mobile-year">
                        <!-- get timeline year -->
                        <?php echo get_sub_field('year'); ?>
                    </p>
                    <span>
                        Year
                    </span>

                    <a href="#tl_hero_up" class="timeline-hero" data-hero="<?php echo $images['url'] ?>"> </a>

                    <div id="data-hero-cntnt" class="d-none">
                        <div style="--bg-color: #<?php echo $gc_tlColor ; ?>">
                            <h3>
                                <!-- get timeline year -->
                                <?php echo get_sub_field('year'); ?>
                            </h3>
                            <h5>
                                <?php echo get_sub_field('heading'); ?>
                            </h5>
                            <p>
                                <?php echo get_sub_field('description'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="gc-desc-wrapper" style="--bg-color: #<?php echo $gc_tlColor ; ?>">
                    <div class="outer">
                        <span>
                            <!-- get timeline year -->
                            <?php echo get_sub_field('year'); ?>
                        </span>
                    </div>
                </div>
            </li>

            <?php 
                $i++;
                if($i == 6){
                    $i = 0;
                }
                endwhile; 
            ?>

        </ul>
    </div>


    <div class="col-12 gc-bg-white">
        <div class="row">
<!--
            <div class="col-6">
                
            </div>
-->
            <div class="col-12 d-flex flex-wrap justify-content-center">
                <span id="scroll" onclick="timelineScrollLeft();" class="leftScroll">
                    <!--- btn --->
                </span>
                
                <a href="https://glasscages.com/our-story/" class="stry-btn gc-secondary-btn">Our Story</a>

                <span id="scroll" onclick="timelineScrollRight();" class="rightScroll">
                    <!--- btn --->
                </span>
            </div>
        </div>
    </div>
</div>


<?php 
// No value.
else :
// Do something...

endif;
?>

<script>
    jQuery(document).ready(function() {
        jQuery(".timeline-hero").click(function() {
            var tl_image = jQuery(this).data('hero');

            var tl_cntnt = jQuery(this).siblings("#data-hero-cntnt").html();
            jQuery("#tl_hero_replace").attr("src", tl_image);
            jQuery(".hero-cntnt").html(tl_cntnt);
            jQuery("#tlAnimate").addClass("animate__animated animate__zoomIn")

            setTimeout(RemoveClass, 1000);
        });
    });


    function RemoveClass() {
        jQuery('#tlAnimate').removeClass("animate__animated animate__zoomIn");
    }

</script>
