<?php
header("Content-Type: text/plain; charset=utf-8");
error_reporting(-1);
mb_internal_encoding('utf-8');

$total=30;
$skip=5;
$survivors=7; // Видимо столько должно остаться
$allPeople=array();
$loosers=array();
$winners=array();

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
    $newname=generateName();
    $allPeople[$i]=$newname;
    $cloneallPeople[$i]=$newname;
}
//foreach ($allPeople as $key => $value){
//  //  array_push();
//}

//echo "<pre>";
// print_r ($allPeople);
//echo "</pre>";
while ($survivors<(count($allPeople))){
    for ($i=0;$i<count($allPeople);){
        for($j=0; $j <$survivors+1;){
         //   echo "[$j]<br>";
            if ($j==$skip){
                if (count($allPeople)<=$survivors){
//                    echo "Массив осташихся<br>";
//                    echo "<pre>";
//                    print_r($allPeople);
//                    echo "</pre>";
//
//                    echo "Выбывшие <br>";
//                    echo "<pre>";
//                    print_r(array_keys($loosers));
//                    echo "</pre>";
//
//                    echo "Оставшиеся <br>";
//
////                    foreach ($cloneallPeople as $key => $val)
////                    {
////                        $keyy = array_search('green', $array);
////                        echo $key.$val;
////                    }
////
////                    echo "<pre>";
////                    print_r($cloneallPeople);
////                    echo "</pre>";
////  array_diff_key
                    break;
                }
              //  echo "Сколько человек в массиве ".count($allPeople)."<br>";
              //  echo $allPeople[$i]." выбывает<br>";
                //$str_Key = $row['key'];
                $loosers[$i]=$allPeople[$i];
                unset($allPeople[$i]);
                sort($allPeople);
              //  echo $i."<br>";

                $j=0;
            }
            else{
                $i++;
                if($i>count($allPeople)){
                    $i=0;
                }
                $j++;
            }
        }
    }
}
//echo "Оставшиеся <br>";
$result = array_intersect($cloneallPeople, $allPeople);
//echo "<pre>";
//print_r($result);
//echo "</pre>";
echo "Выигрышные места ".implode(", ", array_keys($result))."\n";
echo "Остались пить чай с тортиком ".implode(", ", $result)."\n";