<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="UTF-8">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php wp_head(); ?>
		<?php if(get_option('origin-favicon')){ ?>
		<link rel="shortcut icon" href="<?php echo get_option('origin-favicon');?>" type="image/x-icon">
		<?php }?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper-bundle.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/select2.min.css">
		<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/swiper-bundle.min.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/css/jquery.fancybox.css" />
		<script src="<?php bloginfo('template_url' ); ?>/js/jquery.fancybox.min.js"></script>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=<?php echo time();?>">
		<?php $value = get_field( 'code_header','option' ); echo $value?>
	</head>
	<body <?php body_class(); ?>>
		<?php $value = get_field( 'code_body','option' ); echo $value?>
		<div id="zek-web">
			<div class="line-dark"></div>
			<header id="header">
				<?php if (is_home() || is_front_page()) { ?>
				<h1 class="site-name" style="display: none;"><?php bloginfo('title'); ?></h1>
				<?php } ?>
				<div class="header-main">
					<div class="container">
						<div class="row align-center">
							<div class="col-touch">
								<div class="touch" id="touch-menu"></div>
							</div>
							<div class="col-logo">
								<div class="logo">
									<a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('title'); ?>"><img src="<?php the_field('logo','option') ?>" alt="<?php bloginfo('title');?>"/></a>
								</div>
							</div>
							<div class="col-menu">
								<?php wp_nav_menu( array( 'container' => '','theme_location' => 'main','menu_class' => 'menu' ) ); ?>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div id="menu-mobile">
				<div class="close" id="close-menu"></div>
				<?php wp_nav_menu( array( 'container' => '','theme_location' => 'main','menu_class' => 'menu' ) ); ?>
			</div>