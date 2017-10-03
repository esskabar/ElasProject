<section class="contact-form">

    <div class="content">


        <?php if (get_sub_field('title')): ?>
            <h1 class="title" >

                <?php the_sub_field('title') ?>

            </h1>
        <?php endif; ?>

        <?php if (get_sub_field('title_description')): ?>
            <div class="title_description">

                <?php the_sub_field('title_description') ?>

            </div>
        <?php endif; ?>

    </div>


    <div class="container ">
        <div class="adr">
            <ul class="tel">

                <?php if (get_sub_field('icon_tel')): ?>
                    <div class="icon-wrap icon-tel">
                        <div class="icon "  style="background-image: url('<?php the_sub_field('icon_tel') ?>')"></div>
                    </div>
                <?php endif; ?>

                <?php if (get_sub_field('title_tel')): ?>
                    <div class="title" >

                        <?php the_sub_field('title_tel') ?>

                    </div>
                <?php endif; ?>

                <?php if (get_sub_field('title_description_tel')): ?>
                    <div class="title_description">
                        <a href="tel: <?php the_sub_field('title_description_tel') ?>"> <?php the_sub_field('title_description_tel') ?></a>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
        <div class="adr adr-center">
            <hr class="hr-top">
            <ul class="adresse">
                <?php if (get_sub_field('icon_adresse')): ?>
                    <div class="icon-wrap icon-adresse">
                        <div class="icon"  style="background-image: url('<?php the_sub_field('icon_adresse') ?>')"></div>
                    </div>
                <?php endif; ?>

                <?php if (get_sub_field('title_adresse')): ?>
                    <div class="title" >

                        <?php the_sub_field('title_adresse') ?>

                    </div>
                <?php endif; ?>

                <?php if (get_sub_field('title_description_adresse')): ?>
                    <div class="title_description">

                        <?php the_sub_field('title_description_adresse') ?>

                    </div>
                <?php endif; ?>
            </ul>
            <hr class="hr-bottom">
        </div>

        <div class="adr">
            <ul class=" mail">
                <?php if (get_sub_field('icon_mail')): ?>
                    <div class="icon-wrap mail-icon">
                        <div class="icon"  style="background-image: url('<?php the_sub_field('icon_mail') ?>')"></div>
                    </div>
                <?php endif; ?>

                <?php if (get_sub_field('title_mail')): ?>
                    <div class="title" >

                        <?php the_sub_field('title_mail') ?>

                    </div>
                <?php endif; ?>

                <?php if (get_sub_field('title_description_mail')): ?>
                    <div class="title_description">
                        <a href="mailto:<?php the_sub_field('title_description_mail') ?>"> <?php the_sub_field('title_description_mail') ?></a>

                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </div>



<div class="wraper-form" id="anchor-form">
        <div class="form">
            <?php the_sub_field('contact_form_shortcode') ?>
        </div>
</div>

</section>