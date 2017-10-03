<?php

//SECTION FOR ALL ITEM TABS START

require('template/section_all_item_tab.php');

// END SECTION FOR ALL ITEM TABS

//START SECTION FOR CATEGORY TABS
foreach($categories as $category) {
    echo '<div class="tab-pane " id="' . $category->slug.'"><div class="wrapp frame"><ul class="clearfix">';
    $the_query = new WP_Query(array(
        'post_type'    => 'hotel',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 0,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'taxonomy'     => 'category',
        'pad_counts'   => false,
        'category_name' => $category->slug,
    ));
    while ( $the_query->have_posts() ) :
        $the_query->the_post();?>
        <?php $image = get_the_post_thumbnail_url($post->ID,'custom-thumb')?>

        <div class="wrapper_posts_item <?php $categories = get_the_category($post_id);
        if($categories){
            foreach($categories as $category) {
                echo  $category->slug ;
            }
        }?>">
            <?php     $single_description = get_field('single_description');?>
            <?php     $subtitle = get_field('single_apartament_subtitle');?>
            <?php $image = get_the_post_thumbnail_url($post->ID,'custom-thumb')?>
            <a href="<?php  the_permalink();?>">
                <div class="thumb_item_post" style="background-image: url('<?php echo $image ?>');">
                    <?php if (get_field('basic_price_shown_in_image')): ?>
                        <div class="price_data" style="background-color: <?php the_field('basic_price_shown_in_image_color') ?>"><?php the_field('basic_price_shown_in_image'); ?></div>

                    <?php  endif; ?>
                </div>
            </a>
            <div class="date_item_post"><h3><a href="<?php the_permalink(); ?>" class="title_posts"><?php the_title();?></a></h3>
                <h4 class="subtitle_hotel"><?php echo $single_description; ?></h4>
        <?php if (get_field('single_apartament_subtitle')): ?>
                <span class="entry-date"><?php echo $subtitle; ?></span>
        <?php endif; ?>
            </div>
        </div>



    <?php endwhile;?>
    <?php   $bloginfo1 =  get_template_directory_uri();

    echo "</ul></div>  <div class='scrollbar'>
                            <div class='handle'>
                                <div class='mousearea'></div>
                            </div>
                             <img class='dots_style' src=' " . $bloginfo1 . "/img/DOTS.jpg'  alt='dots'>
                        </div>   </div>";

}
