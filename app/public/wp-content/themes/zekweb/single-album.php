<?php get_header();wp_reset_query();  $format = get_post_format();?>
<?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids"));
$a = $post->ID; ?>
<?php while (have_posts()) : the_post(); setPostViews($post->ID);?>
<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="single-album">
        <div class="container">
            <div class="inner">
                <h1 class="post-title"><?php the_title();?></h1>

                <div class="banner-album">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                </div>

                <div class="page-content">
                    <div class="content-post clearfix">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="row">
                    <?php
                    $album_images = get_field('facility_gallery', $post->ID);
                    $i = 0;
                    foreach($album_images as $image):
                    ?>
                    <div class="col-6 col-md-4">
                        <div class="item-album">
                            <a href="<?php echo $image['img']; ?>" data-fancybox="album-gallery" data-caption="<?php the_title().' - '.$i; ?>">
                                <figure>
                                    <img src="<?php echo $image['img']; ?>" alt="<?php the_title().' - '.$i; ?>" title="<?php the_title().' - '.$i; ?>" loading="lazy">
                                </figure>
                            </a>
                        </div>
                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>