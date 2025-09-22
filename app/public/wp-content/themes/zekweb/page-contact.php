<?php
/*
Template Name: Liên hệ
 */

get_header(); 
?>

<main id="main">
    <?php get_template_part('breadcrums'); ?>
    <div class="page-contact">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="google-map">
                        <?php echo get_field('gg_map', 'option'); ?>
                    </div>
                </div>

                <div class="col-12 col-md-6">
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
                </div>
            </div>
        </div>

        <?php get_template_part('template-parts/section-contact'); ?>
    </div>
</main>
<?php get_footer(); ?>