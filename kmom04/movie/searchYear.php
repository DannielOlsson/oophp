<?php

$year1 = isset($_POST['year1']) && !empty($_POST['year1']) ? $_POST['year1'] : null;
$year2 = isset($_POST['year2']) && !empty($_POST['year2']) ? $_POST['year2'] : null;

$print = searchYear($year1, $year2);

$sql = "SELECT * FROM Movie;";
$params = null;

// Do SELECT from a table
if($year1 && $year2) {
  $sql = "SELECT * FROM Movie WHERE year >= ? AND year <= ?;";
  $params = array($year1, $year2);  
} 

elseif($year1) {
  $sql = "SELECT * FROM Movie WHERE year >= ?;";
  $params = array($year1);  
  
} 
elseif($year2) {
  $sql = "SELECT * FROM Movie WHERE year <= ?;";
  $params = array($year2); 
}

$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);


$print .= movieTable($res);
?>