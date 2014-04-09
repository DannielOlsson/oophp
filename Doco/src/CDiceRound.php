<?php
class CDiceRound
{
	public $roundScore = 0; 
	public $roundCount = 0;

	//Returns total score of the round
	public function getRoundScore()
	{
		return $this->roundScore;
	}
	//Returns number of rounds done
	public function getRoundCount()
	{
		return $this->roundCount;
	}

	public function round($diceRoll)
	{
		if($diceRoll != 1)
		{
			$this->roundScore += $diceRoll;
		}
		else
		{
			$this->roundScore = 0;
			$this->roundCount++;
		}
		return $this->roundScore;
	}
	//SET ROUNDSCORE AND ROUNDCOUNT FROM SESSION VALUES
	public function setRoundScore($scoreFromSession)
	{
		$this->roundScore = $scoreFromSession;
	}
	public function setRoundCount($countFromSession)
	{
		$this->roundCount = $countFromSession;
	}
}