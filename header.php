<!DOCTYPE HTML>
<html>
<head <?php language_attributes(); ?>>
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
            <header class="header">
                <div class="header_main_row">
                    <h1 class="logo_wrap header_mod"><a href="<?php echo get_home_url(); ?>" class="logo_text header_mod"><?php bloginfo('name'); ?></a></h1>
                </div>
                <div class="menu_trigger_wrap">
                    <div id="menu_trigger" class="menu_trigger"><span class="menu_trigger_decor"></span></div>
                </div>
                <nav class="header_menu_row">
	                <?php
	                if ( has_nav_menu( 'header_menu' ) ) {
		                wp_nav_menu( [
			                'theme_location'  => 'header_menu',
			                'menu_class'      => 'header_menu_list',
			                'container'       => '',
			                'container_class' => '',
			                'menu_id'         => 'header_menu_list',
			                'depth'           => 0,
		                ] );
	                }
	                ?>
                </nav>
            </header>
            <div class="wrapper">