<?php

$delete = isset($_GET['delete']) ? $_GET['delete'] : null;
$id = isset($_GET['delete']) ? $_GET['delete'] : null;

// Check if form was submitted
$output = null;
if($delete != null) {
  $sql = 'DELETE FROM Movie WHERE id = ? LIMIT 1';
  $db->ExecuteQuery($sql, array($id));
  $db->SaveDebug("Det raderades " . $db->RowCount() . " rader från databasen.");
  header('Location: movie.php?p=movie&u=delete.php');
}
$sql = "SELECT * FROM Movie";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);

$print = "<table border='1'>
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
			<td><a href='movie.php?p=movie&u=delete.php&delete={$val->id}'>Ta bort </a>
		</tr>";
	}
?>