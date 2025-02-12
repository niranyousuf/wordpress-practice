<?php while (have_posts()) : the_post(); ?>
	<div class="single__post">
		<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
		<div class="metabox">
			<span>Posted By: <?php the_author_posts_link() ?></span>
			<span>on <?php the_time('j. M, y') ?></span>
			<span>in <?php echo get_the_category_list(", ") ?></span>
			<span class="post-views"><?php echo get_post_views(get_the_ID()); ?></span>
		</div>
		<div class="post__content">
			<?php the_excerpt() ?>
			<a class="" href="<?php the_permalink(); ?>">Continue reading </a>
		</div>
	</div>
<?php endwhile; ?>
<div class="pagination ">
	<?php echo paginate_links(); ?>
</div>