<?php get_header();wp_reset_query();  $format = get_post_format();?>
<?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids"));
$a = $post->ID; ?>
<?php while (have_posts()) : the_post(); setPostViews($post->ID);?>
<?php $layout = get_field('layout', $post->ID);?>
<main id="main">
    <?php if($layout == 'basic'): ?>
        <?php get_template_part('breadcrums'); ?>
        <div class="single-service-page">
            <div class="container">
                <div class="inner">
                    <h1 class="post-title"><?php the_title();?></h1>

                    <div class="toc-service">
                        <?php echo do_shortcode('[toc]'); ?>
                    </div>

                    <div class="page-content">
                        <div class="content-post clearfix">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="share-post">
                    <span>Chia sẻ bài viết: </span>
                    <?php echo do_shortcode('[addtoany]'); ?>
                </div>
                <div class="related-service">
                    <h2 class="title-related">Bài viết khác:</h2>
                    <div class="list-service">
                        <?php
                        // Get service categories (taxonomy: service_cat) for current post
                        $service_categories = wp_get_post_terms(get_the_ID(), 'service_cat', array('fields' => 'ids'));
                        $args = array(
                            'post_type' => 'service',
                            'posts_per_page' => 4,
                            'post__not_in' => array(get_the_ID()),
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'service_cat',
                                    'field'    => 'term_id',
                                    'terms'    => $service_categories,
                                ),
                            ),
                        );
                        $related_posts = new WP_Query($args);
                        if ($related_posts->have_posts()):
                            while ($related_posts->have_posts()):
                                $related_posts->the_post();
                                ?>
                                <div class="item-service">
                                    <div class="item-img">
                                        <a href="<?php the_permalink() ?>">
                                            <figure>
                                                <img class="img-service"
                                                    src="<?php the_post_thumbnail_url('large'); ?>"
                                                    alt="<?php the_title() ?>"
                                                    title="<?php the_title() ?>">
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h3 class="title">
                                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                                        </h3>
                                        <p class="desc">
                                            <?php echo wp_trim_words(get_the_content(), 50, '...'); ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<li>Không có bài viết liên quan.</li>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="landing-service-page">
            <h1 class="post-title d-none"><?php the_title();?></h1>

            <!-- Banner -->
            <?php 
            $banner = get_field('banner', $post->ID);
            if($banner):
            ?>
                <section class="banner">
                    <figure class="image-banner">
                        <img src="<?php echo $banner; ?>" alt="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>" loading="lazy">
                    </figure>
                </section>
                <?php
            endif;
            ?>
            <!-- End Banner -->

            <!-- register form -->
            <section class="register-form">
                <div class="container">
                    <div class="inner">
                        <a href="" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <figure class="box">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/golden-box.png" alt="Đăng kí ngay" title="Đăng kí ngay" loading="lazy">
                            </figure>
                        </a>

                        <a href="" class="image-register" data-bs-toggle="modal" data-bs-target="#contactModal">
                            <figure>
                                <img class="click" src="<?php echo get_template_directory_uri(); ?>/images/click.png" loading="lazy">
                                
                                <img class="click_pointer" src="<?php echo get_template_directory_uri(); ?>/images/click_pointer.png" loading="lazy">
                            </figure>
                        </a>
                    </div>
                </div>
            </section>
            <!-- End register form -->

            <!-- Introduction service -->
            <?php 
            $intro_img = get_field('intro_ser_img', $post->ID);
            $intro_title = get_field('intro_ser_title', $post->ID);
            $intro_desc = get_field('intro_ser_desc', $post->ID);
            ?>
            <section class="intro-service">
                <div class="container">
                    <div class="inner">
                        <figure class="image-intro">
                            <img src="<?php echo $intro_img; ?>" alt="<?php echo $intro_title; ?>" title="<?php echo $intro_title; ?>" loading="lazy">
                        </figure>

                        <div class="content-intro">
                            <h2 class="title-section"><?php echo $intro_title; ?></h2>
                            <div class="content-post">
                                <?php echo $intro_desc; ?>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- End Introduction service -->

            <!-- Benefits service -->
            <?php 
            $benefit_title = get_field('benefit_title', $post->ID);
            $benefits = get_field('benefit', $post->ID);
            ?>
            <section class="benefits-service">
                <div class="container">
                    <div class="head-section">
                        <h2 class="title-section"><?php echo $benefit_title; ?></h2>
                    </div>

                    <div class="benefit-list">
                        <?php
                        $i = 1;
                        foreach ($benefits as $benefit) : ?>
                            <div class="benefit-item">
                                <div class="head-item">
                                    <span class="number"><?php echo $i; ?></span>
                                    <h3 class="title"><?php echo $benefit['title']; ?></h3>
                                </div>

                                <p class="desc"><?php echo $benefit['desc']; ?></p>
                            </div>
                        <?php
                        $i++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Benefits service -->

            <!-- Case service -->
            <?php 
            $case_title = get_field('case_title', $post->ID);
            $cases = get_field('cases', $post->ID);
            ?>
            <section class="case">
                <div class="container">
                    <div class="head-section">
                        <h2 class="title-section"><?php echo $case_title; ?></h2>
                    </div>

                    <div class="case-list">
                        <?php foreach ($cases as $case) : ?>
                            <div class="item">
                                <figure class="case-img">
                                    <img src="<?php echo $case['img']; ?>" loading="lazy">
                                </figure>
                                <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2.84211 1.88889C2.3189 1.88889 1.89474 2.31174 1.89474 2.83333V14.1667C1.89474 14.6883 2.3189 15.1111 2.84211 15.1111H14.2105C14.7338 15.1111 15.1579 14.6883 15.1579 14.1667V8.5C15.1579 7.97838 15.5821 7.55556 16.1053 7.55556C16.6285 7.55556 17.0527 7.97838 17.0527 8.5V14.1667C17.0527 15.7315 15.7802 17 14.2105 17H2.84211C1.27246 17 0 15.7315 0 14.1667V2.83333C0 1.26853 1.27246 0 2.84211 0H12.3158C12.839 0 13.2632 0.422847 13.2632 0.944444C13.2632 1.46604 12.839 1.88889 12.3158 1.88889H2.84211ZM16.3828 1.22106C16.7527 0.852238 17.3526 0.852238 17.7225 1.22106C18.0925 1.5899 18.0925 2.18788 17.7225 2.55671L9.19621 11.0567C8.82626 11.4255 8.22639 11.4255 7.85644 11.0567L5.01432 8.22337C4.64436 7.85457 4.64436 7.25654 5.01432 6.88774C5.3843 6.5189 5.98414 6.5189 6.35411 6.88774L8.52633 9.05326L16.3828 1.22106Z" fill="#0B6F7E" style="fill:#0B6F7E;fill:color(display-p3 0.0431 0.4353 0.4941);fill-opacity:1;"></path> </svg>
                                <p class="desc"><?php echo $case['desc']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- End Case service -->

            <!-- contact service -->
            <?php get_template_part('template-parts/section-contact'); ?>
            <!-- End contact service -->

            <!-- Step sevice-->
            <?php
            $step_title = get_field('step_title', $post->ID);
            $steps = get_field('steps', $post->ID);
            ?>
            <section class="step-slider">
                <div class="container">
                    <div class="head-section">
                        <h2 class="title-section"><?php echo $step_title; ?></h2>
                    </div>

                    <div class="swiper swiper-step">
                        <div class="swiper-wrapper">
                        <?php foreach ($steps as $step) : ?>
                            <div class="swiper-slide step-item">
                                <figure class="step-img">
                                    <img src="<?php echo $step['icon']; ?>" loading="lazy">
                                </figure>
                                <div class="line"></div>
                                <span class="number">Bước <?php echo $step['step']; ?></span>
                                <p class="title"><?php echo $step['title']; ?></p>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="list-step">
                        <?php foreach ($steps as $step) : ?>
                            <div class="item-step">
                                <h4 class="number">Bước <?php echo $step['step']; ?>: <?php echo $step['title']; ?></h4>
                                <p class="desc"><?php echo $step['desc']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- End Step sevice-->

            <!-- Fee service -->
            <?php
            $fee_title = get_field('fee_title', $post->ID);
            $fees = get_field('service_fee', $post->ID);
            ?>
            <section class="fee-service">
                <div class="container">
                    <div class="head-section">
                        <h2 class="title-section"><?php echo $fee_title; ?></h2>
                    </div>

                    <div class="fee-list">
                        <?php foreach ($fees as $fee) : ?>
                            <div class="fee-item">
                                <figure class="fee-img">
                                    <img src="<?php echo $fee['img']; ?>" loading="lazy">
                                </figure>
                                <p class="desc"><?php echo $fee['desc']; ?></p>
                                <span class="fee"><?php echo $fee['fee']; ?></span>
                                <a href="" class="btn-more" data-bs-toggle="modal" data-bs-target="#contactModal">Tư vấn ngay</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- End Fee service -->

            <!-- Endow service -->
            <?php
            $endow_title = get_field('endow_title', $post->ID);
            $endows = get_field('endow', $post->ID);
            ?>
            <section class="endow-service">
                <div class="container">
                    <div class="head-section">
                        <h2 class="title-section"><?php echo $endow_title; ?></h2>
                    </div>

                    <div class="endow-list">
                        <?php foreach ($endows as $endow) : 
                            $endow_img = $endow['img'];
                            $endow_title = $endow['title'];
                            $endow_desc = $endow['desc'];
                            $endow_url = $endow['url'];
                            $url = $endow_url['url'];
                            $title = $endow_url['title'];
                            $target = $endow_url['target'];
                            ?>
                            <div class="endow-item">
                                <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                                    <figure class="endow-img">
                                        <img src="<?php echo $endow_img; ?>" loading="lazy">
                                    </figure>
                                </a>
                                
                                <div class="content">
                                    <?php if($endow_title): ?>
                                    <h3 class="title">
                                        <a href="<?php echo $url; ?>" target="<?php echo $target; ?>">
                                            <?php echo $endow_title; ?>
                                        </a>
                                    </h3>
                                    <?php endif; ?>
                                    <?php if($endow_desc): ?>
                                    <p class="desc"><?php echo $endow_desc; ?></p>
                                    <?php endif; ?>
                                    <?php if($url): ?>
                                    <a href="<?php echo $url; ?>" class="btn-more" target="<?php echo $target; ?>">
                                        <?php echo $title; ?>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- End Endow service -->

            <!-- Reason service -->
            <?php
            $reason_title = get_field('reason_title', $post->ID);
            $reasons = get_field('reasons', $post->ID);
            ?>
            <section class="reason-service" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/lydo-bg.webp');">
                <div class="container">
                    <div class="head-section">
                        <h2 class="title-section text-white"><?php echo $reason_title; ?></h2>
                    </div>
                    
                    <div class="reason-list">
                        <?php foreach ($reasons as $reason) : ?>
                            <div class="reason-item">
                                <div class="reason-img">
                                    <span class="value"><?php echo $reason['value']; ?></span>
                                </div>
                                <div class="content">
                                    <h3 class="title"><?php echo $reason['tittle']; ?></h3>
                                    <p class="desc"><?php echo $reason['desc']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
            <!-- End Reason service -->

            <!-- FAQ service -->
            <?php
            $faq_title = get_field('faqs_title', $post->ID);
            $faqs = get_field('faqs', $post->ID);
            ?>
            <section class="faq-service">
                <div class="container">
                    <div class="head-section">
                        <h2 class="title-section"><?php echo $faq_title; ?></h2>
                    </div>

                    <div class="faq-list accordion accordion-flush" id="accordionFlushExample">
                        <?php
                        $i = 1;
                        foreach ($faqs as $faq) : ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading<?php echo $i; ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $i; ?>">
                                        <?php echo $faq['question']; ?>
                                    </button>
                                </h2>
                                <div id="flush-collapse<?php echo $i; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $i; ?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body"><?php echo $faq['answer']; ?></div>
                                </div>
                            </div>
                        <?php
                        $i++;
                        endforeach;
                        ?>
                    </div>
                </div>
            </section>
            ?>
            <!-- End FAQ service -->
        </div>
    <?php endif; ?>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>