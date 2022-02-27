<div id="sidebar">
<ul>
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : 
	?>
		
		<?php wp_list_pages('title_li=<h1>Pages</h1>'); ?>		
		<?php wp_list_categories('show_count=1&title_li=<h1>Categories</h1>'); ?>

		<li>
			<h1>Архив</h1>
			<ul><?php wp_get_archives('type=monthly'); ?></ul>
		</li>

		<?php if ( is_archive() ) { ?>
				<li><h1>Календарь</h1><?php get_calendar(); ?></li>
		<?php	} ?>

		<?php if ( is_single()|| is_page() ) { ?>
				<li><h1>Записи</h1><ul><?php wp_get_archives('type=postbypost&limit=5')?></ul></li>
		<?php	} ?>
			
		<?php if(function_exists('wp_tag_cloud')){ ?>
				<li><h1>Облако меток</h1><ul><?php wp_tag_cloud('smallest=10&largest=15&number=30&unit=px&number=20&format=flat&orderby=name'); ?></ul></li>
		<?php }?>

		<?php if ( is_home() || is_page() ) { 	/* If this is the frontpage */ 
				wp_list_bookmarks('orderby=rand&title_before=<h1>&title_after=</h1>&between=<br/>&show_description=1&limit=20');
		?>

<?php } ?>
		<li><h1>Meta</h1>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a></li>
				<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a></li>
				<li><a href="http://wordpresse.ru">Wordpress</a></li>
				<?php wp_meta(); ?>
			</ul>
		</li>
<?php endif; ?>
		</ul>
		
</div>