<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
is_numeric($id) or die('Check: Id must be numeric.');

$sql = "
	DELETE FROM Content WHERE id = ?
";
$params = array($id);
$res = $db->ExecuteQuery($sql, $params);

if($res)
{
	$print = "Inlägget togs bort!";
}
else
{
	$print = "Fel vid borttagning!";
}


?>