/**
 * Created by triar on 28.08.2017.
 */

'use strict';


(function ($) {

    $(document).ready(function () {
        ///////////////////////////////////////////////////////////////////////////////////////////
        /////// validate check in  check out filds
        ///////////////////////////////////////////////////////////////////////////////////////////
        var MOMENTJS_FORMAT = 'MMMM DD, YYYY';
        var DATEPICKER_FORMAT = 'MM d, yy';
        $('#start_date').datepicker({
            minDate: moment().toDate(),
            dateFormat: DATEPICKER_FORMAT,
            onSelect : function (date) {
                var incrementDay = moment(date, MOMENTJS_FORMAT);
                incrementDay = incrementDay.add(1, 'days');
                $('#end_date').datepicker('option', {minDate: incrementDay.toDate()});
            }
        });
        $('#end_date').datepicker({
            minDate: moment().add(1 ,'day').toDate(),
            dateFormat: DATEPICKER_FORMAT,
            onSelect : function (date) {
                var incrementDay = moment(date, MOMENTJS_FORMAT);
                incrementDay.subtract(1, 'days');
                $('#start_date').datepicker('option', {maxDate: incrementDay.toDate()});
            }
        });
        ///////////////////////////////////////////////////////////////////////////////////////////
        /////// Contact page  + ajax call on contact for SIDEBAR
        ///////////////////////////////////////////////////////////////////////////////////////////



        $('.booking_form_request li').click(function () {
            var pick, value, parent;
            pick = $(this).text();
            value = $(this).attr('data-value');
            parent = $(this).parent().parent();
            parent.find('.filter_menu_trigger').text(pick).append('<span class="caret caret_filter"></span>').attr('data-value', value);

        });


        $('#advanced_submit_sidebar_form').click(function () {



            var submit = $('.has_calendar input[type="submit"]').submit();

            var input = $('.has_calendar input[type="text"] ');



            var text = $('#booking_guest_no_wrapper').attr('data-value');

            var arr = [input , text ];

            input.each(function () {



                if ($(this).val() == '') {

                    $(this).parent().addClass('unvalided');

                }else{

                    $(this).parent().removeClass('unvalided');

                }

            });



            if (text === 'all'){

                $('.form-control').addClass('unvalided');

            }else{

                $('.form-control').removeClass('unvalided');

            }

            if ($('.unvalided').length > 0){

                return false;

            }

            else{
                $('.active_sidebar').show('.active_sidebar');
                $('#advanced_submit_sidebar_form').hide();
                $('.submit_booking_front_wrapper').hide();
                $('.has_calendar').hide();
                $('.show_cost_form').hide();

            }

        });

        $('.wpb_btn-info').click(function () {


            var submit = $('.third-form   input[type="submit"]').submit();

            var input_2 = $('.third-form   input[type="text"] ');



            var text = $('#booking_guest_no_wrapper').attr('data-value');

            var arr = [input_2 , text ];

            input_2.each(function () {



                if ($(this).val() == '') {

                    $(this).parent().addClass('unvalided');

                }else{

                    $(this).parent().removeClass('unvalided');

                }

            });



            if (text === 'all'){

                $('.form-control').addClass('unvalided');

            }else{

                $('.form-control').removeClass('unvalided');

            }

            if ($('.unvalided').length > 0){

                return false;

            }

            else{
                $('.active_sidebar').show('.active_sidebar');
                $('#advanced_submit_sidebar_form').hide();
                $('.submit_booking_front_wrapper').hide();
                $('.has_calendar').hide();
                $('.show_cost_form').hide();

            }



        });


        $('#agent_submit_contact_sidebar').click(function () {
            var contact_name, contact_email, contact_website, contact_coment, agent_email, property_id, nonce, ajaxurl, contact_start_date, contact_end_date, booking_guest_no_wrapper, contact_adresse, contact_plz_ort, contact_land, contact_telephone, post_title;
            post_title      =   $('#post_title_id').val();
            contact_name    =   $('#contact_name').val();
            contact_email   =   $('#contact_email').val();
            // contact_website =   $('#contact_website').val();
            contact_adresse = $('#contact_adresse').val();
            contact_plz_ort = $('#contact_plz_ort').val();
            contact_land = $('#contact_land').val();
            contact_telephone = $('#contact_telephone').val();
            contact_start_date = $('#start_date').val();
            contact_end_date = $('#end_date').val();
            booking_guest_no_wrapper = $('#booking_guest_no_wrapper').text();


            nonce           =   $('#agent_property_ajax_nonce').val();
            ajaxurl         =   '/wp-admin/admin-ajax.php';


            $('#alert-agent-contact').empty().removeClass('alert_err').append(WP_GLOBAL_SETTING.locale);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: ajaxurl,
                data: {
                    'action'    :   'wpestate_ajax_agent_contact_page_sidebar',
                    'post_title':   post_title,
                    'name'      :   contact_name,
                    'email'     :   contact_email,
                    'contact_adresse'   :   contact_adresse,
                    'contact_plz_ort'   :   contact_plz_ort,
                    'contact_land'   :   contact_land,
                    'contact_telephone'   :   contact_telephone,
                    'start_date'    : contact_start_date,
                    'end_date'    : contact_end_date,
                    'booking_guest_no_wrapper'  : booking_guest_no_wrapper,



                    'nonce'     :   nonce
                },
                success: function (data) {
                    // This outputs the result of the ajax request

                    // mail_send = $('.success_mail').val();

                    if (data.sent) {




                        $('#post_title_id').val();
                        $('#contact_name').val('');
                        $('#contact_email').val('');
                        $('#contact_adresse').val('');
                        $('#contact_plz_ort').val('');
                        $('#contact_land').val('');
                        $('#contact_telephone').val('');
                        $('#start_date').val();
                        $('#end_date').val();

                        $('#alert-agent-contact').empty().append(data.response);
                        $('.active_sidebar').hide();
                        $('#advanced_submit_sidebar_form').show();
                        $('.submit_booking_front_wrapper').show();

                        $( 'input#start_date' ).val('');
                        $( 'input#end_date' ).val('');
                        $( '#booking_guest_no_wrapper' ).text('');
                        $('.show_cost_form').hide();
                        $('.has_calendar').show();

                        $(".active_sidebar").hide();
                        $(".has_calendar ").hide();
                        $(".submit_booking_front_wrapper").hide();

                        $(".success_mail").show();
                        // setTimeout(function() { $(".success_mail").hide(); }, 5000);

                    }else{
                         $('#alert-agent-contact').empty().addClass('alert_err').append(data.response);
                    }

                },
                error: function (errorThrown) {



                    if( $('#contact_name').val() == "") {
                        $('#contact_name').css('border', '2px solid red');
                    }
                    if($('#contact_email').val() == "") {
                        $('#contact_email').css('border', '2px solid red');
                    }
                    if( $('#contact_adresse').val() == "") {
                        $('#contact_adresse').css('border', '2px solid red');
                    }
                    if( $('#contact_plz_ort').val() == "") {
                        $('#contact_plz_ort').css('border', '2px solid red');
                    }
                    if( $('#contact_land').val() == "") {
                        $('#contact_land').css('border', '2px solid red');
                    }
                    if ($('.unfalided').val() == ""){
                        $('#contact_land').css('border', '2px solid red');
                    }

                }
            });
        });

    })


})(jQuery);