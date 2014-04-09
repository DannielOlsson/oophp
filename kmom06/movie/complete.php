<?php

$params = array();
$year1 = isset($_POST['year1']) && !empty($_POST['year1']) ? $_POST['year1'] : null;
$year2 = isset($_POST['year2']) && !empty($_POST['year2']) ? $_POST['year2'] : null;
$title = isset($_POST['title']) && !empty($_POST['title']) ? $_POST['title'] : null;
$genre = isset($_GET['genre']) && !empty($_GET['genre']) ? $_GET['genre'] : null;





$genreSql = "SELECT DISTINCT G.name
FROM Genre AS G
INNER JOIN Movie2Genre AS M2G
ON G.id = M2G.idGenre;";
$res = $db->ExecuteSelectQueryAndFetchAll($genreSql);

$print = "<p>Genre: </p>";
 foreach($res as $key=>$val)
 {
 	$print.= "<a href='movie.php?p=movie&u=complete.php&genre=" .  $val->name . "'>" . $val->name . "</a> "; 
 }
 $print .="<a href='movie.php?p=movie&u=complete.php'>Alla</a>";

$sql = "SELECT * FROM Movie";
 $print .= " 
<form method='POST'>
<fieldset> 

	<legend>Sök</legend>
	<p><label>Titel: <input type='search' name='title' value='{$title}'/></label></p>
	<legend>Sök</legend>
	<p><label>Skapad mellan åren: 
	<input type='text' name='year1' value='{$year1}'/>
	-
	<input type='text' name='year2' value='{$year2}'/>
	  </label>
	</p>
<input type='submit' value='Sök!'/>
<p><a href=''>Visa alla</a></p>
</fieldset>

</form>
"; 

if($genre != null)
{
	$sql = "SELECT 
M.*,
G.name AS genre
FROM Movie AS M
LEFT OUTER JOIN Movie2Genre AS M2G
ON M.id = M2G.idMovie
LEFT OUTER JOIN Genre AS G
ON M2G.idGenre = G.id
WHERE G.name = ?;";
	$params = array($genre);
}

if($title != null)
{
	$title = "%" . $title . "%";
	$sql = "SELECT * FROM Movie WHERE title LIKE ? ";
	$params = array($title);
}

if($year1 && $year2 != null)
{
 	$sql = "SELECT * FROM Movie WHERE year >= ? AND year <= ? ";
 	$params = array($year1, $year2);
}

if($year1 && $year2 && $title != null)
{
 	$sql = "SELECT * FROM Movie WHERE year >= ? AND year <= ? AND title LIKE ?";
 	$params = array($year1, $year2, $title);
}
// if(isset($_POST['year1'], $_POST['year2'], $_POST['title'], $_POST['genre']))
// {
// 	$sql = "SELECT * FROM Movie WHERE year >= ? AND year <= ? AND title LIKE ? AND genre = ?";
// 	$params = array($year1, $year2, $title, $genre);
// }

$res = $db->ExecuteSelectQueryAndFetchAll($sql, $params);
$print .= $db->printTable($res);

?>