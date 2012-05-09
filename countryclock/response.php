<?php
$country_code = $_POST['code'];
$time_zone = DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY,$country_code);
echo '<pre>';
print_r($time_zone); 
echo '</pre>';