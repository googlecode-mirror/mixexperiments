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
	public function InsertSimple($table,$f,$d,$image_status,$image_field,$image_value,$status) { 
						for($i=0;$i<count($f);$i++) {
							if($image_status == '1' && $f[$i] == $image_field) {
								$str[]="'".$image_value."'";
								$parameters[]=($image_field);
							} else {
								if(count($d[$f[$i]]) >1) { 
									$data_arr=implode(',',$d[$f[$i]]);
								} else { 
									$data_arr=$d[$f[$i]];
								}
								$str[]="'".$this->DataFilter($data_arr)."'";
								$parameters[]=$f[$i];
							}
						}
						$sql="insert into $table (".implode(',',$parameters).") values (".implode(',',$str).")";
//						echo $sql; 
//						exit;
						$res=mysql_query($sql);
						$id=mysql_insert_id();
							if($res) {
								if($status == '1') {
									return $id;
								} else {
									return true;
								}
							} else {
								return false;
							}
					}
	public function DataFilter($data){
						$this->ConnectionOpen();
						$data1=mysql_real_escape_string(trim($data));
						return $data1;
					}
}