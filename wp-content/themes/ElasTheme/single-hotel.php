<?php get_header(); ?>

<?php  $subtitle = get_field('single_apartament_subtitle');
        $scroll_button = get_field('scroll_calendar_button' , 'option');



?>
<div id="single_apartament_page">
    <div class="container">
        <div class="col-md-8 left_section">
            <div class="wrapper_title_section" id="booking_form_request_title">

                <div class="top_area_single_left">
                    <h1 class="single_title_apartament"><?php the_title();?></h1>
                    <div class="single_subtitle_apartament"><?php echo $subtitle; ?></div>
                </div>
                <div class="top_area_single_right">
                    <div class="wrapper">
                        <a href="#shedule_reservation" class="bottom_scroll"><?php echo $scroll_button?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 left_section">


            <!-- SINGLE CPT SLIDER SECTION START -->

           <?php get_template_part('template-parts/single-apartament/single-apartament-slider');?>

            <!-- SINGLE CPT SLIDER SECTION END -->

            <!-- SINGLE CPT CONTENT SECTION START -->

            <?php get_template_part('template-parts/single-apartament/single-apartament-content');?>

            <!-- SINGLE CPT CONTENT SECTION END -->

            <!-- SINGLE CPT CALENDAR SECTION START -->

            <?php get_template_part('template-parts/single-apartament/single-apartament-calendar');?>

            <!-- SINGLE CPT CALENDAR SECTION END -->
     

        </div>
        <div class="col-md-4 right_section">

            <!-- SINGLE CPT CALENDAR SECTION START -->

            <?php get_template_part('template-parts/single-apartament/contact-form-sidebar');?>

            <!-- SINGLE CPT CALENDAR SECTION END -->

            <div class="map_wrapper">
                <?php

                $location = get_field('single_google_map');

                if( !empty($location) ):
                    ?>
                    <div class="acf-map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" style="display:none;"></div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>