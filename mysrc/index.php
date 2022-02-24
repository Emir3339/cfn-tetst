<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content">
	<?php if ( is_home() ) { ?>
		<div class="spacer"></div>
	<?php } ?>

<?php
	if (have_posts()) :
		$post = $posts[0]; // Hack. Set $post so that the_date() works.
		if (is_category()) { /* If this is a category archive */ ?>
				<h1 class="archivetitle">Archive for the Category &loz; <?php echo single_cat_title(); ?> &loz;</h1>
<?php		} elseif (is_day()) {  /* If this is a daily archive */ ?>
				<h1 class="archivetitle">Archive for <?php the_time('F jS, Y'); ?></h1>
<?php		} elseif (is_month()) { /* If this is a monthly archive */ ?>
				<h1 class="archivetitle">Archive for &loz; <?php the_time('F, Y'); ?> &loz;</h1>
<?php		} elseif (is_year()) { /* If this is a yearly archive */ ?>
				<h1 class="archivetitle">Archive for &loz; <?php the_time('Y'); ?> &loz;</h1>
<?php		} elseif (is_search()) { /* If this is a search */ ?>
				<h1 class="archivetitle">Search Results</h1>
<?php		} elseif (is_author()) { /* If this is an author archive */ ?>
				<h1 class="archivetitle">Author Archive</h1>
<?php		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { /* If this is a paged archive */ ?>
			<h1 class="archivetitle">Blog Archives</h1>
<?php		} elseif (is_tag()) { /* If this is a tag archive */ ?> 
				<h1 class="archivetitle">Tag-Archive for &loz; <?php single_tag_title(); ?> &loz; </h1>
<?php		}

		while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>">
				<div class="post-top"></div>
				<div <?php post_class('post'); ?>><div class="post-content">
				
				<div class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
					<div class="date">
						<?php the_time('l, F dS, Y') ?>&nbsp;|&nbsp;Автор: <?php the_author_posts_link('nickname'); ?>
						<?php edit_post_link(' &raquo; Edit &laquo;','|',''); ?>
					</div>
				</div>
				<div class="entry">
					<?php if (is_search()){
							the_excerpt();
						}else{
							the_content('далее...'); 
						}
					?>
				</div>	
				<div class="info">
					<span class="category">Рубрика: <?php the_category(', ') ?></span>
					<?php the_tags('&nbsp;|&nbsp;<span class="tags">Теги: ', ', ', '</span>'); ?>
					&nbsp;|&nbsp;<span class="bubble"><?php comments_popup_link('Leave a Comment','One Comment', '% Comments', '','Comments off'); ?></span>
				</div>
				</div></div>
			<div class="post-bottom"></div>
			</div>
		
		<?php endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>
		<h1>Not found</h1>
		<p class="sorry">"Sorry, but you are looking for something that isn't here. Try something else.</p>
	<?php endif; ?>
</div>
<?php get_footer();?>