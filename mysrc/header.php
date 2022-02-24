<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=yearly&format=link'); ?>

	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	<?php if(is_singular()){ wp_enqueue_script('comment-reply');}?>
<!--[if IE]>
<style type="text/css">
#blogtitle span {
  background: none;
  filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/title_gradient.png', sizingMethod='scale');
}
#container {
	background:none;
	filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr='#cfe8f4',EndColorStr='#f8fcfe');
}

#container2 {
	background:none;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/sidebar_bg.png', sizingMethod='scale');
}


#sidebar_gd {
	background:none;
	filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr='#bfdfed',EndColorStr='#9ab8ce');
}

#sidebar h1 {
	background:none;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/sidebar_title.png', sizingMethod='scale');
}
.post-top{
	background:none;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/post_top.png', sizingMethod='scale');
}
.post{
	background:none;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/post_repeater.png', sizingMethod='scale');
}
.post-bottom{
	background:none;
	filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='<?php bloginfo('template_directory'); ?>/images/post_bottom.png', sizingMethod='scale');
}
</style>
<script type="text/javascript">
	window.onload=function(){
			document.getElementById('sidebar_gd').style.height=document.getElementById('container').clientHeight+'px';
	}
</script>

<![endif]-->
	<?php wp_head(); ?>
</head>
<body>
<div id="base">
	<div id="header">
		<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/home_bn.jpg" alt="Home" class="home"/></a>
		<div id="blogtitle"><a href="<?php echo get_option('home'); ?>"><span></span><?php bloginfo('name'); ?></a></div>
		<div id="subtitle"><?php bloginfo('description');?></div>
		<div class="searchbox">
		<form id="searchform" action="<?php bloginfo('url'); ?>/" method="get">
			<div class="search-field"><input type="text" value="Search ..." onfocus="if (this.value == 'Search ...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search ...';}" name="s" id="s" /></div>
			<div class="search-but"><input type="submit" id="searchsubmit" value=" " /></div>
		</form>
		</div>

	</div>
	<div id="menu">
		<a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed"><img src="<?php bloginfo('template_directory'); ?>/images/rss.jpg" alt="Subscribe RSS" class="rss"/></a>
		<ul><?php  
					$options = get_option('widget_pages'); 
					$exclude = empty($options['exclude'] ) ? '' : $options['exclude']; 
					echo menu_separator(wp_list_pages('echo=0&sort_column=menu_order&depth=1&title_li=&exclude='.$exclude)); 
				?>
		</ul>
	</div>
	<div id="container">
		<!--[if !IE]>-->
			<object style="position:absolute;top:0;left:0;width:100%;height:100%;" data="<?php bloginfo('template_directory'); ?>/images/container_gd.svg" type="image/svg+xml" width="100%" height="100%"></object>
		<!--<![endif]-->
		<div id="container2">
			<div id="sidebar_gd">
			<!--[if !IE]>-->
			<object style="position:absolute;top:0;left:0;width:100%;height:100%;" data="<?php bloginfo('template_directory'); ?>/images/sidebar_gd.svg" type="image/svg+xml" width="100%" height="100%"></object>
			<!--<![endif]-->
			</div>
