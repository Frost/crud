<?php
  require_once('lib/crud.php');
  require_once('lib/classTextile.php');
  $textile = new Textile();
  $page = urldecode($_GET['page']);
  if($page == NULL) {
    $page = "hem";
  }
  if($page != NULL && $page != "index.php"){
    
    $page_info = preg_split("/\//", $page);
    $category = $page_info[0];
    $sub_page = $page_info[1];

		$categories = ls('pages');

    foreach ($categories as $cat) {
      if(preg_match("/{$category}/", $cat, $match)>0) {
        $category_dir = $cat;
      }
    }
    if(is_dir("pages/$category_dir")) {
      $page_name = "pages/$category_dir/$sub_page.php";
    } else {
      $pages = array_diff(scandir('pages'), $dots);
      foreach($pages as $p) {
        if(preg_match("/{$page}/", $p, $match)>0) {
          $m = "pages/$p";
					// få den längsta matchningen av $page... detta är riktigt fult :(
          if(count($m) > count($page_name)){
            $page_name = "pages/$p";
          }
        }
      }
    }
    $contents_file = fopen($page_name,'r');
    $contents = fread($contents_file, filesize($page_name));
    $title = generate_title_from_page($page_name);
  } 
  if(preg_match('/\?>/', $contents)) {
    list($settings, $contents) = explode('?>', $contents);
    eval($settings);
  }
  $contents = $textile->TextileThis($contents);
  
  $layout = load_layout($layout_filename);
  $evaluated_layout = eval($layout);
  echo($evaluated_layout);
?>
