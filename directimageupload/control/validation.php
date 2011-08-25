<?php
/**
	 * @author Rajan Rawal <rajan.rwl@gmail.com>
	 * @version 1.0
	 * @Desc
	 * This class contains the validation functions by which the form fields are validated
*/

/*
 * You can use only follwing keywords in order to validate a data
 * These valid words are:
 * 
 * 1. null 					// if data field in empty
 * 2. invalid				// If data do not match regular expression
 * 3. noentry				// If there is no such entry in database table
 * 4. nomatch				// Is value do not match with specific value
 * 5. notagree				// if user is not agree terms and condition
 * 6. atleast				// If atlest one field is required
 * 7. already_registered	// If data(user) is already registered
 * 8. below18				// If age is below 18
 * 9. valid					// If data is valid
 * 
 */
class VALIDATION extends CORE{
	
	public function NullCheck($value){
		//Generic function for null check
		$validation="";
		if($value==""){
			$validation = 'null';
		}elseif($value!=""){
			$validation = 'valid';
		}
		return $validation;
	}
	
	public function CheckResponseArray($response){
		// Generic funciton to check response array
		$validation = "";
		if(is_array($response)){
			if(in_array("null", $response['data']) || in_array("invalid", $response['data']) || in_array("nomatch", $response['data']) || in_array("below18", $response['data']) || in_array("already_registered", $response['data']) || in_array("notagree", $response['data'])  || in_array("atleast", $response['data']) || in_array("noentry", $response['data'])){
				$validation = false;
			}
			else{
				$validation = true;
			}
		}
		return $validation;
	}
	
	public function RegexValidation($value,$regex){
		// Generic function for regular expression
		$validation = "";
		if($value==""){
			$validation = 'null';
		}elseif($value!=""){
			if(!preg_match($regex, $value)){
				$validation = 'invalid';
			}else{
				$validation = 'valid';
			}
		}
		return $validation;
	}
	
	public function IsValidPath($path){
		if($path != '' && is_dir($path)){
			return 'valid';
		}else{
			return 'invalid';
		}
	}
	
	public function IsValueInArray($value,$array){
		$isnull = $this->NullCheck($value);
		if($isnull=='valid'){
			if(in_array($value, $array)){
				return 'valid';
			}else{
				return 'invalid';
			}
		}else{
			return 'null';
		}
	}
}