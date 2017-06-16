<?php

if(file_exists('chess.php'))
	require('chess.php');
if($argv[1] == '--help')
{
	print "This tool is designed to take two paramaters: 1) Piece, 2) Position. Pieces include queen, rook, Knight. Positions include any letter-number combination in range a-h and 1-8 (d2) ";
	exit();
}
$piece = $argv[1];
$position = $argv[2];
$chess = new Chess;

$chess->SetPosition($position);
$chess->SetPiece($piece);
$chessPiece = $chess->GetPiece();

if($chessPiece != 'Invalid Piece')
{
	$createMoves = $chess->CreateMoves($chessPiece);

	foreach($createMoves[$chessPiece] as $value)
	{
		$splitStr = explode(' ', $value);
		$aMoves[] = $chess->Moves($splitStr[0], $splitStr[1], $chessPiece);
	}

	foreach($aMoves as $move)
	{
		foreach($move as $value)
		{
			if($value != $chess->GetPosition())
				$allMoves[] = $value;
		}
	}

	$availableMoves = implode(', ', $allMoves);

	print 'Position: ' . $chess->GetPosition() . ', ';
	print 'Piece: ' . $chess->GetPiece() . ', ';
	print 'Moves: ' . $availableMoves . ' ';
	
	exit();
	
}
else
{
	print 'That is an invalid chess piece for this exercise. You Chose Poorly.... For Help please use argument --help ';
	exit();
}


?>