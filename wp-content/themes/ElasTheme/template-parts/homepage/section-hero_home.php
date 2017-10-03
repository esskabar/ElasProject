<section class="hero_home"  style="background-image: url('<?php the_sub_field('banner_background_image') ?>')">


    <div class="content">

<!--        <i class="icon icon-excentus-logo-icon"></i>-->

        <?php if (get_sub_field('hero_logo')): ?>
            <div class="hero_logo"  style="background-image: url('<?php the_sub_field('hero_logo') ?>')"></div>
        <?php endif; ?>

        <?php if (get_sub_field('hero_title')): ?>
             <div class="title" id="anim">

                 <?php the_sub_field('hero_title') ?>

            </div>
        <?php endif; ?>
    </div>
</section>
