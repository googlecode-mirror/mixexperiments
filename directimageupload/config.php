<?php 
/**
 * Created By: Rajan Rawal
 * Created Date: 9th Feb 2011
 * Modified By:  Rajan Rawal
 * Modified Date: 17th of June 2011
 * @desc:  This is the database connection file contain database connection details
 * ls .			                                           
 */
?>
<?php
date_default_timezone_set('Asia/Calcutta');
/**
 * @author: aNKIT kHAMBHATA
 * @desc: Database Connection File 
 */
class CONFIG {
	private $hostname;
	private $username;
	private $password;
	private $database;
	private $connect;
	private $select_db;
	/**
	 * @author: aNKIT kHAMBHATA
	 * @desc: This function used to connect database 
	 */		
	public function ConnectionOpen() {
						
						$this->hostname = "192.168.0.73";
						$this->username = "root";
						$this->password = "binary";
						$this->database = "sample";
						/*
						$this->hostname = "74.52.40.170";
						$this->username = "helpdesk_bwsdb";
						$this->password = "Bc67%gnt";
						$this->database = "helpdesk_bwsdb";
						*/
						$this->connect = mysql_connect($this->hostname,$this->username,$this->password)or die(mysql_error());
						if(!$this->connect) {
							echo "Mysql Not Connected";
						} 
//						else {
//							echo 'Database connected';
//						}
						$this->select_db = mysql_select_db($this->database);
							if(!$this->select_db){
								echo "Database Not Connected";
							}
					} // end of connectionopen
	public function ConnectionClose() { 
						@mysql_close($this->connect);
					}
	
	public function GetDb(){
						$this->ConnectionOpen();
						$name = $this->database;
						$this->ConnectionClose();
						return $name;
					}
	public function HostName(){
						$this->ConnectionOpen();
						$name = $this->hostname;
						$this->ConnectionClose();
						return $name;
					}
}// end of Class 
?>