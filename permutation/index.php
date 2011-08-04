<?php
	include_once 'permutation.php';
	$obj = new PERMUTATION();
    
	header('Content-Type: text/plain');
    
    $traits = array
    (
        array('Happy', 'Sad', 'Angry', 'Hopeful'),
        array('Outgoing', 'Introverted'),
        array('Tall', 'Short', 'Medium'),
        array('Handsome', 'Plain', 'Ugly')
    );
   
   $obj->showCombinations(' ', $traits, 0,$output);
   echo "<pre>";
   print_r($output);
   echo "</pre>";
   
?>