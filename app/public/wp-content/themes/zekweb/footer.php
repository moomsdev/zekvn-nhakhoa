<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="info-company">
                    <figure class="logo-footer">
                        <img src="<?php echo get_field('logo_footer', 'option'); ?>" alt="logo">
                    </figure>
                    
                    <div class="slogan">
                        <?php echo get_field('slogan_footer', 'option'); ?>
                    </div>

                    <p class="email">Email: <?php echo get_field('email', 'option'); ?></p>
                    <p class="website">Website: <?php echo bloginfo('url'); ?></p>
                    <p class="hotline">Hotline: <?php echo get_field('hotline', 'option'); ?></p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5">
                <h2 class="title-footer-col">
                    Hệ thống chi nhánh
                </h2>
                <div class="brands">
                    <?php
                    $brands = get_field('brands_footer', 'option');
                    foreach($brands as $brand):
                        $province = $brand['province'];
                        $brand_detail = $brand['brand'];
                    ?>
                        <div class="brand">
                            <h3 class="province">
                                <?php echo $province; ?>
                            </h3>

                            <ul class="brand-detail">
                                <?php
                                foreach($brand_detail as $item):
                                    $name = $item['name'];
                                    $address = $item['address'];
                                    $hotline = $item['hotline'];
                                ?>
                                    <li class="item">
                                        <b class="name"><?php echo $name; ?>:</b>
                                        <?php echo $address; ?>
                                        <br> Hotline: <?php echo $hotline; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="working-time">
                    <p class="time">
                        <?php echo get_field('working_hours', 'option'); ?>
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <h2 class="title-footer-col">
                    Thông tin cần biết
                </h2>

                <nav class="nav-footer">
                    <?php 
                        wp_nav_menu(array(
                            'container' => '', 
                            'theme_location' => 'footer', 
                            'menu_class' => 'menu',
                        )); 
                    ?>
                </nav>

                <!-- <div class="social">
                    <a href="">
                        <img src="<?php bloginfo('template_url'); ?>/images/social-facebook.png" alt="icon">
                    </a>
                    <a href="">
                        <img src="<?php bloginfo('template_url'); ?>/images/social-instagram.png" alt="icon">
                    </a>
                    <a href="">
                        <img src="<?php bloginfo('template_url'); ?>/images/social-youtube.png" alt="icon">
                    </a>
                    <a href="">
                        <img src="<?php bloginfo('template_url'); ?>/images/social-tiktok.png" alt="icon">
                    </a>
                </div> -->
            </div>

            <div class="col-12 copyright">
                <p class="text">
                    <?php echo get_field('copyright', 'option'); ?>
                </p>
            </div>
        </div>
    </div>
</footer>
<div class="supports">
    <div class="item">
        <a href="tel:<?php the_field('hotline', 'option'); ?>" class="hotline" title="Gọi ngay">
            <img src="<?php bloginfo('template_url'); ?>/images/support-hotline.png" alt="icon">
        </a>
    </div>
    <div class="item">
        <a href="http://zalo.me/<?php the_field('zalo', 'option') ?>" target="_blank" class="zalo" title="Chat Zalo">
            <img src="<?php bloginfo('template_url'); ?>/images/support-zalo.png" alt="icon">
        </a>
    </div>
    <div class="item">
        <a href="https://m.me/<?php the_field('messenger', 'option') ?>" target="_blank" class="messenger" title="Chat Facebook">
            <img decoding="async" src="<?php bloginfo('template_url'); ?>/images/support-messenger.png" alt="icon">
        </a>
    </div>
</div>
<div class="backtop">
    <a href="#top" id="back-top" title="Back To Top">
        <img src="<?php bloginfo('template_url'); ?>/images/backtop.png" alt="icon">
    </a>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/swiper-bundle.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/select2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/custom.js?v=<?php echo time(); ?>"></script>
<?php $value = get_field('code_footer', 'option');
echo $value ?>

<!-- Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 position-relative">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1060;"></button>
                <div class="ratio ratio-16x9">
                    <iframe src="" allowfullscreen title="Video Player"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal contact -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0 position-relative">
                <div class="calendar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path fill="#0b6f7e" d="M224 64C241.7 64 256 78.3 256 96L256 128L384 128L384 96C384 78.3 398.3 64 416 64C433.7 64 448 78.3 448 96L448 128L480 128C515.3 128 544 156.7 544 192L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 192C96 156.7 124.7 128 160 128L192 128L192 96C192 78.3 206.3 64 224 64zM160 304L160 336C160 344.8 167.2 352 176 352L208 352C216.8 352 224 344.8 224 336L224 304C224 295.2 216.8 288 208 288L176 288C167.2 288 160 295.2 160 304zM288 304L288 336C288 344.8 295.2 352 304 352L336 352C344.8 352 352 344.8 352 336L352 304C352 295.2 344.8 288 336 288L304 288C295.2 288 288 295.2 288 304zM432 288C423.2 288 416 295.2 416 304L416 336C416 344.8 423.2 352 432 352L464 352C472.8 352 480 344.8 480 336L480 304C480 295.2 472.8 288 464 288L432 288zM160 432L160 464C160 472.8 167.2 480 176 480L208 480C216.8 480 224 472.8 224 464L224 432C224 423.2 216.8 416 208 416L176 416C167.2 416 160 423.2 160 432zM304 416C295.2 416 288 423.2 288 432L288 464C288 472.8 295.2 480 304 480L336 480C344.8 480 352 472.8 352 464L352 432C352 423.2 344.8 416 336 416L304 416zM416 432L416 464C416 472.8 423.2 480 432 480L464 480C472.8 480 480 472.8 480 464L480 432C480 423.2 472.8 416 464 416L432 416C423.2 416 416 423.2 416 432z"/></svg>
                </div>
                <?php get_template_part('template-parts/section-contact'); ?>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</div>
</body>

</html>