<?php

error_reporting(-1);

mb_internal_encoding('utf-8');
$text="Дым табачный воздух выел.
Комната —
глава в крученыховском аде.
Вспомни —
за этим окном
впервые
руки твои, исступлённый, гладил.
Сегодня сидишь вот,
сердце в железе.
10 День ещё —
выгонишь,
может быть, изругав.
В мутной передней долго не влезет
сломанная дрожью рука в рукав.";

$lines = explode ("\n",$text);
//print_r($lines); //чтобы посмотреть результат !

//echo count($lines)."<br>";

//echo "<pre>";
//print_r ;
//echo "</pre>";

for ($i=0; $i < count($lines); $i++){

//    echo "<pre>";
//    print_r($lines[$i]) ;
//    echo "</pre>";



    $symbol = preg_split('//u', $lines[$i], -1, PREG_SPLIT_NO_EMPTY);
//    echo "<pre>";
//    print_r($symbol) ;
//    echo "</pre>";



    for  ($j=0; $j < count($lines); $j++) {
        $symbols = preg_split('//u', $lines[$j], -1, PREG_SPLIT_NO_EMPTY);
        //echo $symbols[$i];
        if ((array_key_exists($i, $symbols))==true) {
            if ($symbols[$i]==' '){
                echo "&nbsp &nbsp";
            }
            else{
                echo "&nbsp ".$symbols[$i]."&nbsp ";
            }


        }else{
            echo " ";
        }
    }
    echo "<br>";
        //$symbols = preg_split('//u', $lines[$j], -1, PREG_SPLIT_NO_EMPTY);

 //   }
   // echo "<br>";
}


//
//
//    for ($i=0; $i < count($lines); $i++){
//        //$symbols = preg_split('//u', $lines[$i], -1, PREG_SPLIT_NO_EMPTY);
//        for  ($j=0; $j < count($lines[$i]); $j++) {
//            $symbols = preg_split('//u', $lines[$i], -1, PREG_SPLIT_NO_EMPTY);
//
//
//           // if ((array_key_exists($j, $symbols))==true) {
//                echo "&nbsp&nbsp".$symbols[$j]."&nbsp&nbsp";
//           // }else{
//           //     echo "&nbsp|&nbsp";
//           // }
//        }
//        echo "<br>";
//    }