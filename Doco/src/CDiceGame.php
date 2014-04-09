<?php

class CDiceGame
{
	public $totalScore = 0;
	public function won()
	{
		if($this->totalScore >=100)
		{
			$value = "Du har vunnit spelet!:)";
		}
		else 
		{
			$value = "Kämpa på!";
		}
		return $value;
	}

	public function additionToTotalScore($roundScore)
	{
		$this->totalScore += $roundScore;
	}
	public function setTotalScore($totalScoreFromSession)
	{
		$this->totalScore = $totalScoreFromSession;
	}
	public function getTotalScore()
	{
		return $this->totalScore;
	}

}