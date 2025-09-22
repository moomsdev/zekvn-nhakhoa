<?php
$contact_title = get_field('contact_title', 'option');
$contact_bg = get_field('contact_bg', 'option');
$contact_subtitle = get_field('contact_subtitle', 'option');
$contact_desc = get_field('contact_desc', 'option');
?>
<section class="contact" style="background-image: url('<?php echo $contact_bg; ?>');">
    <div class="container">
        <div class="contact-inner">
            <div class="head-section">
                <h2 class="title-section">
                    <?php echo esc_html($contact_title); ?>
                </h2>

                <?php if($contact_subtitle): ?>
                <p class="subtitle-contact">
                    <?php echo esc_html($contact_subtitle); ?>
                </p>
                <?php endif; ?>

                <?php if($contact_desc): ?>
                <div class="desc-contact">
                    <?php echo apply_filters('the_content', $contact_desc); ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="form-contact">
                <?php echo do_shortcode('[contact-form-7 id="9319710" title="Liên hệ"]'); ?>
            </div>
        </div>
    </div>
</section>