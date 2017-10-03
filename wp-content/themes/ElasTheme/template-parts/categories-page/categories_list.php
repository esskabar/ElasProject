<?php

foreach ($categories as $category) {
echo '<div class="tab-pane" id="' . $category->slug . '">';
    $the_query = new WP_Query(array(
    'post_type' => 'hotel',
    'child_of' => 0,
    'parent' => '',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => 0,
    'hierarchical' => 1,
    'exclude' => '',
    'include' => '',
    'number' => 0,
    'taxonomy' => 'category',
    'pad_counts' => false,
    'category_name' => $category->slug,
    ));
    while ($the_query->have_posts()) :
    $the_query->the_post(); ?>
    <?php $image = get_the_post_thumbnail_url($post->ID, 'custom-thumb') ?>

    <div class="wrapper_posts_item">

        <a href="<?php the_permalink(); ?>">
            <div class="thumb_item_post" style="background-image: url('<?php echo $image; ?>');">
                <?php if (get_field('basic_price_shown_in_image')): ?>
                    <div class="price_data" style="background-color: <?php the_field('basic_price_shown_in_image_color') ?>"><?php the_field('basic_price_shown_in_image'); ?></div>
                <?php  endif; ?>
            </div>
        </a>

        <div class="date_item_post"><h3><a href="<?php the_permalink(); ?>" class="title_posts" ><?php the_title(); ?></a></h3>
            <span class="entry-date"><?php echo get_the_date(); ?></span>
        </div>

    </div>

<?php endwhile;
echo '</div>';
}

// SECTION TABS FOR HOME PAGE END