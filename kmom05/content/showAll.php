<?php

$type = "all";

$sql = "
SELECT * FROM Content ORDER BY id DESC;
";
$res = $db->ExecuteSelectQueryAndFetchAll($sql);
$print = "<br>";
foreach($res as $c)
{
	$print .= "
	<p>
	{$c->title}
	<h6><a href='content.php?p=content&amp;u=content/edit.php&amp;id={$c->id}'>Uppdatera</a>
	<a href='content.php?p=content&amp;u=content/delete.php&amp;id={$c->id}'>Ta bort</a>
	</h6>
	</p>
	<hr>
	";
}

?>