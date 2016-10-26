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
$doubleArray=array();
//echo "<pre>";
//print_r ($lines);
//echo "</pre>";
for ($i=0; $i < count($lines); $i++){
    $symbol = preg_split('//u', $lines[$i], -1, PREG_SPLIT_NO_EMPTY);
    for ($j=0; $j<count($symbol); $j++) {
        $doubleArray[$i][$j] = $symbol[$j];
    }
//    echo "<pre>";
//    print_r ($symbol);
//    echo "</pre>";
}
//echo "<pre>";
// print_r ($doubleArray);
//echo "</pre>";
?>
<table><tr>
<?php
for ($k=0;$k<33;$k++){
    for($r=0; $r<count($doubleArray);$r++){
        if (isset($doubleArray[$r][$k])) {
            // Чтобы было как у опа
            if($doubleArray[$r][$k]==' '){
                echo  "<td>&#8195&#8195|</td>";
            }
            else{
                echo  "<td>&#8195".$doubleArray[$r][$k]."&nbsp&nbsp|</td>";
            }
        }
        else {
            echo " <td>&#8195&#8195|</td>";
        }
    }
    echo "</tr><tr>";
}
?></tr></table>