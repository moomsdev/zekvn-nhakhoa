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
		<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/css/jquery.fancybox.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/style.css?v=<?php echo time(); ?>">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css?v=<?php echo time();?>">
		<?php $value = get_field( 'code_header','option' ); echo $value?>
	</head>
	<body <?php body_class(); ?>>
		<?php $value = get_field( 'code_body','option' ); echo $value?>
		<div id="zek-web">
			<div class="line-dark"></div>
			
			<div class="header-top">
				<div class="container">
					<div class="wrap-content">
						<div class="left">
							<marquee behavior="" direction=""><?php the_field('slogan_header','option'); ?></marquee>
						</div>

						<div class="right d-none d-md-flex">
							<a class="info-header" href="tel:<?php the_field('hotline','option'); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224.2 89C216.3 70.1 195.7 60.1 176.1 65.4L170.6 66.9C106 84.5 50.8 147.1 66.9 223.3C104 398.3 241.7 536 416.7 573.1C493 589.3 555.5 534 573.1 469.4L574.6 463.9C580 444.2 569.9 423.6 551.1 415.8L453.8 375.3C437.3 368.4 418.2 373.2 406.8 387.1L368.2 434.3C297.9 399.4 241.3 341 208.8 269.3L253 233.3C266.9 222 271.6 202.9 264.8 186.3L224.2 89z"/></svg>
								Hotline: <b><?php the_field('hotline','option'); ?></b>
							</a>
							<button role="button" class="btnTuVan" data-bs-toggle="modal" data-bs-target="#contactModal">Đăng ký tư vấn</button>
						</div>
					</div>
				</div>
			</div>

			<header id="header">
				<?php if (is_home() || is_front_page()) { ?>
				<h1 class="site-name" style="display: none;"><?php bloginfo('title'); ?></h1>
				<?php } ?>
				<div class="header-main">
					<div class="container">
						<!-- Navbar -->
						<nav class="d-none d-lg-block pc-menu">
						<?php 
							wp_nav_menu(array(
								'container' => '', 
								'theme_location' => 'main', 
								'menu_class' => 'menu',
								'walker' => new Menu_Middle_Logo()
							)); 
						?>
						</nav>
					</div>
				</div>
				<div class="header-mobile">
					<div class="container">
						<div class="inner">
							<div class="logo">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_field('logo_mobile', 'option'); ?>" alt="logo">
								</a>
							</div>

							<div class="register">
								<button role="button" class="btnTuVan" data-bs-toggle="modal" data-bs-target="#contactModal">Đăng ký tư vấn</button>
							</div>

							<div class="col-touch">
								<div class="touch" id="touch-menu">
									<img src="<?php echo get_template_directory_uri(); ?>/images/touch.png" alt="touch">
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div id="menu-mobile">
				<div class="close" id="close-menu"></div>
				<?php wp_nav_menu( array( 'container' => '','theme_location' => 'main','menu_class' => 'menu' ) ); ?>
			</div>