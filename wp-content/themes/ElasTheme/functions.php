<?php

//if (function_exists('acf_add_options_page')) {
//
//    // Add General Settings
//    $general = acf_add_options_page(array(
//        'page_title' => 'Theme General Settings',
//        'menu_title' => 'Theme Settings',
//        'redirect' => false
//    ));
//
//}




function global_scripts()
{
    wp_enqueue_script('jquery');

    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css', array('jquery') );
//    wp_enqueue_script( 'jquery-ui', null, array('jquery') );
    wp_enqueue_style( 'jquery-ui', null, array('jquery') );

//    wp_enqueue_script( 'jquery-ui-datepicker', null, array('jquery-ui') );
//    wp_enqueue_script( 'jquery-ui-slider', null, array('jquery-ui') );

    wp_register_script('vendor', get_template_directory_uri() . '/build/js/vendors.min.js', array('jquery'));
    wp_enqueue_script('custom', get_template_directory_uri() . '/build/js/custom.min.js', array('vendor'));

    // Load the datepicker script (pre-registered in WordPress).
    wp_register_script('googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCXIK7j_jFGMw0gPRN8GSvcVhigi0IAd9k&callback=initMap',null,null,true);
    wp_enqueue_script('googlemaps');
    wp_enqueue_script( 'jquery-ui-datepicker' );
    wp_enqueue_script( 'jquery-ui-slider' );
    // You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
    wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );
    wp_register_script('jqueryui-js', 'http://code.jquery.com/ui/1.8.17/jquery-ui.min.js',null,null,true);
    wp_enqueue_script('jqueryui-js');
    wp_register_script('jqueryui-touch-punch', '//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js',null,null,true);
    wp_enqueue_script('jqueryui-touch-punch');

//    wp_enqueue_script('wpestate_ajaxcalls', trailingslashit( get_template_directory_uri() ).'src/js/custom/ajax_for_contact_forms.js',array('jquery'), '1.0', true);
    wp_localize_script( 'jquery', 'WP_GLOBAL_SETTING', array('locale' => 'en' ) );

  //  wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyABtlWrHAR8GVUwWVmdgKQ4e2Qp0ZoqPbs&callback=initMap', array('jquery'));
}

add_action('wp_enqueue_scripts', 'global_scripts');

function global_admin_scripts() {
    wp_enqueue_script('custom_admin', get_template_directory_uri() . '/build/js/custom_admin.min.js', array('jquery'));

}

add_action('admin_enqueue_scripts', 'global_admin_scripts');

function add_styles()
{

    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/build/css/style.min.css', '', '1.0.1');
    wp_enqueue_style('theme-style-basic', get_stylesheet_directory_uri() . '/style.css', '', '1.0.1');
    wp_enqueue_style('e2b-admin-ui-css','http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css',false,"1.9.0",false);
}

add_action('wp_enqueue_scripts', 'add_styles');

function remove_head_scripts()
{
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
}

add_action('wp_enqueue_scripts', 'remove_head_scripts');


show_admin_bar(false);


add_theme_support('menus');
add_theme_support('post-thumbnails');

add_image_size('custom-thumb', 235, 180  , true);





function jag_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'jag_mime_types');


if (isset($_GET['fld'])) {

    $file = $_GET['fld'];

    if (ob_get_level()) {
        ob_end_clean();
    }

    header('Content-Transfer-Encoding: binary');

    header("Content-Type: application/octet-stream");
    header("Accept-Ranges: bytes");
    header("Content-Length: " . filesize($file));
    header("Content-Disposition: attachment; filename='" . basename($file) . "'");
    readfile($file);

}


if (function_exists('acf_add_options_page')) {

    // Add General Settings
    $general = acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'redirect' => false
    ));


}


function custom_posts()
{
    $labels = array(
        'name' => 'Wohnungen',
        'singular_name' => 'Wohnungen',
        'add_new' => 'Add Wohnungen',
        'add_new_item' => 'Add Wohnungen',
        'edit_item' => 'Edit Wohnungen',
        'new_item' => 'New Wohnungen',
        'view_item' => 'Preview Wohnungen',
        'search_items' => 'Find Wohnungen',
        'not_found' => 'Nothing Find',
        'not_found_in_trash' => 'No Wohnungen',
        'parent_item_colon' => '',
        'menu_name' => 'Wohnungen'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'taxonomies' => array('category'),
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'hotel'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnails', 'thumbnail'),
        //'register_meta_box_cb' => 'add_events_metaboxes'
    );
    register_post_type('hotel', $args);

}
add_action('init', 'custom_posts');

function myplugin_add_meta_box() {

    add_meta_box(
        'event-date',
        'Set Booked days',
        'myplugin_meta_box_callback',
        'hotel'
    );
}


function myplugin_meta_box_callback($post){
    $v = get_post_meta($post->ID, 'save_dates', true);
    echo '
<div>
  <input id="save_dates_input" type="text" name="save_dates" value="'.$v.'">
  <div></div>
</div>
<script>
document.addEventListener(\'DOMContentLoaded\', function () {
   new ReserveDatePicker(\'#save_dates_input\', {editable: true});
});
</script>

';
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

//menu
//function register_my_menu() {
//    register_nav_menu('mainmenu',__( 'mainmenu' ));
//    //register_nav_menu('secondary-menu',__( 'secondary-menu' ));
//}
//add_action( 'init', 'register_my_menu' );


function myplugin_save_postdata($post_id){
    if ( 'hotel' == $_POST['post_type'] ) {
        update_post_meta($post_id, 'save_dates', sanitize_text_field( $_REQUEST['save_dates'] ));
    }
}
add_action( 'save_post', 'myplugin_save_postdata' );


function myplugin_get_postdata($post_id){
    if ( 'hotel' == $_POST['post_type'] ) {
        $get_calendar_data = explode(',', get_post_meta($post_id, 'save_dates',true));
        return $get_calendar_data;
    }
}


////////////////////////////////////////////////////////////////////////////////
/// show hieracy area
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('wpestate_get_guest_dropdown') ):
    function wpestate_get_guest_dropdown($with_any='',$selected=''){
        $select_area_list='';
        if($with_any==''){
            $select_area_list.='<li role="presentation" data-value="0">'.esc_html__( 'any','wpestate').'</li>';
        }

        $select_area_list .=   '<li role="presentation" data-value="1"';
        if($selected==1){
            $select_area_list .=' selected="selected" ';
        }
        $select_area_list .= '>1 '.esc_html__( 'guest','wpestate').'</li>';


        for($i=2;$i<15;$i++){
            $select_area_list .=   '<li role="presentation" data-value="'. $i.'"';
            if($selected!='' && $selected==$i){
                $select_area_list .=' selected="selected" ';
            }
            $select_area_list .= '>'. $i.' '.esc_html__( 'guests','wpestate').'</li>';
        }

        return $select_area_list;
    }
endif;

//////////////////////////////////////////////////////////////////////////////
/// Ajax adv search contact function for SIDEBAR
////////////////////////////////////////////////////////////////////////////////
add_action( 'wp_ajax_nopriv_wpestate_ajax_agent_contact_page_sidebar', 'wpestate_ajax_agent_contact_page_sidebar' );
add_action( 'wp_ajax_wpestate_ajax_agent_contact_page_sidebar', 'wpestate_ajax_agent_contact_page_sidebar' );

if( !function_exists('wpestate_ajax_agent_contact_page_sidebar') ):

    function wpestate_ajax_agent_contact_page_sidebar(){

        // check for POST vars

        $hasError = false;
        $allowed_html   =   array();
        $to_print='';
        $post_title = $_POST['post_title'];


        if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-property-contact')) {
            exit("No naughty business please");
        }

        //  Check POST TITLE
        //  var_dump($_POST['post_title']);die;
        if ( isset($_POST['post_title']) ) {
            if( trim($_POST['post_title']) =='' || trim($_POST['post_title']) ==esc_html__( 'Your post title','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'The name field is empty !','elasnew') ));
                exit();
            }else {
                $post_title = wp_kses( trim($_POST['post_title']),$allowed_html );
            }
        }


        //  Check start date
        if ( isset($_POST['start_date']) ) {
            if( trim($_POST['start_date']) =='' || trim($_POST['start_date']) ==esc_html__( 'Your start_date','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'The name field is empty !','elasnew') ));
                exit();
            }else {
                $start_data = wp_kses( trim($_POST['start_date']),$allowed_html );
            }
        }
        //  Check end date
        if ( isset($_POST['end_date']) ) {
            if( trim($_POST['end_date']) =='' || trim($_POST['end_date']) ==esc_html__( 'Your end_date','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'The name field is empty !','elasnew') ));
                exit();
            }else {
                $end_data = wp_kses( trim($_POST['end_date']),$allowed_html );
            }
        }
        //  Check end count guests
        if ( isset($_POST['booking_guest_no_wrapper']) ) {
            if( trim($_POST['booking_guest_no_wrapper']) =='' || trim($_POST['booking_guest_no_wrapper']) ==esc_html__( 'Your guests count','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please fill in the field !','elasnew') ));
                exit();
            }else {
                $booking_count = wp_kses( trim($_POST['booking_guest_no_wrapper']),$allowed_html );
            }
        }

        //  Check Name
        if ( isset($_POST['name']) ) {
            if( trim($_POST['name']) =='' || trim($_POST['name']) ==esc_html__( 'Your Name','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please enter your full first and last name in the field!','elasnew') ));
                exit();
            }else {
                $name = wp_kses( trim($_POST['name']),$allowed_html );
            }
        }


        //Check Adresse
        if ( isset($_POST['contact_adresse']) ) {
            if( trim($_POST['contact_adresse']) =='' || trim($_POST['contact_adresse']) ==esc_html__( 'Your Adresse','elasnew')){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please enter your street!','elasnew') ) );
                exit();
            }else {
                $adresse = wp_kses($_POST['contact_adresse'] ,$allowed_html );
            }
        }

        //  Check PLZ/ORT
        if ( isset($_POST['contact_plz_ort']) ) {
            if( trim($_POST['contact_plz_ort']) =='' || trim($_POST['contact_plz_ort']) ==esc_html__( 'Your PLZ/Ort','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please enter your zip code and city!','elasnew') ));
                exit();
            }else {
                $plz_ort = wp_kses( trim($_POST['contact_plz_ort']),$allowed_html );
            }
        }

        //  Check Land
        if ( isset($_POST['contact_land']) ) {
            if( trim($_POST['contact_land']) =='' || trim($_POST['contact_land']) ==esc_html__( 'Your land','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please enter a country!','elasnew') ));
                exit();
            }else {
                $land = wp_kses( trim($_POST['contact_land']),$allowed_html );
            }
        }

        //  Check Telephone
        if ( isset($_POST['contact_telephone']) ) {
            if( trim($_POST['contact_telephone']) =='' || trim($_POST['contact_telephone']) ==esc_html__( 'Your Telephone','elasnew') ){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please enter your phone number !','elasnew') ));
                exit();
            }else {
                $telephone = wp_kses( trim($_POST['contact_telephone']),$allowed_html );
            }
        }

        //Check email
        if ( isset($_POST['email']) || trim($_POST['name']) ==esc_html__( 'Your Email','wpestate') ) {
            if( trim($_POST['email']) ==''){
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please enter your e-mail adress!','elasnew' ) ) );
                exit();
            } else if( filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === false) {
                echo json_encode(array('sent'=>false, 'response'=>esc_html__( 'Please enter a valid e-mail address!','elasnew') ) );
                exit();
            } else {
                $email = wp_kses( trim($_POST['email']),$allowed_html );
            }
        }



        $website = wp_kses( trim($_POST['website']),$allowed_html );
        $subject =esc_html__( 'Reservation request for  ','elasnew') . esc_html( $post_title ) ;



        $message='';

        //$receiver_email = esc_html( get_option('wp_estate_email_adr', '') );;

        $receiver_email = get_field('footer_kontakt_mail', 'option' );


        $message .= esc_html__( 'Object','elasnew').": " . $post_title . "\n " . esc_html__( 'Full Name','elasnew').": " . $name . "\n ".esc_html__( 'Email','elasnew').": " . $email . "\n ".esc_html__( 'Street','elasnew').": " . $adresse . "\n ".esc_html__( 'Phone','elasnew').": " . $telephone . "\n ".esc_html__( 'Country','elasnew').": " . $land .  " \n ".esc_html__( 'PLZ/Ort','elasnew').": " . $plz_ort .  " \n ".esc_html__( 'The amount of guests','elasnew').": " . $booking_count  .  "\n ".esc_html__( 'Start Date','elasnew').": " . $start_data . " \n".esc_html__( 'End Date','elasnew').": " . $end_data;
        $message .="\n\n".esc_html__( 'Message was sent via the contact form on elas.ch.','elasnew');
//        $headers = 'From: No Reply <noreply@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";
        $mail = wp_mail(   $receiver_email, $email, $subject, $message, $start_data , $end_data , $adresse , $telephone , $land , $plz_ort , $booking_count, $post_title);



        echo json_encode(array('sent'=>true, 'response'=>esc_html__( 'The message was sent !','elasnew'), 'debug' => $mail
//        ,'vars' => array(   $receiver_email, $email, $subject, $message, $headers , $start_data , $end_data , $adresse , $telephone , $land , $plz_ort , $booking_count, $post_title)
        ));
        die();
    }

endif; // end   wpestate_ajax_agent_contact_form_sidebar


