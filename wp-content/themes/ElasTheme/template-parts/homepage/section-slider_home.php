
<section class="slider_home" id="sliderhome">

    <div class="content">


        <?php if (get_sub_field('star')): ?>
            <div class="star-wrap">
                <spam class="left"></spam>

                        <img class="star" src=" <?php the_sub_field('star') ?>">
                        <img class="star" src=" <?php the_sub_field('star') ?>">
                        <img class="star" src=" <?php the_sub_field('star') ?>">
                        <img class="star" src=" <?php the_sub_field('star') ?>">
                        <img class="star" src=" <?php the_sub_field('star') ?>">

                <spam class="right"></spam>

            </div>
        <?php endif; ?>


        <?php if (get_sub_field('title')): ?>
            <h3 class="title">

                <?php the_sub_field('title') ?>

            </h3>
        <?php endif; ?>
    </div>






    <div class="slider-row">

        <div class="slider-wrap">

            <div class=" slider-home-card ">

                <?php

                if (have_rows('slider_data')): ?>

                    <?php while (have_rows('slider_data')) : the_row(); ?>

                        <div class="item">
                            <?php if (get_sub_field('description')): ?>
                                <div class="description">

                                    <?php the_sub_field('description') ?>

                                </div>
                            <?php endif; ?>

                            <div class="foo-item">
                            <div class="foto_image">
                                <img src="<?php the_sub_field('foto_image') ?>" alt="Logo">
                            </div>
                            <div class="wrap-name">
                                <div class="name">
                                    <?php the_sub_field('name') ?>
                                </div>
                                <?php if (get_sub_field('description_name')): ?>
                                    <div class="description_name">

                                        <?php the_sub_field('description_name') ?>

                                    </div>
                                <?php endif; ?>

                                <?php if (get_sub_field('img_description')): ?>
                                    <div class="img_description">

                                        <img src=" <?php the_sub_field('img_description') ?>">

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div> <!--end item-->
                    <?php endwhile; ?>

                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
