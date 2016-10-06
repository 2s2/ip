<div class="row">
	<div class="span12">
		<div class="page-title m3"><div class="line-before" style="width: 431px;"></div><h2>Популярные игры</h2><div class="line-after" style="width: 431px;"></div></div>
		<ul>
			<?php $pc = new WP_Query('cat=4&orderby=date&posts_per_page=6'); ?>
				<?php while ($pc->have_posts()) : $pc->the_post(); ?>
				<li class='products-grid span2'>
					<a href="<?php the_permalink(); ?>" class="product-image" title="<?php the_title(); ?>"><img src="#" alt="<?php the_title(); ?>"></a>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_post_thumbnail(); ?></a>
					<h2 class="product-name"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="product-info"><a href="#"><?php get_the_category(); ?></a></div>
					<a href="<?php the_permalink(); ?>" class="btn">Играть</a>
				</li>
			<?php endwhile; ?>
		</ul>
	</div>
</div>