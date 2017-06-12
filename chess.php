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
		return $aMoves;
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

