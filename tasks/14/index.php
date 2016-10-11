<?php
error_reporting(-1);
mb_internal_encoding('utf-8');

$text="А роза упала на лапу Азора";

$result='падиндром';

$WithoutSpace = str_replace(" ","",$text);
$smallText=mb_strtolower($WithoutSpace);
$length = mb_strlen($smallText);
$halfLength=floor($length/ 2);

for ($i=0; $i<=$halfLength; $i++){
    $firstSymbol=mb_substr($smallText,$i,1);;
    $lastSymbol=mb_substr($smallText,$length-1-$i,1);;
    if ($firstSymbol==$lastSymbol){
        $result="падиндром";
    }else{
        $result="не падиндром";
        break;
    }
}
echo "Результат: {$result}";