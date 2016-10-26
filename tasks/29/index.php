<?php

error_reporting(-1);

mb_internal_encoding('utf-8');

$total=30;
$skip=5;
$peoples=7; // Надо чтобы осталось 7 победителей например

$losers=array();
$winners=array();
$l=0;


while ($total>7)
{
    for ($i=0;$i<$total;$i++){

        for ($j=0;$j<$skip;$j++){

            if (($total-$total+$j)==$skip) {
                array_push($losers, $total);
                $total=$total-1;
              //  $j=0;
            }else{

            }

        }
    }

//
//    for ($i=0; $i<=$total*$skip; $i++)
//    {
//        if (($i%$skip)==0){
//            array_push($losers, $total);
//        }else{
//
//        }
//        $total=$total-1;
//    }
//
//    $i=0;
}
//for($j=0;$j<=7;$j++){
//
//
//}


echo "<pre>";
print_r ($losers);
echo "</pre>";