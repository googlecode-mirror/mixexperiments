<?php
include_once 'xml.php';

$xmlObj = new Xml2Assoc();

$assoc = $xmlObj->parseFile('names.xml',true);
$xml = new XMLReader();
$xml->open('names.xml');
$assoc1 = $xmlObj->xml2assocTagsChildsAttrs($xml);
echo "<pre>";
//print_r($assoc);
print_r($assoc1);
//foreach($assoc['names']['name'] as $name){
//	echo $name['fname']." ".$name['lname']."<br>";
//}
echo "</pre>";
?>