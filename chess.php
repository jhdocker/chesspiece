<?php	
class Chess
{

	private 
		$aPieces = array('KNIGHT', 'ROOK', 'QUEEN'),
		$position = array('horizontal' => '', 'verticle' => ''),
		$sChessPiece = '',
		$verticle = array('1','2','3','4','5','6','7','8'),
		$horizontal = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H')
		
		
	;

	// public function Testing()
	// {
	// 	$oPiece = new ChessFactory;
	// 	return $oPiece->CreateRook();

	// }
	public function SetPiece($sPiece)
	{
		if(in_array(strtoupper($sPiece), $this->aPieces))
		{
			$this->sChessPiece = $sPiece;
			
		}
		

	}

	// Returns the chosen piece
	public function GetPiece()
	{
		return $this->sChessPiece;
	}

	// Returns the position of the current piece
	public function GetPosition()
	{
		return $this->position['horizontal'].$this->position['verticle'];
	}

	// Set the position of the piece
	public function SetPosition($sPosition)
	{
		$pos = str_split($sPosition);
		
		if(in_array(strtoupper($pos[0]), $this->horizontal) && in_array($pos[1], $this->verticle))
		{
			//print_r('test');
			$this->position['horizontal'] = strtoupper($pos[0]);
			$this->position['verticle'] = $pos[1];
		}
		//print_r($this->position);
		
	}


	public function Rook($sPosition)
	{

		$startpoint = str_split($sPosition);
		$aMoves = array();
		
		// letters
		foreach($this->horizontal as $horizontal)
		{
			if($horizontal == $startpoint[0])
			{
				foreach ($this->verticle as $verticle) {
					$aMoves[] = $horizontal.$verticle;
				}
			}
		}
		// numbers
		foreach($this->verticle as $verticle)
		{
			if($verticle == $startpoint[1])
			{

				foreach ($this->horizontal as $horizontal) {
					$aMoves[] = $horizontal.$verticle;
				}
			}
		}
		return $aMoves;
	}

	public function Queen($sPosition)
	{

		$startpoint = str_split($sPosition);
		$aMoves = array();
		
		// letters
		foreach($this->horizontal as $horizontal)
		{
			if($horizontal == $startpoint[0])
			{
				foreach ($this->verticle as $verticle) {
					$aMoves[] = $horizontal.$verticle;
				}
			}
		}
		
		
		// numbers
		foreach($this->verticle as $verticle)
		{
			if($verticle == $startpoint[1])
			{

				foreach ($this->horizontal as $horizontal) {
					$aMoves[] = $horizontal.$verticle;
				}
			}
		}
		foreach($this->horizontal as $horizontal)
		{
			
			if($horizontal == $startpoint[0])
			{
				foreach ($this->verticle as $verticle) {
					if($verticle == $startpoint[1])
					{
						// $aMoves[] = $horizontal.$verticle;
						$IncNum = $startpoint[1] ++;
						$IncLetter = $startpoint[0] ++;
						$aMoves[] = $IncLetter.$IncNum;
					}
					
				}
			}
		}
		return $aMoves;
	}


	public function Execute_Move()
	{
		// $sPos = $this->GetPosition();
		// $startpoint = str_split($sPos);
		// $preHorizontal = array(
		// 	'A' => 1, 
		// 	'B' => 2, 
		// 	'C' => 3, 
		// 	'D' => 4, 
		// 	'E' => 5, 
		// 	'F' => 6, 
		// 	'G' => 7, 
		// 	'H' => 8);
		// $aHorizontal = array(
		// 	1 => 'A', 
		// 	2 => 'B', 
		// 	3 => 'C', 
		// 	4 => 'D', 
		// 	5 => 'E', 
		// 	6 => 'F', 
		// 	7 => 'G', 
		// 	8 => 'H');
		// $aVerticle = array(
		// 	1 => '1', 
		// 	2 => '2', 
		// 	3 => '3', 
		// 	4 => '4', 
		// 	5 => '5', 
		// 	6 => '6', 
		// 	7 => '7', 
		// 	8 => '8');
		// //print_r($startpoint);
		// $x = $startpoint[0];
		// $y = $startpoint[1];
		// //print_r($x);
		// //print_r($preHorizontal[$x]);
		// //print_r($aHorizontal[$preHorizontal[$x]]);
		// $test = array();
		// // print out positive letters
		// while($preHorizontal[$x] <= 8 && $preHorizontal[$x] >= 1 && $aVerticle[$y] <= 8 && $aVerticle[$y] >= 1)
		// {
		// 	// prints positive letters;
		// 	//print_r($aHorizontal[$preHorizontal[$x]]);
		// 	//print_r($aVerticle[$y]);

		// 	$test['++'][] = $aHorizontal[$preHorizontal[$x]].$aVerticle[$y];
		// 	$preHorizontal[$x]++;
		// 	$aVerticle[$y]++;
		// }

		// $xx = $startpoint[0];
		// $yy = $startpoint[1];
		// print_r($preHorizontal[$xx]);
		// while($preHorizontal[$x] <= 8 && $preHorizontal[$x] >= 1 && $aVerticle[$y] <= 8 && $aVerticle[$y] >= 1)
		// {
			// prints positive letters;
			//print_r($aHorizontal[$preHorizontal[$x]]);
			//print_r($aVerticle[$y]);

		// 	$test['+-'][] = $aHorizontal[$preHorizontal[$xx]].$aVerticle[$yy];
		// 	$preHorizontal[$xx]++;
		// 	$aVerticle[$y]--;
		// }
		// print_r($test);
		// print '<br/>break<br />';
		// foreach($aHorizontal as $key=>$value)
		// {
		// 	$start = $startpoint[0];
		// 	//print_r($start);
			
		// 		print_r($key ++);
		// }
		// foreach($aVerticle as $skey=>$svalue)
		// {
		// 	print_r($svalue);
		// }
		
		// while ( <= 10) {
		// 	# code...
		// }
	}

	public function Moves($sHorizOperator, $sVertOperator, $sName)
	{
		$sPos = $this->GetPosition();
		$startpoint = str_split($sPos);
		$preHorizontal = array(
			'A' => 1, 
			'B' => 2, 
			'C' => 3, 
			'D' => 4, 
			'E' => 5, 
			'F' => 6, 
			'G' => 7, 
			'H' => 8);
		$aHorizontal = array(
			1 => 'A', 
			2 => 'B', 
			3 => 'C', 
			4 => 'D', 
			5 => 'E', 
			6 => 'F', 
			7 => 'G', 
			8 => 'H');
		$aVerticle = array(
			1 => '1', 
			2 => '2', 
			3 => '3', 
			4 => '4', 
			5 => '5', 
			6 => '6', 
			7 => '7', 
			8 => '8');
		
		$x = $startpoint[0];
		$y = $startpoint[1];
		print $preHorizontal[$x].$sHorizOperator;
		print $aVerticle[$y].$sVertOperator .'<br />';
		$test = array();
		// print out positive letters
		while($preHorizontal[$x] <= 8 && $aVerticle[$y] <= 8 )
		{

			$test[$sName][] = $aHorizontal[$preHorizontal[$x]].$aVerticle[$y];
			$preHorizontal[$x]++;
			$aVerticle[$y]++;
		}
		return $test;
	}


}

// class ChessFactory
// {
// 	private $moves = '';

// 	public function CreateRook()
// 	{
// 		$this->moves = array('horizontal', 'verticle');
// 		return $this->moves;
// 	} 
// }

