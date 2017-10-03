<?php $guest_list= wpestate_get_guest_dropdown('noany');

//$domain_name = ;
?>


<div class="contact_form_wrapper">
    <div class="single_hotel_price">

        <div class="messages_title">
            <?php if (get_field('basic_price_shown_before_form')): ?>
                <?php the_field('basic_price_shown_before_form') ?>
            <?php endif; ?>
        </div>

        <div class="description_form" id="booking_form_request_title">
            <?php if (get_field('form_description')): ?>
                <?php the_field('form_description') ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="booking_form_request" id="booking_form_request">
        <div id="booking_form_request_mess"></div>

        <input type="hidden" id="listing_edit" name="listing_edit" value="<?php echo $post_id;?>" />

        <div class="has_calendar title_post_id">

            <input type="text" id="post_title_id" placeholder="<?php echo $post->post_title; ?>"  class="form-control" size="40" name="post_title_id" value="<?php echo $post->post_title; ?>" readonly>
        </div>


        <div class="has_calendar calendar_icon">
            <input type="text" id="start_date" placeholder="<?php esc_html_e('Check in','elasnew'); ?>"  class="form-control calendar_icon" size="40" name="start_date"
                   value="<?php if( isset($_GET['check_in_prop']) ){
                       echo sanitize_text_field ( $_GET['check_in_prop'] );
                   }
                   ?>">
        </div>

        <div class=" has_calendar calendar_icon">
            <input type="text" id="end_date" placeholder="<?php esc_html_e('Check Out','elasnew'); ?>" class="form-control calendar_icon" size="40" name="end_date"
                   value="<?php if( isset($_GET['check_out_prop']) ){
                       echo sanitize_text_field ( $_GET['check_out_prop'] );
                   }
                   ?>">
        </div>

        <div class=" has_calendar guest_icon ">
            <?php
            $max_guest = get_post_meta($post_id,'guest_no',true);
            print '
                    <div class="dropdown form-control dropdown-style btn  dropdown-toggle">
                        <div data-toggle="dropdown" id="booking_guest_no_wrapper" class="filter_menu_trigger" data-value="';
            if(isset($_GET['guest_no_prop']) && $_GET['guest_no_prop']!=''){
                echo esc_html( $_GET['guest_no_prop'] );
            }else{
                echo 'all';
            }


            print '">';

            if(isset($_GET['guest_no_prop']) && $_GET['guest_no_prop']!=''){
                echo esc_html( $_GET['guest_no_prop'] ).' '.esc_html__( 'Guests','elasnew');
            }else{
                esc_html_e('Guests','elasnew');
            }

            print'<span class="caret caret_filter"></span>
                        </div>           
                        <input type="hidden" name="booking_guest_no"  value="">
                        <ul  class="dropdown-menu filter_menu" role="menu" aria-labelledby="booking_guest_no_wrapper">
                            '.$guest_list.'
                        </ul>        
                    </div>';
            ?>
        </div>


        <p class="full_form " id="add_costs_here"></p>


        <div class="submit_booking_front_wrapper">
            <?php $single_hotel_continue_bttn = get_field('single_hotel_continue_bttn', 'option')?>
            <input type="submit" id="advanced_submit_sidebar_form" value="<?php echo $single_hotel_continue_bttn; ?>">

        </div>


        <div class="agent_contanct_form active_sidebar">




            <p class="third-form  ">
                <input type="text" id="contact_name" size="40" name="contact_name" class="form-control"
                       placeholder="<?php esc_html_e('Full Name', 'elasnew'); ?>" value="">
            </p>

            <p class="third-form  ">
                <input type="text" id="contact_adresse" size="40" name="contact_adresse" class="form-control"
                       placeholder="<?php esc_html_e('Street', 'elasnew'); ?>" value="">
            </p>

            <p class="third-form  ">
                <input type="text" id="contact_plz_ort" size="40" name="contact_plz_ort" class="form-control"
                       placeholder="<?php esc_html_e('PLZ/Ort', 'elasnew'); ?>" value="">
            </p>

            <p class="third-form  ">
                <input type="text" id="contact_land" size="40" name="contact_land" class="form-control"
                       placeholder="<?php esc_html_e('Country', 'elasnew'); ?>" value="">
            </p>

            <p class="third-form  ">
                <input type="text" id="contact_telephone" size="40" name="contact_telephone" class="form-control"
                       placeholder="<?php esc_html_e('Phone ', 'elasnew'); ?>" value="">
            </p>

            <p class="third-form last-third">
                <input type="text" id="contact_email" size="40" name="contact_email" class="form-control"
                       placeholder="<?php esc_html_e('Email', 'elasnew'); ?>" value="">
            </p>

            <input type="submit" class="wpb_btn-info wpb_btn-small wpestate_vc_button  vc_button"
                   id="agent_submit_contact_sidebar" value="<?php esc_html_e('Send inquiry', 'elasnew'); ?>">


            <div class="alert-box-contact-page error">
                <div class="alert-message" id="alert-agent-contact"> </div>
            </div>

            <input type="hidden" name="contact_ajax_nonce" id="agent_property_ajax_nonce"
                   value="<?php echo wp_create_nonce('ajax-property-contact'); ?>"/>

        </div>

<!--        <input class="success_mail"  type="text"  style="display:none;" value="--><?php // esc_html_e('Thank you! We will contact you soon.', 'elasnew'); ?><!--">-->

        <div style="display:none;" class="success_mail"> <?php echo get_field('success_message', 'option'); ?></div>


    </div>



</div>


