<?php
function get_Age_difference($start_date,$end_date){
   list($start_year,$start_month,$start_date) = split('-', $start_date);
   list($current_year,$current_month,$current_date) = split('-', $end_date);
    $result = '';

   /** days of each month **/

   for($x=1 ; $x<=12 ; $x++){

       $dim[$x] = date('t',mktime(0,0,0,$x,1,date('Y')));

   }

   /** calculate differences **/

   $m = $current_month - $start_month;
   $d = $current_date - $start_date;
   $y = $current_year - $start_year;

   /** if the start day is ahead of the end day **/

   if($d < 0) {

       $today_day = $current_date + $dim[$current_month];
       $today_month = $current_month - 1;
       $d = $today_day - $start_date;
       $m = $today_month - $start_month;
       if(($today_month - $start_month) < 0) {

           $today_month += 12;
           $today_year = $current_year - 1;
           $m = $today_month - $start_month;
           $y = $today_year - $start_year;

       }

   }

   /** if start month is ahead of the end month **/

       if($m < 0) {

       $today_month = $current_month + 12;
       $today_year = $current_year - 1;
       $m = $today_month - $start_month;
       $y = $today_year - $start_year;

       }

   /** Calculate dates **/

   if($y < 0) {

       die("Start Date Entered is a Future date than End Date.");

   } else {

       switch($y) {

           case 0 : $result .= ''; break;
           case 1 : $result .= $y.($m == 0 && $d == 0 ? ' year old' : ' year'); break;
           default : $result .= $y.($m == 0 && $d == 0 ? ' years old' : ' years');

       }

       switch($m) {

           case 0: $result .= ''; break;
           case 1: $result .= ($y == 0 && $d == 0 ? $m.' month old' : ($y == 0 && $d != 0 ? $m.' month' : ($y != 0 && $d == 0 ? ' and '.$m.' month old' : ', '.$m.' month'))); break;
           default: $result .= ($y == 0 && $d == 0 ? $m.' months old' : ($y == 0 && $d != 0 ? $m.' months' : ($y != 0 && $d == 0 ? ' and '.$m.' months old' : ', '.$m.' months'))); break;

       }

       switch($d) {

           case 0: $result .= ($m == 0 && $y == 0 ? 'Today' : ''); break;
           case 1: $result .= ($m == 0 && $y == 0 ? $d.' day old' : ($y != 0 || $m != 0 ? ' and '.$d.' day old' : '')); break;
           default: $result .= ($m == 0 && $y == 0 ? $d.' days old' : ($y != 0 || $m != 0 ? ' and '.$d.' days old' : ''));
   
       }

   }

   return $result;

}

/* Call this function as */
$date_difference= get_Age_difference("2004-10-10",date("Y-m-d")); /* get_Age_difference(Birthdate,Todays_date) */
echo $date_difference;
