<?php

function get_siteInfo(){
	
	$f_content = file_get_contents('version.txt');
	$version = trim($f_content);
	return $version;
}

function set_setting($string){
	$fh = fopen('version.txt', 'w');
	fwrite($fh, $string);
	fclose($fh);
}