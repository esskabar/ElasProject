<div class="content">

    <div class="gallery_featured_info">

        <?php
        $first_column = get_field('gallery_featured_info_first_column');
        $second_column = get_field('gallery_featured_info_second_column');
        $third_column = get_field('gallery_featured_info_third_column');
        $four_column = get_field('gallery_featured_info_four_column'); ?>

        <div class="wraper_featured">
            <div class="gallery_featured_info_first_column"><?php echo $first_column ?></div>
            <div class="gallery_featured_info_second_column"><?php echo $second_column ?></div>
            <div class="gallery_featured_info_third_column"><?php echo $third_column ?></div>
            <div class="gallery_featured_info_four_column"><?php echo $four_column ?></div>
        </div>

    </div>


    <div class="gallery_info">

        <?php $title_description = get_field('single_title_description');
        $textarea_description = get_field('textarea_description');
        $title_price = get_field('apartament_price_subtitle', 'option');
        $village_location_subtitle = get_field('village_location_subtitle', 'option');
        $living_space_subtitle = get_field('living_space_subtitle', 'option');
        $equipment_description_subtitle = get_field('equipment_description_subtitle', 'option');

        ?>

        <div class="wraper_info">
            <h3 class="title_description"><?php echo $title_description ?></h3>
            <div class="textarea_description"><?php echo $textarea_description ?></div>
            <div class="price_wrapper_section">
                <div class="title_price_section"><?php echo $title_price ?></div>
                <div class="wrapper_notification_price">
                    <?php
                    // check if the repeater field has rows of data
                    if (have_rows('single_price_table')):
                        // loop through the rows of data
                        while (have_rows('single_price_table')) : the_row();
                            // display a sub field value?>
                            <div class="wrapper">
                                <div class="notification_price"><?php the_sub_field('price_subtitle_duration'); ?></div>
                                <div class="price_list"><?php the_sub_field('price_of_the_room'); ?></div>
                            </div>
                            <?php

                        endwhile;
                    else :
                        // no rows found
                    endif;
                    ?>
                </div>

            </div>

            <div class="location_wrapper_section">
                <div class="title_location_section"><?php echo $village_location_subtitle ?></div>
                <div class="address_location"><?php the_field('name_of_the_settlement') ?></div>
            </div>
            <div class="living_space_wrapper_section">
                <div class="title_living_space_section"><?php echo $living_space_subtitle ?></div>
                <div class="wrapper_living_space">
                <?php
                // check if the repeater field has rows of data
                if (have_rows('single_living_space')):
                    // loop through the rows of data
                    while (have_rows('single_living_space')) : the_row();
                        // display a sub field value?>
                        <div class="living_space_description_wrapper">
                            <div class="living_space_label"><?php the_sub_field('single_living_space_label'); ?></div>
                            <div class="living_space_value"><?php the_sub_field('single_living_space_value'); ?></div>
                        </div>
                        <?php
                    endwhile;
                else :
                    // no rows found
                endif;
                ?>
                </div>
            </div>

            <div class="equipment_wrapper">
                <div class="title_equipment"><?php echo $equipment_description_subtitle ?></div>
                <div  class="wrapper_equipment_notation">
                <?php
                // check if the repeater field has rows of data
                if (have_rows('single_equipment_notation')):
                    // loop through the rows of data
                    while (have_rows('single_equipment_notation')) : the_row();
                        // display a sub field value?>
                        <div class="equipment_description_wrapper">
                            <div class="equipment_left_column"><?php the_sub_field('single_equipment_notation_first_column'); ?></div>
                            <div class="equipment_right_column"><?php the_sub_field('single_equipment_notation_second_column'); ?></div>
                        </div>
                        <?php
                    endwhile;
                else :
                    // no rows found
                endif;
                ?>
                </div>
            </div>
        </div>

    </div>
</div>