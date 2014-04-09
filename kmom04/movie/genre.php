<?php
//Select all genres
$sql = "SELECT DISTINCT G.name
FROM Genre AS G
INNER JOIN Movie2Genre AS M2G
ON G.id = M2G.idGenre;";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);

$print = "<p>Genre: </p>";
 foreach($res as $key=>$val)
 {
 	$print.= "<a href='movie.php?p=movie&u=genre.php&genre=" .  $val->name . "'>" . $val->name . "</a> "; 

 }
 


//Select from specific genre
$sql = "SELECT 
M.*,
G.name AS genre
FROM Movie AS M
LEFT OUTER JOIN Movie2Genre AS M2G
ON M.id = M2G.idMovie
LEFT OUTER JOIN Genre AS G
ON M2G.idGenre = G.id
WHERE G.name = ?;";

if(isset($_GET['genre']) && $_GET['genre'] != NULL)
{
	$params = array($_GET['genre']);
	$res = $db->ExecuteSelectQueryAndFetchAll($sql,$params);	
	$print .= movieTable($res);
}

?>