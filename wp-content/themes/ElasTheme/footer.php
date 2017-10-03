<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>


<footer id="footer"  >
    <?php $foo_background_image = get_field('foo_background_image' , 'option');?>
    <div class="foo_background"  style="background-image: url('<?php echo $foo_background_image ?>')">
    </div>
    <div class="sub-footer">

        <div class="col logo">
            <img alt="logo" src="<?php the_field('footer_logo', 'option') ?>">
        </div>



        <div class="col menu_foo">

            <?php if (get_field('footer_menu_title', 'option')): ?>
                <div class="title footer_menu_title">

                    <?php the_field('footer_menu_title', 'option') ?>

                </div>
            <?php endif; ?>
            <div class="sub-content menu">

            </div>
                <?php
                wp_nav_menu(array(
                    'theme_location' => '',
                    'menu' => 'mainmenu',
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_id' => '',
                    'echo' => true,
                    'depth' => 0,
                    'walker' => '',
                ));
                ?>
        </div>
        <div class="col kategorien">
            <?php if (get_field('footer_kategorien_title', 'option')): ?>
                <div class=" title footer_kategorien_title">

                    <?php the_field('footer_kategorien_title', 'option') ?>

                </div>
            <?php endif; ?>

            <div class=" sub-content kategorien-list">
                <?php
                echo '<div class="wrapper_title_kategorien">
                    <ul class="kategorien-ul" role="tablist">';?>
                <?php
                $args_hotels = array(
                    'post_type'     => 'hotel',
                    'taxonomy'      => 'category',
                    'order '        => 'desc',
                    'hide_empty'    => true,
                    'exclude'       => 1
                );
                $categories = get_terms( $args_hotels );

                ?>
                <?php  foreach($categories as $category) {
                    echo '<li class="kategorien-li"><a  href="/our-apartments/#'.$category->slug.'" data-category="'.$category->slug.'"> '.$category->name.'</a></li>';
                }
                echo '</ul></div>';?>



            </div>

        </div>
        <div class="col kontakt">
            <?php if (get_field('footer_kontakt_title', 'option')): ?>
                <div class="title footer_kontakt_title">

                    <?php the_field('footer_kontakt_title', 'option') ?>

                </div>

                <div class=" sub-content footer_kontakt_info">
                    <a href="tel:<?php the_field('footer_kontakt_tel' , 'option') ?>"><?php the_field('footer_kontakt_tel' , 'option') ?></a><br>
                    <a href="mailto:<?php the_field('footer_kontakt_mail' , 'option') ?>"> <?php the_field('footer_kontakt_mail' , 'option') ?></a>
                    <?php the_field('footer_kontakt_info' , 'option') ?>

                </div>
            <?php endif; ?>
        </div>

    </div>

    <?php $copyright = get_field('copyright_footer' , 'option');?>
    <div class="container">
        <div class="copyright_bottom"><?php echo $copyright ;?></div>
    </div>

</footer>


<?php wp_footer(); ?>


</body>
</html>
