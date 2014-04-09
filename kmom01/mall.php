<!doctype html>
<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors 
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly
?>

<html lang="sv"> 
<head>
<meta charset="utf-8"/>
<title>php20</title>
</head>
<body>
<?php echo "<p>Hello World from PHP.</p>";
		echo "Pi equals:" . pi();
		
 ?>
<hr>
<a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
<a href="source.php">Källkod</a>
</body>
</html>