<?php
class CDice 
{

	// Properties / Variables
	public var $rollValue; 


	//Methods / Functions

	//Constructor
	public function __construct()
	{
		echo __METHOD__;
	}
	//Destructor
	public function __destruct()
	{
		echo __METHOD__ . "Dice object has been destroyed";
	}

	public function Roll()
	{
			$this->rollValue= rand(1,6);
		
			return $this->rollValue;
	}
	public function printValue()
	{
		echo $this->rollValue;
	}

	
}


