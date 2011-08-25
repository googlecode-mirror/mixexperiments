<?php
class CORE extends CONFIG{
	public function ImageNamingFormat($data) {
						$search = array("'"," ","(",")",".","&","-","\"","\\","?",":","/");
						$replace = array("","_","","","","","","","","","","");
						$new_data=str_replace($search, $replace, $data);
						return strtolower($new_data);
					}
					
	public function FetchTables($database,$neglect) { 
						$this->ConnectionOpen();
						$sql="SHOW TABLES FROM $database";
						//echo $sql;exit;
						$res=mysql_query($sql);
							while($data=@mysql_fetch_assoc($res)) {
								$table[]=$data["Tables_in_".$database];
							}
						$this->ConnectionClose();
						for($i=0;$i<count($table);$i++) {
							if(!in_array($i,$neglect)) {
								$new_data[]=$table[$i];
							}
						}
						return $new_data;
					}
	public function FetchTableField($table,$neglect) { 
						$this->ConnectionOpen();
						$sql="SHOW COLUMNS FROM $table";
//						exit;
						$res=mysql_query($sql);
							while($data=@mysql_fetch_assoc($res)) {
								$field[]=$data["Field"];
							}
						$this->ConnectionClose();
						for($i=0;$i<count($field);$i++) {
							if(!in_array($i,$neglect)) {
								$new_data[]=$field[$i];
							}
						}
						return $new_data;
					}
	public function PrintArray($array){
						echo '<pre>';
						print_r($array);
						echo '</pre>';
	}
}