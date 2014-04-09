<?php

include(__DIR__.'/config.php');


// Restore the database to its original settings
// $sql      = 'movie.sql';
// $mysql    = '/usr/local/bin/mysql';
// $host     = 'localhost';
// $login    = 'acronym';
// $password = 'password';
// $output = null;
 
include("functions.php");

// if(isset($_POST['restore']) || isset($_GET['restore'])) {
//   $cmd = "$mysql -h{$host} -u{$login} -p{$password} < $sql 2>&1";
//   $res = exec($cmd);
//   $output = "<p>Databasen är återställd via kommandot<br/><code>{$cmd}</code></p><p>{$res}</p>";
// }


$doco['title'] = "Film databas";

$doco['header'] = <<<EOD
<img class='sitelogo' src='img/doco.png' alt='Doco Logo'/>
<span class='sitetitle'>Doco webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;


include("movie/movieSubMenu.php");
$print = " ← Välj alternativ i menyn.";

// Do SELECT from a table

if(isset($_GET['u']))
{
	$file = $_GET['u'];
	include("movie/$file");
}


$doco['main'] = <<< EOD

{$movieSubMenu}
{$print}
EOD;






$doco['footer'] = <<<EOD
{$byline}
EOD;


include (DOCO_THEME_PATH);