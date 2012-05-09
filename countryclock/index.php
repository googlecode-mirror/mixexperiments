<?php

echo '<pre>';
//print_r( DateTimeZone::listIdentifiers());
//print_r( DateTimeZone::listAbbreviations());
print_r(DateTimeZone::getLocation);
echo '</pre>';

//$timeZones = DateTimeZone::listIdentifiers();
//foreach ( $timeZones as $key => $zoneName )
//{
//    $tz = new DateTimeZone($zoneName);
//    $loc = $tz->getLocation();
//    print($zoneName . " = " . $loc['comments'] . "<br>");
//}
//?>
