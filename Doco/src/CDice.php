<?php
class CDice
{

	// Properties / Variables
	
	public $roll;

	//Methods / Functions
	//Constructor
	public function __construct()
	{
		//echo __METHOD__;
	}
	//Destructor
	public function __destruct()
	{
		//echo __METHOD__;
	}

	public function Roll()
	{
		$this->roll = rand(1,6);

		return $this->roll;
	}
}


