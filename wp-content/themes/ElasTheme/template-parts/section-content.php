<section class="content">

        <?php if (get_sub_field('title')): ?>
            <div class="title" >

                <?php the_sub_field('title') ?>

            </div>
        <?php endif; ?>

        <?php if (get_sub_field('title_description')): ?>
            <div class="title_description">

                <?php the_sub_field('title_description') ?>

            </div>
        <?php endif; ?>

</section>