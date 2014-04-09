<?php

include (__DIR__.'/config.php');

$doco['title'] = "Tärningspelet 100";

$doco['header'] = <<<EOD
<img class='sitelogo' src='img/doco.png' alt='Doco Logo'/>
<span class='sitetitle'>Doco webbtemplate</span>
<span class='siteslogan'>Återanvändbara moduler för webbutveckling med PHP</span>
EOD;

$dicePrint = 0;
$RoundPrint = 0;
$CountPrint = 0;
$TotalPrint = 0;
$won = "Kämpa på!";

if(isset($_GET["u"]))
{
	//Objekt
	$game = new CDiceGame;
	$round = new CDiceRound;
	//Variabel deklaration
	

	if(isset($_SESSION["TotalScore"]))
	{	
		$sessionTotalScore = $_SESSION["TotalScore"];
		$game->setTotalScore($sessionTotalScore);
		$TotalPrint = $sessionTotalScore;
	}
	else
	{
		$_SESSION['TotalScore'] = 0;
	}
	//Om tidigare poäng finns så läggs de i roundScore som ligger i CDiceRound klassen. 
	if(isset($_SESSION["RoundScore"]))
	{	
		$sessionRoundScore = $_SESSION["RoundScore"];
		$round->setRoundScore($sessionRoundScore);
	}

	if(isset($_SESSION["RoundCount"]))
	{
		$sessionRoundCount = $_SESSION["RoundCount"];
		$round->setRoundCount($sessionRoundCount);
		$CountPrint =  $sessionRoundCount;
	}
	else
	{
		$_SESSION["RoundCount"] = 0;
	}	

	switch($_GET["u"])
	{
		case "throw":
		{
			
			$dice = new CDice;
			$value = $dice->Roll();
			$dicePrint = $value;

			$round->round($value);
			//Sparar undan poäng i session.
			$_SESSION["RoundScore"] = $round->getRoundScore();
			$_SESSION["RoundCount"] = $round->getRoundCount();
			$RoundPrint = $round->getRoundScore();
			//$round->printRoundScore();
			$CountPrint = $round->getRoundCount();
			$TotalPrint = $game->getTotalScore();

			break;
		}

		case "save":
		{
			if(isset($_SESSION["RoundScore"]))
			{
			$game->additionToTotalScore($_SESSION["RoundScore"]);
			}
			
			$_SESSION["TotalScore"] = $game->getTotalScore();
			$won = $game->won();

			$CountPrint = $_SESSION["RoundCount"] += 1;
			$TotalPrint = $_SESSION['TotalScore'];
			
			if($won == "Du har vunnit spelet!:)")
			{
				$_SESSION['TotalScore'] = 0;
				$_SESSION['RoundCount'] = 0;
				$CountPrint = 0;
				$TotalPrint = 0;
			}
			unset($_SESSION["RoundScore"]);
			
			break;
		}
		case "kill":
		{
			session_destroy();
			header('Location: '.$_SERVER['PHP_SELF'] . '?p=dice');
		}
	}
} 
else
{
	$_GET["u"] = null;

}




$doco['main'] = <<<EOD
<h1> Tärningspelet 100 </h1>
<p>-Målet med spelet är att du ska samla på dig 100 poäng!</p>
<p>Under varje runda som du spelar så kommer dina slag plussas ihop till en summa som läggs ihop 
med dina totala poäng, förutsatt att du sparar rundans poäng innan du får en 1:a. Då försvinner rundans poäng.</p>

<p>Använd menyn nedan för att kasta och spara poäng från nuvarande rond.</p>

<p> <a href="?p=dice&amp;u=throw">Kasta</a> | <a href="?p=dice&amp;u=save">Spara poäng</a> | <a href="?p=dice&amp;u=kill">Börja om</a></p>
Kast: {$dicePrint}
<br>
Poäng runda: {$RoundPrint}
<br>
Antal avslutade rundor: {$CountPrint}
<br>
Total poäng: {$TotalPrint}
<br>
{$won}
	
EOD;


$doco['footer'] = <<<EOD
{$byline}
EOD;



include(DOCO_THEME_PATH);

?>