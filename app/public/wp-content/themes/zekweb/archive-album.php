<?php get_header(); $a=get_query_var('cat' );?>
<?php $term = get_queried_object(); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-archive">
        <div class="container">
            <h1 class="page-title">
                <?php
                $page_title = post_type_archive_title('', false);
                echo esc_html($page_title);
                ?>
            </h1>

            <div class="row">
                <!-- get list categories -->
                <?php $categories = get_terms(array(
                    'taxonomy' => 'album_cat',
                    'hide_empty' => false,
                )); ?>
                <?php foreach ($categories as $category) : ?>
                    <div class="col-12 col-md-6 col-lg-3 item-post-archive">
                        <div class="inner">
                            <a href="<?php echo get_term_link($category); ?>">
                                <figure>
                                    <img src="<?php echo get_field('category_service_img', $category); ?>" alt="<?php echo $category->name; ?>" title="<?php echo $category->name; ?>" loading="lazy">
                                </figure>
                                <h3 class="title">
                                    <?php echo $category->name; ?>
                                </h3>
                            </a>
                            
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>