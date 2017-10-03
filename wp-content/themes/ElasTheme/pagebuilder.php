<?php
/* Template Name: Page Builder */

?>


<?php get_header(); ?>

<?php if (have_rows('page_builder_')):
    while (have_rows('page_builder_')) : the_row();

        get_template_part( 'template-parts/section-' . get_row_layout());


    endwhile;
endif; ?>


<?php get_footer(); ?>