<?php

class CHistogram extends CDice{

	public function getHistogram()
	{
		for ($i=0; $i < 6; $i++) { 
			$number = 1;
			echo $number . ": ";
			foreach($this->rolls as $value)
			{
				if($value == $number)
				{
					echo "*";
				}
			}
			$number+=1;
		}
	}

}