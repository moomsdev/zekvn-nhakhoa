<footer id="footer">
    <div class="container">
        <div class="f-widget row">
            <?php dynamic_sidebar( 'footer'); ?>
        </div>
    </div>
</footer>
<div class="supports">
    <div class="item">
        <a href="tel:<?php the_field('hotline','option'); ?>" class="hotline" title="Gọi ngay">
            <img src="<?php bloginfo('template_url' ); ?>/images/support-hotline.png" alt="icon">
        </a>
    </div>
    <div class="item">
        <a href="http://zalo.me/<?php the_field('zalo','option')?>" target="_blank" class="zalo" title="Chat Zalo">
            <img src="<?php bloginfo('template_url' ); ?>/images/support-zalo.png" alt="icon">
        </a>
    </div>
    <div class="item">
        <a href="https://m.me/<?php the_field('messenger','option') ?>" target="_blank" class="messenger" title="Chat Facebook">
            <img decoding="async" src="<?php bloginfo('template_url' ); ?>/images/support-messenger.png" alt="icon">
        </a>
    </div>
</div>
<div class="backtop">
    <a href="#top" id="back-top" title="Back To Top">
        <img src="<?php bloginfo('template_url' ); ?>/images/backtop.png" alt="icon">
    </a>
</div>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/select2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url' ); ?>/js/custom.js?v=<?php echo time();?>"></script>
<?php $value = get_field( 'code_footer','option' ); echo $value?>
<?php wp_footer(); ?>
</div>
</body>
</html>