<?php

$sql = "SELECT *, (published <= NOW()) AS available
FROM Content;"; 	

$res = $db->ExecuteSelectQueryAndFetchAll($sql);

$db->printTable();


?>