<?php get_header();wp_reset_query();  $format = get_post_format();?>
<?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids"));$a=$post->ID; ?>
<?php while (have_posts()) : the_post(); setPostViews($post->ID);?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-body">
        <div class="container">
            <?php if($format=='aside' ){ ?>
            
            <?php }elseif($format=='chat' ){ ?>

            <?php }else{ ?>
            <div class="row row-margin">
                <div class="col-lg-9 col-md-12">
                    <h1 class="page-title"><?php the_title();?></h1>
                    <?php get_template_part('meta'); ?>
                    <div class="page-content">
                        <div class="content-post clearfix">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="single-tags">
                    <?php the_tags( 'Tags: ', ' '); ?>
                    </div>
                    <div class="page-content">
                        <?php comments_template(); ?>
                    </div>
                    <?php
                    $categories = get_the_category(get_the_ID());
                    if ($categories){
                    
                    $category_ids = array();
                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                    $args=array(
                    'category__in' => $category_ids,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 4,
                    );
                    $my_query = new wp_query($args);
                    if( $my_query->have_posts() ): ?>
                    <div class="single-related">
                        <div class="title">Bài viết liên quan</div>
                        <div class="list">
                            <?php while ($my_query->have_posts()):$my_query->the_post(); ?>
                            <div class="item">
                                <div class="img">
                                    <a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_post_thumbnail('medium', array('alt'   => trim(strip_tags( $post->post_title )),'title' => trim(strip_tags( $post->post_title )),)); ?></a>
                                </div>
                                <div class="info">
                                    <div class="name"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
                                    <div class="date"><?php the_time('d/m/Y'); ?></div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>  
                    </div>
                    <?php endif; wp_reset_query();} ?>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="page-sidebar">
                        <?php get_template_part('sidebar'); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>