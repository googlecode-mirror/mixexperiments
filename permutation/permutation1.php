<?php 
function nCr($n, $r){
   if ($r > $n)
     return NaN;
   if (($n - $r) < $r)
     return nCr($n, ($n - $r));
   $return = 1;
   for ($i=0; $i<$r; $i++){
     $return *= ($n - $i) / ($i + 1);
   }
   return $return;
} 

echo 'nCr: '. nCr(16, 3);
?>
