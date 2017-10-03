<?php $images = get_field('single_apartament_gallery');

if ($images): ?>
    <div id="slider_top" class="flexslider">
        <ul class="slides slider-for">
            <?php foreach ($images as $image): ?>
                <li class="slider_item top_slider_item"
                    style="background-image: url('<?php echo $image['url']; ?>')"></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div id="slider_bottom" class="flexslider ">
        <ul class="slides slider-nav">
            <?php foreach ($images as $image): ?>
                <li class="slider_item bottom_slider_item"
                    style="background-image: url('<?php echo $image['url']; ?>')"></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>