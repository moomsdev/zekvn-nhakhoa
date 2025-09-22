<?php
$logo_news = get_field('logo_news', get_the_ID());
$name_news = get_field('name_news', get_the_ID());
?>
<div class="col-6 col-lg-4 news-slider">
	<div class="news-item">
		<a href="<?php the_permalink(); ?>">
			<figure class="feature-image">
				<?php if(has_post_thumbnail()): ?>
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
				<?php endif; ?>
			</figure>
		</a>

		<div class="content">
			<div class="logo-news">
				<?php if($logo_news && $name_news): ?>
					<figure class="image">
						<img src="<?php echo get_field('logo_news', get_the_ID()); ?>" alt="<?php echo get_field('name_news', get_the_ID()); ?>" title="<?php echo get_field('name_news', get_the_ID()); ?>" loading="lazy">
					</figure>
					<span class="title">
						<?php echo get_field('name_news', get_the_ID()); ?>
					</span>
				<?php endif; ?>
			</div>
			<h3 class="title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h3>
			<div class="desc">
				<?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
			</div>
			<div class="btn-more-container">
				<a href="<?php the_permalink(); ?>" class="btn-more">
					Xem thêm
				</a>
			</div>
		</div>
	</div>
</div>