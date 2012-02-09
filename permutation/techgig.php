<?php

function printArray($arr){
	
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

function nCr($n, $r){
   if ($r > $n)
     return NaN;
   if (($n - $r) < $r)
     return nCr($n, ($n - $r));
   $return = 1;
   for ($i=0; $i<$r; $i++){
     $return *= ($n - $i) / ($i + 1);
   }
   return $return;
} 

function GenerateGroup($ingroup, $boys, $girls){
	
	$minboys = 2;
	$mingirls = 1;
	$output = 0;
	if($boys<4 || $girls<1){
		$output = 0; 
	}else{
		
		$pos_combinations = BoysGirlsPossibleCombinations($ingroup, $minboys, $mingirls, $boys, $girls);
		PrintArray($pos_combinations);
		
		$sum = 0;
		foreach($pos_combinations as $combination){
			$set_combi = nCr($boys,$combination['boy']) * nCr($girls,$combination['girl']);
			$sum += $set_combi;
			//echo '$sum: '.$sum;
			//echo "nCr($boys,".$combination['boy'].")*nCr($girls,".$combination['girl'].")<br/>";
		}
		$output = $sum;
	}
	return $output;
}

function BoysGirlsPossibleCombinations($teamsize,$minboys,$mingirls,$boys,$girls){
	
	$combinations = array();
	if($teamsize>($boys+$girls) || $girls<$mingirls || $boys<$minboys || $teamsize<($minboys+$mingirls)){
		echo 'Something is wrong in team selection';
		$combinations = array();
	}else{
		
		$girlrange = array($mingirls,$girls);
		$boyzrange = array($minboys,$boys);
		$combinations = SumPossible($teamsize, $girlrange,$boyzrange);
	}
	return $combinations;
}

$possible_combinations = GenerateGroup(4, 4, 2);

echo 'Possible combinations: '.$possible_combinations;