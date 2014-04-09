<!doctype html>
<html lang="sv">
<head>
<meta charset="utf-8">
<title>CDice</title>
</head>
<body>
<?php

function myAutoloader($class) {
  $path = "{$class}.php";
  if(is_file($path)) {
    include($path);
  }
}

spl_autoload_register('myAutoloader');
// include("ClassDice.php");
if(isset($_GET['roll']))
{
	$rolls = $_GET['roll'];

}
else
{
	$rolls = 5;
}

echo 'Klicka för att kasta tärning antal ggr: <a href = "?roll=6">6 kast</a><a href = "?roll=12">12 kast</a><a href = "?roll=24">24 kast</a> <br> ' ;

//Object creating
$dice = new CDice;
$histogram = new CHistogram;


$dice->Roll($rolls); // Rolls

$array = array();


var_dump($array);
// Histogram
$histogram->getHistogram();




echo "Talföljd: "; 
$dice->printDice($rolls); 
echo "<br>Antal kast: " . $rolls . '<br>';
echo "Totalt värde av tärningskast: " . $dice->getTotal() . '<br>';
echo "Medelvärde av tärningskast " . $dice->getMedian($rolls) . '<br>';




?>
</body>
</html>
