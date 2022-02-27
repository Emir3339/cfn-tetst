<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
<div class="spacer"></div>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>">
			<div class="post-top"></div>
			<div <?php post_class('post'); ?>><div class="post-content">
					<div class="posttitle"><?php the_title(); ?></div>
					<div class="entry">
						<?php the_content('more...'); ?><div class="clear"></div>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					</div>
			</div></div>
			<div class="post-bottom"></div>
		</div>
	<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
</div>



<?php get_footer(); ?>