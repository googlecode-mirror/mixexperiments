<?php

function PrintArray($arr){
	
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}

function SumPossible($val,$girlrange,$boyzrange){
	
	$combinations = array();
	if(($girlrange[1]+$boyzrange[1])<$val){
		
		$combinations = 0;
	}else{
		
		$lowermin = min($girlrange[0],$boyzrange[0]);
		$lowermax = max($girlrange[0],$boyzrange[0]);
		$uppermin = min($girlrange[1],$boyzrange[1]);
		
		$genderorder = array();
		if($lowermin==$girlrange[0]){
			$genderorder[0] = 'girl';
			$genderorder[1] = 'boy';
		}elseif($lowermin==$boyzrange[0]){
			$genderorder[0] = 'boy';
			$genderorder[1] = 'girl';
		}
		for($i = $lowermin,$j = $val-$lowermin;$i<=$uppermin,$j>=$lowermax;$i++,$j--){
			
			$combinations[] = array($genderorder[0]=>$i,$genderorder[1]=>$j);
		}	
	}
	return $combinations;
}

$girlrange = array(1,2);
$boyzrange = array(2,4);
PrintArray(sumpossible(4, $girlrange,$boyzrange));