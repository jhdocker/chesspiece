<?php

if(file_exists('chess.php'))
	require('chess.php');

$chess = new Chess;
//print $chess->Location();
// foreach($chess->horizontal as $horizontal)
// 	{
// 		foreach($chess->verticle as $verticle)
// 			print($horizontal.': '.$verticle.'<br />');
// 	}
$chess->SetPosition('c4');
$chess->SetPiece('Queen');
$oRook = $chess->Queen($chess->GetPosition());
//print_r($chess->Execute_Move());
//print_r($chess->Moves('negative', 'positive'));
$test = $chess->CreateMoves('Queen');

foreach($test['Queen'] as $value)
{
	$splitStr = explode(' ', $value);
	print_r($chess->Moves($splitStr[0], $splitStr[1]));
	//print_r($splitStr[0].$splitStr[1]).'<br />';
}

$sMoves = '';
//$sVmoves = '';
//print_r($oRook);
foreach($oRook as $aRookMoves)
{
    $sMoves.=$aRookMoves.' ';
}
?>
<h1>This is the header </h1>
<p><?php echo 'Position: '.$chess->GetPosition();?></p>
<p><?php echo 'Piece: '.$chess->GetPiece();?></p>
<p><?php echo 'moves: '.$sMoves;?></p>
<?php 


// foreach($test as $ivalue)
// {
// 	//$testing[$ivalue] =  $ivalue
// }
// print_r($testing);
?>