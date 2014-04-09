<?php



$page = isset($_GET['page']) ? $_GET['page'] : 1;
$hits = isset($_GET['hits']) ? $_GET['hits'] : 8;
$max = isset($_GET['max']) ? $_GET['max'] : 3;

$sql = "SELECT * FROM VMovie LIMIT $hits OFFSET " . (($page - 1) * $hits);



//SELECT * FROM VMovie LIMIT 2 OFFSET 2" //OFFSET 25 gör att inläsningen börjar vid 26:e raden.
$res = $db->ExecuteSelectQueryAndFetchAll($sql);


$print =  "<table border='1'>
		<th>Rad</th>
		<th>Id</th>
		<th>Bild</th>
		<th>Titel</th>
		<th>År</th>";
	foreach ($res as $key => $val)
	{
		
		$print .="<tr>
			<td>$key</td>
			<td>{$val->id}</td>
			<td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td>
			<td>{$val->title}</td>
			<td>{$val->YEAR}</td>
		</tr>";
	}
	$print .= getHitsPerPage(array(2, 4, 8)) . getPageNavigation($hits, $page, $max);



?>