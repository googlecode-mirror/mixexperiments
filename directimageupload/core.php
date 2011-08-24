<?php
class CORE extends CONFIG{
	public function ImageNamingFormat($data) {
						$search = array("'"," ","(",")",".","&","-","\"");
						$replace = array("","_","","","","","","");
						$new_data=str_replace($search, $replace, $data);
						return strtolower($new_data);
					}
}