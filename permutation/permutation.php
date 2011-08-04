<?php
class PERMUTATION{
	function showCombinations($string, $traits, $i, &$output){
		
        if ($i >= count($traits)){
        	$output[] = trim($string);
            //echo trim($string) . "\n";
        }    
        else
        {
            foreach ($traits[$i] as $trait){
            	$this->showCombinations("$string $trait", $traits, $i + 1,$output);
            }
        }
    }
}