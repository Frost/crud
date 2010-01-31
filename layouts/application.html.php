?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Martin Frost">
    <title>Masur Pellets</title>
  
    <script src="/javascripts/jquery.js"></script>
    <script src="/javascripts/application.js"></script>
    <link rel="stylesheet" href="/stylesheets/main.css" type="text/css">
  </head>
  <body>
    <div id="wrapper">
      <div id="header">
        <img src="<?php echo($logo_filename);?>" alt="<?php echo($title); ?>"/>
      </div>
      
      <div id="title">
        <h2>
          <?php echo($title); ?>
        </h2>
      </div>
  
      <div id="additional_content">
      </div>

      <div id="navigation">
        <?php echo(generate_menu()); ?>
      </div>

      <div id="contents">
        <p><?php echo($contents); ?></p>
      </div>

    </div>
    <div id="footer">
      <?php include('includes/footer.php'); ?>
    </div>
    
  </body>
</html>
