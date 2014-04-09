<?php

$doco['title'] = "Sida";
$type = "page";

$url = isset($_GET['url']) ? $_GET['url'] : null;
$url = empty($url) ? null : $url;

if($url != null)
{
	// Get content
	$print = $content->printContent($type,$url);
}

else
{	
	$print = $content->printContentList($type);
}

?>