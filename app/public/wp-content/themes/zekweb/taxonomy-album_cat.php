<?php get_header(); $a=get_query_var('cat' );?>
<?php $term = get_queried_object(); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-archive-album facilities album">
        <div class="container">
            <h1 class="page-title">
                <?php
                $page_title = single_term_title('', false);
                echo esc_html($page_title);
            ?>
            </h1>
            <div class="facilities-album">
                <?php while (have_posts()) : the_post(); ?>
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
            </div>

            <?php get_template_part( 'pagination' ); ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>