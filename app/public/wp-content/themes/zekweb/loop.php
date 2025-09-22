<div class="col-12 col-md-6 col-lg-4 item-news">
	<div class="item-news-inner">
		<a href="<?php the_permalink(); ?>">
			<figure>
				<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
			</figure>
			<h3 class="title">
				<?php the_title(); ?>
			</h3>
		</a>
	</div>
</div>