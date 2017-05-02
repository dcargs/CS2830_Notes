<?php

	// read this article 
	// 		https://www.smashingmagazine.com/2011/10/getting-started-with-php-templating/

  require 'Template.php';

  $page = new Template();
  $page->name = 'Professor Wergeles';
  $result = $page->build('page.tmpl');

  print $result;
  
  
?>
