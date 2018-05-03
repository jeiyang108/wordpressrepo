<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel|PT+Serif|Vidaloka" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper content-background">
    <header class="row">
        <section id="masthead" class="c12" role="banner">
            <div class="hgroup">
                
                <!-- Site logo image -->
                <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>" />

                <h1 class="site-title"><a href="<?php esc_url(home_url('/')); ?>/"><?php bloginfo('name'); ?></a></h1>
                <h2 class="site-description"><?php bloginfo('description'); ?></h2>
            </div>
        </section>
            
    </header>
        <section id="access" class="row" role="navigation">
                <div class="screen-reader-text">
                    <a href="#content" title="<?php esc_attr_e('Skip to content', 'larryslist'); ?>"><?php esc_html_e('Skip to content', 'larryslist'); ?></a>
                </div>
            <nav class="c12">

                <?php wp_nav_menu(array( 'theme_location' => 'primary' )); ?>

            </nav>
        </section>
