<form action="<?php $_SERVER['PHP_SELF'];?>">
<select name="timezonechoice" size="10"><?php
function timezonechoice($selectedzone) {
$all = timezone_identifiers_list();
$i = 0;
foreach($all AS $zone) {
$zone = explode('/',$zone);
$zonen[$i]['continent'] = $zone[0];
$zonen[$i]['city'] = $zone[1];
$i++;
}
asort($zonen);
foreach($zonen AS $zone) {
extract($zone);
if($continent == 'Africa' OR $continent == 'America' OR $continent == 'Antarctica' OR $continent == 'Arctic' OR $continent == 'Asia' OR $continent == 'Atlantic' OR $continent == 'Australia' OR $continent == 'Europe' OR $continent == 'Indian' OR $continent == 'Pacific') {
if(!isset($letztercontinent)) $structure .= '
<optgroup label="'.$continent.'">'; // continent
elseif($letztercontinent!=$continent) $structure .= '</optgroup>
<optgroup label="'.$continent.'">'; // continent
if($city!='') $structure .= "
<option ".((($continent.'/'.$city)==$selectedzone)?'selected="selected "':'')." value=\"".($continent.'/'.$city)."\">".str_replace('_',' ',$city)."</option>"; //Timezone
else $structure .= "
<option ".(($continent==$selectedzone)?'selected="selected "':'')." value=\"".$continent."\">".$continent."</option>"; //Timezone
$letztercontinent = $continent;
}
}
$structure .= '
</optgroup>';
return $structure;
}
echo timezonechoice('Europe/Berlin');
?></select>
<input type="submit">
</form>
<?php
echo $timezonechoice;

date_default_timezone_set("$timezonechoice");


$now = time();

// print_r( localtime(time(),true) );
// print_r( getdate() );

print date(" H:i:s");
print date(" T");

?>