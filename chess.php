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

	public function SetPiece($sPiece)
	{
		if(in_array(strtoupper($sPiece), $this->aPieces))
			$this->sChessPiece = strtoupper($sPiece);
	}

	// Returns the chosen piece or error sting for the controller
	public function GetPiece()
	{
		if($this->sChessPiece == '')
			return 'Invalid Piece';
		else
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
		
		if(in_array(strtoupper(strtoupper($pos[0])), $this->horizontal) && in_array($pos[1], $this->verticle))
		{
			//print_r('test');
			$this->position['horizontal'] = strtoupper($pos[0]);
			$this->position['verticle'] = $pos[1];
		}
	}

	// switch loop of the possible pieces
	// probably not the best use of space but the positive negative
	// terms refer to the move direction it can possibly use on an x-y axis
	public function CreateMoves($sPiece)
	{
		$aMoves = array();
		switch ($sPiece) {
			case 'QUEEN':
				$aMoves['QUEEN'] = array(
					'positive positive',
					'positive negative',
					'negative positive',
					'negative negative',
					'stay positive',
					'stay negative',
					'positive stay',
					'negative stay',				
				);
				return $aMoves;
				break;

			case 'ROOK':
				$aMoves['ROOK'] = array(
					'stay positive',
					'stay negative',
					'negative stay',
					'positive stay',
									
				);
				return $aMoves;
				break;
			
			case 'KNIGHT':
				$aMoves['KNIGHT'] = array(
					'positive positive',
					'positive negative',
					'negative positive',
					'negative negative',		
				);
				return $aMoves;
				break;
			default:
				break;
		}
	}

	/* 
	* created two arrays for the horizontal movement (A,B,C,etc)
	* first one refers to the second one's index. 
	*/ 
	public function Moves($sHorizOperator, $sVertOperator, $name)
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
		
		// set the piece startpoint variables
		$x = $startpoint[0];
		$y = $startpoint[1];

		$moves = array();
		if($name == 'KNIGHT')
		{	
			// based on the direction, create the movement to the $moves array
			$concat = $sHorizOperator . ' ' . $sVertOperator;
			if($concat == 'positive positive')
			{
				$letter = $aVerticle[$y] + 1;	
				$number = $preHorizontal[$x] + 2;
				if($letter <= 8 && $number <= 8)
					$moves[] = $aHorizontal[$number].$letter;

				$letter = $aVerticle[$y] + 2;	
				$number = $preHorizontal[$x] + 1;
				if($letter <= 8 && $number <= 8)
					$moves[] = $aHorizontal[$number].$letter;
			}
			if($concat == 'positive negative')
			{
				$letter = $aVerticle[$y] + 1;	
				$number = $preHorizontal[$x] - 2;
				if($letter <= 8 && $number >= 1)
					$moves[] = $aHorizontal[$number].$letter;

				$letter = $aVerticle[$y] + 2;	
				$number = $preHorizontal[$x] - 1;
				if($letter <= 8 && $number >= 1)
					$moves[] = $aHorizontal[$number].$letter;
			}
			if($concat == 'negative negative')
			{
				$letter = $aVerticle[$y] - 1;	
				$number = $preHorizontal[$x] - 2;
				if($letter >= 1 && $number >= 1)
					$moves[] = $aHorizontal[$number].$letter;

				$letter = $aVerticle[$y] - 2;	
				$number = $preHorizontal[$x] - 1;
				if($letter >= 1 && $number >= 1)
					$moves[] = $aHorizontal[$number].$letter;
			}
			if($concat == 'negative positive')
			{
				$letter = $aVerticle[$y] - 1;	
				$number = $preHorizontal[$x] + 2;
				if($letter >= 1 && $number <= 8)
					$moves[] = $aHorizontal[$number].$letter;

				$letter = $aVerticle[$y] - 2;	
				$number = $preHorizontal[$x] + 1;
				if($letter >= 1 && $number <= 8)
					$moves[] = $aHorizontal[$number].$letter;
			}
		}
		// the queen and rook are a little easier. we just loop through all of their
		// possible directions until they hit their numerical limit
		else
		{
			while($preHorizontal[$x] <= 8 && $preHorizontal[$x] >= 1 && $aVerticle[$y] <= 8 && $aVerticle[$y] >= 1)
			{

				$moves[] = $aHorizontal[$preHorizontal[$x]].$aVerticle[$y];
				if($sHorizOperator=='positive')
					$preHorizontal[$x]++;
				if($sHorizOperator=='negative')
					$preHorizontal[$x]--;
				
				if($sVertOperator=='positive')
					$aVerticle[$y]++;
				if($sVertOperator=='negative')
					$aVerticle[$y]--;
			}
		}
		return $moves;
	}
}


