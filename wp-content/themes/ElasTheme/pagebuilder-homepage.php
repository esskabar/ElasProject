<?php
/* Template Name: Page Builder - Homepage */

?>


<?php get_header(); ?>

<?php if (have_rows('page_builder')):
    while (have_rows('page_builder')) : the_row();

        get_template_part( 'template-parts/homepage/section-' . get_row_layout());


    endwhile;
endif; ?>


<?php get_footer(); ?>