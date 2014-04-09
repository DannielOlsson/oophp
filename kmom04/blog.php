<?php
$mans = isset($_POST['mans'] ? $_POST['mans'] : null)
echo "<form method='post'>
	Sök person: <input type='text' name='mans'/>
	<p><input type='submit' value='Max e en kuk'/></p>
";
if($mans != null)
{
	echo "<p>" . $mans . " can be found somewhere on youtube. And le max like le tranz</p>";
}

?>