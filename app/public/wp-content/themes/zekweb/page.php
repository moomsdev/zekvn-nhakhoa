<?php get_header(); ?>
<?php while (have_posts()) : the_post();setPostViews($post->ID); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body">
        <div class="container">
            <h1 class="page-title"><?php the_title();?></h1>
            <div class="page-content">
                <div class="content-post clearfix">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="share-post">
                <span>Chia sẻ bài viết: </span>
                <?php echo do_shortcode('[addtoany]'); ?>
            </div>
        </div>

        <?php
            get_template_part('template-parts/section-contact');
        ?>
    </div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>