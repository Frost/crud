<?php
require_once('../config/settings.php');

function debug($str) {
	echo("DEBUG: $str");
}

function humanize($str) {
	return ucfirst(preg_replace('/_/', ' ', $str));
}

function remove_priority_order_from_filename($str) {
	return preg_replace('/^\d+_/','',$str);
}

function humanize_page_name($str) {
  $str = preg_replace('/\..*$/','',$str);
	$str = remove_priority_order_from_filename($str);
	return humanize($str);
}

function generate_title_from_page($str) {
	$str = preg_replace('/.*\/\d+_([^.]*)\..*/','\1',$str);
	return humanize($str);
}

function ls($dir) {
	$dots = array('.','..');
	return array_diff(scandir($dir), $dots);
}

function menu_link($str) {
	$rel_path = preg_replace('/\..*$/','',$str);
	$rel_path = preg_replace('/\d+_/','',$rel_path);
	echo("<li><a href=\"/$rel_path\">".humanize_page_name($rel_path)."</a></li>");
}

function menu_group($category) {
	echo("<p>".humanize(remove_priority_order_from_filename($category))."</p>");
	$pages = ls("$page_dir/$category");
	echo("<ul>");
	foreach($pages as $page) {
		$relative_page_path = "$category/$page";
		menu_link($relative_page_path);
	}
	echo("</ul>");
}

function generate_menu(){
  echo("<ul>");
	$page_dir = 'pages';
	$categories = ls($page_dir);

	foreach ($categories as $category) {
		if(is_dir($category)) {
			menu_group($category);
		} else {
			menu_link($category);
		}
	}
  echo("</ul>");
}

function load_layout() {
	$layout_file = fopen($layout_filename, 'r');
	$layout = fread($layout_file, filesize($layout_filename));
	return $layout;
}

function load_contents($page) {
	return "";
}

function render($page = $default_page) {
	$textile = new Textile();
	if($page == NULL) {
		// TODO: do something fancy error checking...
	}
	
	$contents = load_contents($page);
	$contents = $textile->TextileThis($contents);
	$layout = load_layout($layout_filename);
	echo(eval($layout));
}

?>
