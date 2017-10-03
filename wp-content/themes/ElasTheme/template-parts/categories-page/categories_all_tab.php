<div class="tab-pane" id="all_item">
    <div class="wrapp frame">
        <?php
        $args = array(
            'post_type' => 'hotel',
            'post_status' => 'publish',
            'taxonomy' => 'category',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);


        if ($query->have_posts()) {

            // Start the Loop
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="wrapper_posts_item">
                    <?php $subtitle = get_field('single_apartament_subtitle'); ?>
                    <?php $single_description = get_field('single_description'); ?>
                    <?php $single_description = get_field('single_description'); ?>
                    <?php $image = get_the_post_thumbnail_url($post->ID, 'custom-thumb') ?>
                    <a href="<?php the_permalink(); ?>" >
                        <div class="thumb_item_post" style="background-image: url('<?php echo $image ?>');">
                            <?php if (get_field('basic_price_shown_in_image')): ?>
                                <div class="price_data"
                                     style="background-color: <?php the_field('basic_price_shown_in_image_color') ?>"><?php the_field('basic_price_shown_in_image'); ?></div>
                            <?php endif; ?>

                        </div>
                    </a>
                    <div class="date_item_post">
                        <h3><a href="<?php the_permalink(); ?>" class="title_posts"
                             ><?php the_title(); ?></a></h3>
                        <?php if ($single_description): ?>
                            <div class="single_description phone"><?php echo $single_description ?></div>
                        <?php endif; ?>
                        <?php if ($subtitle): ?>
                            <div class="entry-date"><?php echo $subtitle; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile;
        }

        // Reset the WP Query
        wp_reset_postdata(); ?>
    </div>
</div>