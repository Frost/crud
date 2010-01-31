<?php
  $categories = dir('../pages');
  
  while(false !== ($category = $categories->read())) {
    echo "<span>" . $entry . "</span>"
  }

?>