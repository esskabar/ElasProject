<?php
?>
<section id="section_item_gallery">
    <div class="content">
        <?php if (get_sub_field('icon')): ?>
            <div class="icon-wrap">
                <div class="icon" ></div><!--style="background-image: url('<?php /*the_sub_field('icon') */?>')"-->
            </div>
        <?php endif; ?>

        <?php if (get_sub_field('title')): ?>
            <h1 class="title">

                <?php the_sub_field('title') ?>

            </h1>
        <?php endif; ?>

        <?php if (get_sub_field('title_description')): ?>
            <div class="title_description">

                <?php the_sub_field('title_description') ?>

            </div>
        <?php endif; ?>

    </div>

    <div class="container-fluid">
        <div class="tabs_item_block">
            <?php
            echo '<div class="wrapper_title_categories">
                    <ul class="nav nav-tabs title_categories" role="tablist">';?>
            <?php
            $args_hotels = array(
                'post_type'     => 'hotel',
                'taxonomy'      => 'category',
                'hide_empty'    => true,
                'exclude'       => 1
            );
            $categories = get_terms( $args_hotels );

            ?>
            <li class="categories_list first_tab" role="presentation"><a href="#all_item" role="tab" data-toggle="tab">All</a></li>

            <?php
            foreach($categories as $category) {
                echo '<li class="categories_list" role="presentation"><a href="#'.$category->slug.'" role="tab" data-toggle="tab"> '.$category->name.'</a></li>';
            }
            echo '</ul></div>';?>


            <?php echo '<div class="tab-content">';

            // SECTION TABS FOR HOME PAGE START

            require('section-content_gallery.php');

            // SECTION TABS FOR HOME PAGE END

            echo '</div>';
            ?>
        </div>
    </div>

</section>
<?php wp_reset_postdata(); ?>
