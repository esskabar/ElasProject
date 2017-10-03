<?php get_header(); ?>

    <div class="our_apartments">

        <div class="content">

            <?php if (get_field('title', 'option')): ?>
                <h1 class="title">

                    <?php the_field('title', 'option'); ?>

                </h1>
            <?php endif; ?>

            <?php if (get_field('title_description', 'option')): ?>
                <div class="title_desc">

                    <?php the_field('title_description', 'option') ?>

                </div>
            <?php endif; ?>


            <div class="tabs_item_block">
                <?php

                $args_hotels = array(
                    'post_type' => 'hotel',
                    'taxonomy' => 'category',
                    'hide_empty' => true,
                    'exclude' => 1
                );
                $categories = get_terms($args_hotels);

                echo '<div class="wrapper_title_categories dropdown btn-group">

                <button class="dropdown-style btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
               
                <span data-bind="label">All</span><span class="caret"></span></button>
                  <ul class="nav nav-tabs title_categories dropdown-menu" role="tablist" aria-labelledby="dropdownMenu">'; ?>

                <li class="categories_list first_tab"><a href="#all_item" role="tab" data-toggle="tab">All</a></li>

                <?php
                foreach ($categories as $category) {
                    echo '<li role="presentation" class="categories_list"><a href="#' . $category->slug . '" role="tab" data-toggle="tab"> ' . $category->name . '</a></li>';
                }
                echo '</ul>
                </div>'; ?>

            </div>
        </div>
    </div>

            <div class="col-md-12 categories_section">


                <?php echo '<div class="tab-content">';

                // SECTION TABS FOR HOME PAGE START
                ?>
                <!-- SECTION FOR ALL ITEM CPT -->

                <?php require('categories_all_tab.php'); ?>

                <!-- SECTION FOR SINGLE CATEGORIE  ITEM CPT -->

                <?php require('categories_list.php'); ?>

                <?php echo '</div>';
                ?>
            </div>

<?php get_footer(); ?>