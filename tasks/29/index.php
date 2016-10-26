<?php
error_reporting(-1);
mb_internal_encoding('utf-8');

$total=30;
$skip=5;
$survivors=7; // Видимо столько должно остаться
$allPeople=array();

function generateName()
{
    $letters = array(
        'ко',   'и',    'дзу',  'ми',
        'са',   'ку',   'ра',   'да',
        'чи',   'а',    'ки',   'ми',
        'на',   'го',   'ха',   'ру'
    );
    $name = ' ';
    for ($i = 1; $i <= 4; $i++) {
        $random = array_rand($letters);
        $randomText = $letters[$random];
        //echo "Выпало число {$random}, слог {$randomText}\n";
        $name=$randomText . $name;
    }
    return $name;
}

for ($i=0;$i<$total;$i++){
    $allPeople[$i]=generateName();
}

echo "<pre>";
 print_r ($allPeople);
echo "</pre>";

//unset($allPeople[1]);
//unset($allPeople[2]);
//unset($allPeople[3]);
//unset($allPeople[4]);
//unset($allPeople[5]);
//echo count($allPeople)."<br>";
//unset($allPeople[29]);
//echo count($allPeople)."<br>";
//unset($allPeople[20]);
//echo count($allPeople)."<br>";
//unset($allPeople[15]);
//echo count($allPeople)."<br>";

//echo "<pre>";
//print_r ($allPeople);
//echo "</pre>";
$slog=0;
$k=0;
$j=0;

for($i=0; $i<($total-$survivors);$i++){
    $j++;
    $k++;
    if ( $k==5){
        $k=0;
        unset($allPeople[$i]);
        echo $i."<br>";
    }else{}
    if($j==$allPeople){
        $j=0;
    }else{}
}
//while ($survivors<count($allPeople)){
  //  $k++;
  //  if($k==count($allPeople)){
    //    $k=0;
  ////  }else{
     //   if ($slog==$skip){

         //   $slog=0;
       // }
       // else
       // {
       //     $slog++;
       // }
  //  }
//}
//while (count($allPeople)>$survivors ){
//    $w++;
//    //for ($k=0; ;$k++){
//
//    echo "Маркер 4";
//
//        if ($w==count($allPeople)){
//            $w=0;
//            echo "Маркер 3";
//        }
//        else {
//            if($slog==5){
//                unset($allPeople[$w]);
//               // sort($allPeople);
//               // echo "Тут такой " .current( $allPeople )." выбывает.<br>";
//                echo "Маркер 1";
//                $slog=0;
//            }
//            else{
//                echo "Маркер 2";
//                $slog++;
//            }
//        }
//}
echo "<pre>";
print_r ($allPeople);
echo "</pre>";
//echo generateName();