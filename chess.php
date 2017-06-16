<?php	
class Chess
{
	private 
		$pieces = array('KNIGHT', 'ROOK', 'QUEEN'),
		$position = array('horizontal' => '', 'verticle' => ''),
		$chessPiece = '',
		$verticle = array('1', '2', '3', '4', '5', '6', '7', '8'),
		$horizontal = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H')
	;

	public function SetPiece($piece)
	{
		if(in_array(strtoupper($piece), $this->pieces))
			$this->chessPiece = strtoupper($piece);
	}

	// Returns the chosen piece or error sting for the controller
	public function GetPiece()
	{
		if($this->chessPiece == '')
			return 'Invalid Piece';
		else
			return $this->chessPiece;
	}

	// Returns the position of the current piece
	public function GetPosition()
	{
		if($this->position['horizontal'] != '' && $this->position['verticle'] != '')
			return $this->position['horizontal'].$this->position['verticle'];
		else
			return 'Invalid Position';
	}

	// Set the position of the piece
	public function SetPosition($position)
	{
		$pos = str_split($position);
		
		if(in_array(strtoupper(strtoupper($pos[0])), $this->horizontal) && in_array($pos[1], $this->verticle))
		{
			$this->position['horizontal'] = strtoupper($pos[0]);
			$this->position['verticle'] = $pos[1];
		}
	}

	// switch loop of the possible pieces
	// probably not the best use of space but the positive negative
	// terms refer to the move direction it can possibly use on an x-y axis
	public function CreateMoves($piece)
	{
		$moves = array();
		switch ($piece) {
			case 'QUEEN':
				$moves['QUEEN'] = array(
					'positive positive',
					'positive negative',
					'negative positive',
					'negative negative',
					'stay positive',
					'stay negative',
					'positive stay',
					'negative stay',				
				);
				return $moves;
				break;

			case 'ROOK':
				$moves['ROOK'] = array(
					'stay positive',
					'stay negative',
					'negative stay',
					'positive stay',
									
				);
				return $moves;
				break;
			
			case 'KNIGHT':
				$moves['KNIGHT'] = array(
					'positive positive',
					'positive negative',
					'negative positive',
					'negative negative',		
				);
				return $moves;
				break;
			default:
				break;
		}
	}

	/* 
	* created two arrays for the horizontal movement (A,B,C,etc)
	* first one refers to the second one's index. 
	*/ 
	public function Moves($horizOperator, $vertOperator, $name)
	{
		$pos = $this->GetPosition();
		$startpoint = str_split($pos);
		$preHorizontal = array(
			'A' => 1, 
			'B' => 2, 
			'C' => 3, 
			'D' => 4, 
			'E' => 5, 
			'F' => 6, 
			'G' => 7, 
			'H' => 8);
		$horizontal = array(
			1 => 'A', 
			2 => 'B', 
			3 => 'C', 
			4 => 'D', 
			5 => 'E', 
			6 => 'F', 
			7 => 'G', 
			8 => 'H');
		$verticle = array(
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
			$concat = $horizOperator . ' ' . $vertOperator;
			if($concat == 'positive positive')
			{
				$letter = $verticle[$y] + 1;	
				$number = $preHorizontal[$x] + 2;
				if($letter <= 8 && $number <= 8)
					$moves[] = $horizontal[$number].$letter;

				$letter = $verticle[$y] + 2;	
				$number = $preHorizontal[$x] + 1;
				if($letter <= 8 && $number <= 8)
					$moves[] = $horizontal[$number].$letter;
			}
			if($concat == 'positive negative')
			{
				$letter = $verticle[$y] + 1;	
				$number = $preHorizontal[$x] - 2;
				if($letter <= 8 && $number >= 1)
					$moves[] = $horizontal[$number].$letter;

				$letter = $verticle[$y] + 2;	
				$number = $preHorizontal[$x] - 1;
				if($letter <= 8 && $number >= 1)
					$moves[] = $horizontal[$number].$letter;
			}
			if($concat == 'negative negative')
			{
				$letter = $verticle[$y] - 1;	
				$number = $preHorizontal[$x] - 2;
				if($letter >= 1 && $number >= 1)
					$moves[] = $horizontal[$number].$letter;

				$letter = $verticle[$y] - 2;	
				$number = $preHorizontal[$x] - 1;
				if($letter >= 1 && $number >= 1)
					$moves[] = $horizontal[$number].$letter;
			}
			if($concat == 'negative positive')
			{
				$letter = $verticle[$y] - 1;	
				$number = $preHorizontal[$x] + 2;
				if($letter >= 1 && $number <= 8)
					$moves[] = $horizontal[$number].$letter;

				$letter = $verticle[$y] - 2;	
				$number = $preHorizontal[$x] + 1;
				if($letter >= 1 && $number <= 8)
					$moves[] = $horizontal[$number].$letter;
			}
		}
		// the queen and rook are a little easier. we just loop through all of their
		// possible directions until they hit their numerical limit
		else
		{
			while($preHorizontal[$x] <= 8 && $preHorizontal[$x] >= 1 && $verticle[$y] <= 8 && $verticle[$y] >= 1)
			{

				$moves[] = $horizontal[$preHorizontal[$x]].$verticle[$y];
				if($horizOperator=='positive')
					$preHorizontal[$x]++;
				if($horizOperator=='negative')
					$preHorizontal[$x]--;
				
				if($vertOperator=='positive')
					$verticle[$y]++;
				if($vertOperator=='negative')
					$verticle[$y]--;
			}
		}
		return $moves;
	}
}


