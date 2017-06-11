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
$chess->SetPosition('f3');
$chess->SetPiece('Queen');
// print_r('Position: '.$chess->GetPosition());
// print_r('Piece: '.$chess->SetPiece('Rook'));
?>
<h1>This is the header </h1>
<p><?php echo 'Position: '.$chess->GetPosition()?></p>
<p><?php echo 'Piece: '.$chess->GetPiece()?></p>
<?php 


// foreach($test as $ivalue)
// {
// 	//$testing[$ivalue] =  $ivalue
// }
// print_r($testing);
?>