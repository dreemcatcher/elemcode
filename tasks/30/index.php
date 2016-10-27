<?php
// circus
error_reporting(-1);
mb_internal_encoding('utf-8');

$phrase = "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЫЪЭЮЯ";

$fromAngle= -80;
$toAngle=260;
$radius=12.5;  // LO

$height = 30;
$centerX=40;
$centerY=15;


$sinalpha=0;
$cosalpha=0;

$phrase = preg_split('//u', $phrase, -1, PREG_SPLIT_NO_EMPTY);
$countPhrase=count($phrase);
echo "$countPhrase"."<br>";

$lk=2; // высота
$lo=$radius; // радиус
$ko=2; // отдаление

$sinalpha=$lk/$lo;
$cosalpha=$ko/$lo;

echo "$sinalpha"."<br>";
echo "$cosalpha"."<br>";


$screen=array();

echo "<pre>";
 print_r ($phrase);
echo "</pre>";

echo "<br>";
for($y=0; $y<80; $y++){
    $screen[$y]=array_fill(0,80,'');
}


foreach($phrase as $key => $symbol){


    echo $key."<br>";
    $alpha=$key/$radius;
   // $sinalpha=0;
    // x KO=LO*sin(@)
    // y LK=LO*cos(@)
    $x=round($radius*(sin($alpha)*57.2958))/10;
    $y=round($radius*(cos($alpha)*57.2958))/10;

    $x=round($x);
    $y=round($y);

    echo "$symbol координата х = {$x} координата y = {$y}"."<br>";

    $screen[$y][$x]='A';

}


echo "<pre>";
print_r ($screen);
echo "</pre>";



foreach ($screen as $val){

    foreach ($val as $symbol){

        echo "[]";

    }

    echo "<br>";
}