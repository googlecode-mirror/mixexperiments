<?php
include_once 'xml.php';

$xmlObj = new Xml2Assoc();

$assoc = $xmlObj->parseFile('names.xml',true);
echo "<pre>";
print_r($assoc);
//foreach($assoc['names']['name'] as $name){
//	echo $name['fname']." ".$name['lname']."<br>";
//}
echo "</pre>";
?>