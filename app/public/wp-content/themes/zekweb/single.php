<?php get_header();wp_reset_query();  $format = get_post_format();?>
<?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids"));
$a = $post->ID; ?>
<?php while (have_posts()) : the_post(); setPostViews($post->ID);?>
<main id="main">
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
                    $service_categories = wp_get_post_terms(get_the_ID(), 'category', array('fields' => 'ids'));
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'post__not_in' => array(get_the_ID()),
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_status' => 'publish',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
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
</main>
<?php endwhile; ?>
<?php get_footer(); ?>