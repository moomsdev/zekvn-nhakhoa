<?php get_header(); $a=get_query_var('cat' );?>
<?php $term = get_queried_object(); ?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-archive">
        <div class="container">
            <h1 class="page-title">
                <?php
                $page_title = single_term_title('', false);
                echo esc_html($page_title);
            ?>
            </h1>
            <div class="list-post">
                    <div class="row">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('loop'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php get_template_part( 'pagination' ); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>