<?php
/*
Template Name: Trang chủ
 */

get_header(); 
?>

<!-- Banner -->
<?php
$banners = get_field('banner_slider', 'option');
$i = 0;
?>
<section class="banner">
    <div class="swiper swiper-banner">
        <div class="swiper-wrapper">
            <?php
            foreach ($banners as $banner):
                $url = $banner['url'];
                $img = $banner['img'];
            ?>
                <div class="swiper-slide">
                    <a href="<?php echo $banner['url'] ? $banner['url'] : ''; ?>">
                        <figure class="image-banner">
                            <img src="<?php echo $banner['img']; ?>" alt="slider-hero-<?php echo $i; ?>" loading="lazy">
                        </figure>
                    </a>
                </div>
                <?php $i++; endforeach; ?>
        </div>
    </div>
</section>
<!-- End Banner -->

<!-- Featured Icon -->
<?php
$featured_icon = get_field('featured_icon', 'option');
?>
<section class="featured-icon">
    <div class="container">
        <div class="featured-icon-list">
            <?php
            foreach ($featured_icon as $item): 
                $icon = $item['icon'];
                $title = $item['title'];
                $url = $item['url'];
            ?>
                <div class="item">
                    <a href="<?php echo $url; ?>">
                        <div class="inner">
                            <figure class="icon">
                                <img src="<?php echo $icon; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                            </figure>
                            <h3 class="title"><?php echo esc_html($title); ?></h3>
                        </div>
                    </a>
                </div>
            <?php
            endforeach; ?>
        </div>
    </div>
</section>
<!-- End Featured Icon -->

<!-- Featured post Image slider -->
<?php
$featured_post_image = get_field('featured_post_image', 'option');
?>
<section class="featured-post-image">
    <div class="container">
        <div class="swiper swiper-post-image">
            <div class="swiper-wrapper">
                <?php
                foreach ($featured_post_image as $item):
                    $url = $item['url'];
                    $img = $item['img'];

                    $attachment_id = attachment_url_to_postid($img);
                    $alt_text = get_the_title($attachment_id);
                ?>
                    <div class="swiper-slide item">
                        <a href="<?php echo $url ? $url : ''; ?>">
                            <figure class="image">
                                <img src="<?php echo $img; ?>" alt="<?php echo $alt_text ? $alt_text : 'slider-'.$i; ?>" title="<?php echo $alt_text ? $alt_text : 'slider-'.$i; ?>" loading="lazy">
                            </figure>
                        </a>
                    </div>
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Featured post Image slider -->

<!-- Featured Services slider -->
<?php
$featured_services = get_field('featured_services', 'option');
$featured_services_title = get_field('featured_services_title', 'option');
$featured_services_subtitle = get_field('featured_services_subtitle', 'option');
?>
<section class="featured-services">
    <div class="container">
        <div class="head-section">
            <?php
            if($featured_services_title):
                echo '<h2 class="title-section">'.esc_html($featured_services_title).'</h2>';
            endif;

            if($featured_services_subtitle):
                echo '<p class="subtitle">'.esc_html($featured_services_subtitle).'</p>';
            endif;
            ?>
        </div>

        <div class="swiper swiper-services">
            <div class="swiper-wrapper">
                <?php
                foreach ($featured_services as $service):
                    $title = get_the_title($service);
                    $url = get_the_permalink($service);
                    $img = get_the_post_thumbnail_url($service);
                    $category = get_the_terms($service, 'service_cat');
                    $category_name = $category[0]->name;
                    $price = get_field('price_ori', $service);
                    $price_sale = get_field('price_sale', $service);
                ?>
                    <div class="swiper-slide item">
                        <a href="<?php echo $url; ?>">
                            <figure class="image">
                                <img src="<?php echo $img; ?>" alt="<?php echo $alt_text; ?>" title="<?php echo $alt_text; ?>" loading="lazy">
                            </figure>
                            <!-- Title -->
                            <h3 class="title-service">
                                <?php echo esc_html($title); ?>
                            </h3>
                            <!-- Category -->
                            <div class="category btn-common">
                                <p class="text-btn">
                                    <?php echo esc_html($category_name); ?>
                                </p>
                            </div>
                            <!-- Price -->
                            <p class="price price-original <?php echo $price_sale ? 'line-through' : ''; ?>">
                                <?php echo esc_html($price); ?>
                            </p>
                            <p class="price price-sale">
                                <?php echo esc_html($price_sale); ?>
                            </p>
                            <!-- Detail -->
                            <div class="detail btn-common">
                                <p class="text-btn">
                                    Xem chi tiết
                                </p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- End Featured Services slider -->

<!-- Introduction -->
<?php
$about_us_slider = get_field('about_us_slider', 'option');
$about_us_t_title = get_field('about_us_t_title', 'option');
$about_us_b_title = get_field('about_us_b_title', 'option');
$about_us_content = get_field('about_us_content', 'option');

$about_us_url = get_field('about_us_url', 'option');
if($about_us_url):
    $link_url = esc_url($about_us_url['url'] ? $about_us_url['url'] : '');
    $link_title = esc_html($about_us_url['title'] ? $about_us_url['title'] : 'Tìm hiểu thêm');
    $link_target = esc_attr($about_us_url['target'] ? $about_us_url['target'] : '_self');
endif;

$about_us_extend = get_field('about_us_extend', 'option');
$about_us_welcome = get_field('about_us_welcome', 'option');

?>
<section class="about-us">
    <div class="container">
        <div class="about-us-inner">
            <div class="row">
                <!-- Left -->
                <div class="col-12 col-lg-6 inner-left">
                    <div class="swiper swiper-about-us">
                        <div class="swiper-wrapper">
                            <?php foreach($about_us_slider as $slider): ?>
                                <div class="swiper-slide item">
                                    <figure class="image">
                                        <img src="<?php echo esc_url($slider['url']); ?>" alt="<?php echo esc_attr($slider['alt']); ?>" />
                                    </figure>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="col-12 col-lg-6 inner-right">
                    <div class="head-section">
                        <?php if($about_us_t_title): ?>
                        <p class="subtitle">
                            <?php echo $about_us_t_title; ?>
                        </p>
                        <?php endif; ?>

                        <?php if($about_us_b_title): ?>
                        <h2 class="title-section">
                            <?php echo $about_us_b_title; ?>
                        </h2>
                        <?php endif; ?>
                    </div>

                    <!-- Content -->
                    <?php if($about_us_content): ?>
                        <div class="content">
                                <?php echo $about_us_content; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Button -->
                    <?php if($about_us_url): ?>
                        <a href="<?php echo $link_url; ?>" class="btn-more" target="<?php echo $link_target; ?>">
                            <?php echo $link_title; ?>
                        </a>
                    <?php endif; ?>

                    <!-- Extend -->
                    <?php if($about_us_extend): ?>
                        <div class="extend-slider">
                            <div class="swiper swiper-extend">
                                <div class="swiper-wrapper">
                                    <?php foreach($about_us_extend as $item): ?>
                                        <div class="swiper-slide item">
                                            <figure class="image">
                                                <img src="<?php echo $item['icon']; ?>" alt="<?php echo $item['title']; ?>" title="<?php echo $item['title']; ?>" loading="lazy">
                                            </figure>
                                            <h3 class="title">
                                                <?php echo $item['title']; ?>
                                            </h3>
                                            <p class="desc">
                                                <?php echo $item['desc']; ?>
                                            </p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Welcome -->
            <?php if($about_us_welcome): ?>
                <div class="welcome">
                    <?php echo $about_us_welcome; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Introduction -->

<!-- Overview -->
<?php
$overview_bg = get_field('overview_bg', 'option');
$overview_title = get_field('overview_title', 'option');
$overview_title_bg = get_field('overview_title_bg', 'option');
$overview_subtitle = get_field('overview_subtitle', 'option');
$overview = get_field('overview', 'option');
?>
<section class="overview" style="background-image: url(<?php echo $overview_bg; ?>);">
    <div class="container">
        <div class="overview-inner">
            <div class="head-overview">

                <?php if($overview_title_bg): ?>
                <div class="title-bg">
                    <?php echo esc_html($overview_title_bg); ?>
                </div>
                <?php endif; ?>
                
                <?php if($overview_title): ?>
                <h2 class="title-section">
                    <?php echo esc_html($overview_title); ?>
                </h2>
                <?php endif; ?>

                <?php if($overview_subtitle): ?>
                <p class="subtitle">
                    <?php echo esc_html($overview_subtitle); ?>
                </p>
                <?php endif; ?>
            </div>

            <div class="row">
                <?php foreach($overview as $item):
                    $value = $item['value'];
                    $suffix = $item['suffix'];
                    $title = $item['title'];
                    $desc = $item['desc'];
                ?>
                    <div class="col-6 col-lg-3 overview-item">
                        <div class="inner">
                            <?php if($value): ?>
                            <div class="value">
                                <span><?php echo $value; ?></span>
                                <?php echo $suffix; ?>
                            </div>
                            <?php endif; ?>

                            <?php if($title): ?>
                            <div class="title">
                                <?php echo $item['title']; ?>
                            </div>
                            <?php endif; ?>

                            <?php if($desc): ?> 
                            <div class="desc">
                                <?php echo $desc; ?> 
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Overview -->

<!-- Customer experience -->
<?php
$customer_exp = get_field('customer_exp', 'option');
$customer_exp_title = get_field('customer_exp_title', 'option');
$customer_exp_subtitle = get_field('customer_exp_subtitle', 'option');
$customer_featured = get_field('customer_featured', 'option');
?>
<section class="customer-exp">
    <div class="container">
        <div class="head-section">
            <?php if($customer_exp_title): ?>
            <h2 class="title-section">
                <?php echo $customer_exp_title; ?>
            </h2>
            <?php endif; ?>

            <?php if($customer_exp_subtitle): ?>
            <p class="subtitle">
                <?php echo $customer_exp_subtitle; ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-12 col-lg-7 customer-left">
                <?php if($customer_featured): ?>
                <div class="before-after-container">
                    <?php foreach($customer_featured as $item): ?>
                    <div class="before-after-slider">
                        <div class="before-after-image after-image">
                            <img src="<?php echo $item['after_img']; ?>" alt="Sau khi điều trị" loading="lazy">
                            <div class="before-after-label before-label">Before</div>
                        </div>
                        <div class="before-after-image before-image">
                            <img src="<?php echo $item['before_img']; ?>" alt="Trước khi điều trị" loading="lazy">
                            <div class="before-after-label after-label">After</div>
                        </div>
                        <div class="before-after-handle">
                            <div class="before-after-handle-line"></div>
                            <div class="before-after-handle-button">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 4L10 12L18 20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 4L14 12L6 20" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <h3 class="title-section">
                        <a href="<?php echo $item['url']; ?>"><?php echo $item['title']; ?></a>
                    </h3>

                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-5 customer-right">
                <div class="items-customer">
                    <?php 
                    foreach($customer_exp as $item):
                        $embed_url = getYoutubeEmbedUrl($item['youtube_url']);
                    ?>
                        <div class="item">
                            <figure class="image video-thumbnail" data-video="<?php echo $embed_url; ?>">
                                <img src="<?php echo $item['thumbnail']; ?>" alt="<?php echo $item['title']; ?>" title="<?php echo $item['title']; ?>" loading="lazy">
                                <span class="play-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#ffffff" d="M64 320C64 178.6 178.6 64 320 64C461.4 64 576 178.6 576 320C576 461.4 461.4 576 320 576C178.6 576 64 461.4 64 320zM252.3 211.1C244.7 215.3 240 223.4 240 232L240 408C240 416.7 244.7 424.7 252.3 428.9C259.9 433.1 269.1 433 276.6 428.4L420.6 340.4C427.7 336 432.1 328.3 432.1 319.9C432.1 311.5 427.7 303.8 420.6 299.4L276.6 211.4C269.2 206.9 259.9 206.7 252.3 210.9z"/></svg>
                                </span>
                            </figure>
                            <h3 class="title">
                                <?php echo $item['title']; ?>
                            </h3>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Customer experience -->

<!-- Facilities -->
<?php
$facilities_album = get_field('facilities_album', 'option');
$facilities_title = get_field('facilities_title', 'option');
$facilities_subtitle = get_field('facilities_subtitle', 'option');
$facilities_url = get_field('facilities_url', 'option');
?>
<section class="facilities">
    <div class="container">
        <div class="facilities-inner">
            <div class="head-section">
                <h2 class="title-section">
                    <?php echo $facilities_title; ?>
                </h2>

                <?php if($facilities_subtitle): ?>
                <p class="subtitle">
                    <?php echo $facilities_subtitle; ?>
                </p>
                <?php endif; ?>
            </div>

            <div class="facilities-album">
                <?php 
                if($facilities_album): 
                    $args = array(
                        'post_type' => 'album', // Post type Album
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'album_cat', // Taxonomy danh mục album
                                'field'    => 'term_id',
                                'terms'    => $facilities_album,
                            ),
                        ),
                    );
                    
                    $album_posts = new WP_Query($args);
                    
                    if($album_posts->have_posts()): ?>
                        <?php while($album_posts->have_posts()): $album_posts->the_post(); ?>
                            <div class="post-album">
                                <a href="<?php the_permalink(); ?>">
                                    <figure class="image">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                                    </figure>
                                    <h3 class="title">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if($facilities_url):
                $facilityUrl = $facilities_url['url'];
                $facilityTitle = $facilities_url['title'];
                $facilityTarget = $facilities_url['target'];
            ?>
                <div class="btn-more-container">   
                    <a href="<?php echo $facilityUrl; ?>" class="btn-more" target="<?php echo $facilityTarget; ?>">
                        <?php echo $facilityTitle; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Facilities -->

<!-- News -->
<?php
$news_category = get_field('news_category', 'option');
$news_title = get_field('news_title', 'option');
$news_subtitle = get_field('news_subtitle', 'option');
$news_url = get_field('news_url', 'option');
?>
<section class="news-slider">
    <div class="container">
        <div class="head-section">
            <?php if($news_title): ?>
            <h2 class="title-section">
                <?php echo $news_title; ?>
            </h2>
            <?php endif; ?>

            <?php if($news_subtitle): ?>
            <p class="subtitle">
                <?php echo $news_subtitle; ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="swiper swiper-news">
            <div class="swiper-wrapper">
                <?php 
                if($news_category): 
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'cat' => $news_category,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_status' => 'publish'
                    );
                    
                    $news_posts = new WP_Query($args);
                    
                    if($news_posts->have_posts()): ?>
                        <?php while($news_posts->have_posts()): $news_posts->the_post(); ?>
                        <div class="swiper-slide item">
                            <div class="news-item">
                                <a href="<?php the_permalink(); ?>">
                                    <figure class="feature-image">
                                        <?php if(has_post_thumbnail()): ?>
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                                        <?php endif; ?>
                                    </figure>
                                </a>

                                <div class="content">
                                    <div class="logo-news">
                                        <figure class="image">
                                            <img src="<?php echo get_field('logo_news', get_the_ID()); ?>" alt="<?php echo get_field('name_news', get_the_ID()); ?>" title="<?php echo get_field('name_news', get_the_ID()); ?>" loading="lazy">
                                        </figure>
                                        <span class="title">
                                            <?php echo get_field('name_news', get_the_ID()); ?>
                                        </span>
                                    </div>
                                    <h3 class="title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                    <div class="desc">
                                        <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
                                    </div>
                                    <div class="btn-more-container">
                                        <a href="<?php the_permalink(); ?>" class="btn-more">
                                            Xem thêm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- End News -->

<!-- Contact -->
<?php
get_template_part('template-parts/section-contact');
?>
<!-- End Contact -->

<!-- Album -->
<?php
$album_album = get_field('album_cat', 'option');
$album_title = get_field('album_title', 'option');
$album_subtitle = get_field('album_subtitle', 'option');
$album_url = get_field('album_url', 'option');
?>
<section class="facilities album">
    <div class="container">
        <div class="facilities-inner">
            <div class="head-section">
                <h2 class="title-section">
                    <?php echo $album_title; ?>
                </h2>

                <?php if($album_subtitle): ?>
                <p class="subtitle">
                    <?php echo $album_subtitle; ?>
                </p>
                <?php endif; ?>
            </div>

            <div class="facilities-album">
                <?php 
                if($album_album): 
                    $args = array(
                        'post_type' => 'album', // Post type Album
                        'posts_per_page' => 8,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'album_cat', // Taxonomy danh mục album
                                'field'    => 'term_id',
                                'terms'    => $album_album,
                            ),
                        ),
                    );
                    
                    $album_posts = new WP_Query($args);
                    
                    if($album_posts->have_posts()): ?>
                        <?php while($album_posts->have_posts()): $album_posts->the_post(); ?>
                            <div class="post-album">
                                <a href="<?php the_permalink(); ?>">
                                    <figure class="image">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                                    </figure>
                                    <h3 class="title">
                                        <?php the_title(); ?>
                                    </h3>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if($album_url):
                $albumUrl = $album_url['url'];
                $albumTitle = $album_url['title'];
                $albumTarget = $album_url['target'];
            ?>
                <div class="btn-more-container">   
                    <a href="<?php echo $albumUrl; ?>" class="btn-more" target="<?php echo $albumTarget; ?>">
                        <?php echo $albumTitle; ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End Album -->

<!-- Knowledge -->
<?php
$knowledge_category = get_field('knowledge_category', 'option');
$knowledge_title = get_field('knowledge_title', 'option');
$knowledge_subtitle = get_field('knowledge_subtitle', 'option');
$knowledge_url = get_field('knowledge_url', 'option');
?>
<section class="knowledge">
    <div class="container">
        <div class="head-section">
            <?php if($knowledge_title): ?>
            <h2 class="title-section">
                <?php echo esc_html($knowledge_title); ?>
            </h2>
            <?php endif; ?>

            <?php if($knowledge_subtitle): ?>
            <p class="subtitle">
                <?php echo esc_html($knowledge_subtitle); ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="knowledge-grid">
            <?php 
            if($knowledge_category): 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'cat' => $knowledge_category,
                    'post_status' => 'publish'
                );
                
                $knowledge_posts = new WP_Query($args);
                
                if($knowledge_posts->have_posts()): ?>
                    <?php while($knowledge_posts->have_posts()): $knowledge_posts->the_post(); ?>
                        <div class="knowledge-item">
                            <a href="<?php the_permalink(); ?>">
                                <figure class="image">
                                    <?php if(has_post_thumbnail()): ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                                    <?php endif; ?>
                                </figure>
                            </a>

                            <div class="content">
                                <h3 class="title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <div class="meta">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none"><path d="M4.2 0.919922C3.74062 0.919922 3.36 1.30055 3.36 1.75992V2.59992H0.84C0.620156 2.59992 0.397031 2.68031 0.239531 2.83945C0.0803905 2.99695 0 3.22008 0 3.43992V20.2399C0 20.4598 0.0803905 20.6829 0.239531 20.842C0.397031 20.9995 0.620156 21.0799 0.84 21.0799H18.48C18.6998 21.0799 18.923 20.9995 19.0821 20.842C19.2396 20.6829 19.32 20.4598 19.32 20.2399V3.43992C19.32 3.22008 19.2396 2.99695 19.0821 2.83945C18.923 2.68031 18.6998 2.59992 18.48 2.59992H15.96V1.75992C15.96 1.30055 15.5794 0.919922 15.12 0.919922H14.28C13.8206 0.919922 13.44 1.30055 13.44 1.75992V2.59992H5.88V1.75992C5.88 1.30055 5.49937 0.919922 5.04 0.919922H4.2ZM4.2 1.75992H5.04V4.27992H4.2V1.75992ZM14.28 1.75992H15.12V4.27992H14.28V1.75992ZM0.84 3.43992H3.36V4.27992C3.36 4.7393 3.74062 5.11992 4.2 5.11992H5.04C5.49937 5.11992 5.88 4.7393 5.88 4.27992V3.43992H13.44V4.27992C13.44 4.7393 13.8206 5.11992 14.28 5.11992H15.12C15.5794 5.11992 15.96 4.7393 15.96 4.27992V3.43992H18.48V6.37992H0.84V3.43992ZM0.84 7.21992H18.48V20.2399H0.84V7.21992ZM3.36 8.89992V18.5599H15.96V8.89992H3.36ZM4.2 9.73992H6.3V11.8399H4.2V9.73992ZM7.14 9.73992H9.24V11.8399H7.14V9.73992ZM10.08 9.73992H12.18V11.8399H10.08V9.73992ZM13.02 9.73992H15.12V11.8399H13.02V9.73992ZM4.2 12.6799H6.3V14.7799H4.2V12.6799ZM7.14 12.6799H9.24V14.7799H7.14V12.6799ZM10.08 12.6799H12.18V14.7799H10.08V12.6799ZM13.02 12.6799H15.12V14.7799H13.02V12.6799ZM4.2 15.6199H6.3V17.7199H4.2V15.6199ZM7.14 15.6199H9.24V17.7199H7.14V15.6199ZM10.08 15.6199H12.18V17.7199H10.08V15.6199ZM13.02 15.6199H15.12V17.7199H13.02V15.6199Z" fill="#0B6F7E"></path></svg>
                                    <span class="date">
                                        <?php
                                        // Render Vietnamese weekday label from WordPress date (Mon=Thứ 2 ... Sun=Chủ nhật)
                                        $weekdayIndex = (int) get_the_date('w');
                                        $weekdayMap = array(
                                            0 => 'Chủ nhật',
                                            1 => 'Thứ 2',
                                            2 => 'Thứ 3',
                                            3 => 'Thứ 4',
                                            4 => 'Thứ 5',
                                            5 => 'Thứ 6',
                                            6 => 'Thứ 7',
                                        );
                                        $weekdayLabel = isset($weekdayMap[$weekdayIndex]) ? $weekdayMap[$weekdayIndex] : '';
                                        echo $weekdayLabel . ', ngày ' . get_the_date('d/m/Y');
                                        ?>
                                    </span>
                                </div>
                                    
                                <p class="excerpt">
                                    <?php 
                                    $excerpt = get_the_excerpt();
                                    if($excerpt) {
                                        echo wp_trim_words($excerpt, 30, '...');
                                    } else {
                                        echo wp_trim_words(get_the_content(), 30, '...');
                                    }
                                    ?>
                                </ơ>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if($news_url):
            $newsUrl = $news_url['url'];
            $newsTitle = $news_url['title'] ? $news_url['title'] : 'Xem Thêm';
            $newsTarget = $news_url['target'] ? $news_url['target'] : '_self';
        ?>
            <div class="btn-more-container">   
                <a href="<?php echo esc_url($newsUrl); ?>" class="btn-more" target="<?php echo esc_attr($newsTarget); ?>">
                    <?php echo esc_html($newsTitle); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- End Knowledge -->

<!-- Brand -->
<?php
$brand_title = get_field('brand_title', 'option');
$brand_subtitle = get_field('brand_subtitle', 'option');
$brands = get_field('brands', 'option');
?>
<section class="brand">
    <div class="container">
        <div class="head-section">
            <?php if($brand_title): ?>
            <h2 class="title-section">
                <?php echo $brand_title; ?>
            </h2>
            <?php endif; ?>

            <?php if($brand_subtitle): ?>
            <p class="subtitle">
                <?php echo $brand_subtitle; ?>
            </p>
            <?php endif; ?>
        </div>

        <div class="brand-list">
            <?php
            foreach($brands as $brand):
                $logo = $brand['logo'];
                $name = $brand['name'];
                $url = $brand['post_url'];
            ?>
                <div class="brand-item">
                    <a href="<?php echo $url; ?>">
                        <figure class="image">
                            <img src="<?php echo $logo; ?>" alt="<?php echo $name; ?>" title="<?php echo $name; ?>" loading="lazy">
                        </figure>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Brand -->

<?php get_footer(); ?>