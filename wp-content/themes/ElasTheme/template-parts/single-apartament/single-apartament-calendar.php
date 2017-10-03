
<?php
$v = get_post_meta($post->ID, 'save_dates', true);


?>

<?php //if (get_field('calendar_title', 'option')): ?>
    <h3 class="verfugbarkeit" >

        <?php get_field('avalilbilyty') ?>
        <?php the_field('avalilbilyty') ?>



    </h3>
<?php //endif; ?>


<div id="shedule_reservation">
    <input   id="save_dates_input" type="text" name="save_dates" value="<?php echo $v; ?>">
    <div></div>

</div>



<div class="wrapper-dsr col-md-12" id="shedule_reservation">


    <div> <?php echo $first_col ?></div>

    <?php if (get_field('besetzt')): ?>
        <div class="besetzt col-md-2  " >
            <?php the_field('besetzt') ?>
        </div>
    <?php endif; ?>
    <?php if (get_field('frei')): ?>
        <div class="frei col-md-2" >
            <?php the_field('frei') ?>
        </div>
    <?php endif; ?>
</div>

<div class="bottom_area_single_right">
<?php $scroll_button_top = get_field('scroll_button_top', 'option')?>
    <div class="wrapper">
        <a  href="#booking_form_request_title"  class="bottom_scroll_top"><?php echo $scroll_button_top; ?></a>
    </div>
</div>