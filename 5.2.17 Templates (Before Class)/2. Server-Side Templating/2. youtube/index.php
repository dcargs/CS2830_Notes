<?php

	//index.php?src=XYZ

  $id = empty($_GET['src']) ? 'ABC' : $_GET['src'];

  $videoData = json_decode(file_get_contents('videoData.json'));
  //print_r($videoData);

  $data = $videoData->$id;

  require 'Template.php';
  $page = new Template();
  $page->data = $data;

  print $page->build('videoPage.tmpl');

?>
