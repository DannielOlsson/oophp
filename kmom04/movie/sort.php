<?php





// Check that incoming is valid


// Get parameters for sorting
$orderby  = isset($_GET['orderby']) ? strtolower($_GET['orderby']) : 'id';
$order    = isset($_GET['order'])   ? strtolower($_GET['order'])   : 'asc';
 
in_array($orderby, array('id', 'title', 'year')) or die('Check: Not valid column.');
in_array($order, array('asc', 'desc')) or die('Check: Not valid sort order.');
 

// Do SELECT from a table
$sql = "SELECT * FROM VMovie ORDER BY $orderby $order;";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);


$print = "<table border='1'>
<th>Rad</th>
<th>Id " . orderby('id') . "</th>
<th>Bild</th>
<th>Titel " . orderby('title') . "</th>
<th>År " . orderby('year') . "</th>
<th>Genre</th>";

foreach ($res as $key => $val)
	{
		
		$print .= "<tr>
			<td>$key</td>
			<td>{$val->id}</td>
			<td><img width='80' height='40' src='{$val->image}' alt='{$val->title}'/></td>
			<td>{$val->title}</td>
			<td>{$val->YEAR}</td>
			<td>{$val->genre}</td>
		</tr>";
	} 



?>	