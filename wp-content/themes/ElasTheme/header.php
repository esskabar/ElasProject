<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body <?php body_class(); ?>>
<?php $logo = get_field('top_header_logo', 'option');
$phone_top = get_field('top_header_phone', 'option');

?>
<div class="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="wrapper_top_section">
                    <div class="left_section">
                        <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $logo['url']; ?>" alt="logo"></a></div>
                        <a  href="tel:<?php echo $phone_top ?>" class="top_phone_number"><?php echo $phone_top ?></a>

                    </div>

                </div>
                <div class="navbar-header">
                    <div class="dropdown">
                        <div class="dropdown wpml-mob " hidden>
                            <?php do_action('icl_language_selector'); ?>

                        </div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <div class="animate-burger">

                            <span class="top"></span>
                            <span class="middle"></span>
                            <span class="bottom"></span>

                        </div>
                    </button>


                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <div class="wrapper_nav">
                    <ul class="nav navbar-nav navbar-right">

                            <li class="active"><?php
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
                                ?></li>

                            <div class="dropdown wpml-full">
                                <?php do_action('icl_language_selector'); ?>

                            </div>

                    </ul>
                    </div>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>

</div>
