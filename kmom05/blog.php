<?php

$doco['title'] = "Blog";
$type = "post";

$slug = isset($_GET['slug']) ? $_GET['slug'] : null;
$slug = empty($slug) ? null : $slug;

if($slug != null)
{
	// Get content
	$print = $content->printContent($type,$slug);
}
else
{
	$print = $content->printContentList($type);
}

?>