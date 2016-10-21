<?php
$input='243+6743-78*2=';
$inputLength = mb_strlen($input);

$result=0;
$number=0;
$op="";

for ($i=0; $i<$inputLength;$i++){
    $char=mb_substr($input, $i, 1);

    if ($char=="*"||$char=="+"||$char=="-"||$char=="=") {
        if($op==''){
            $op=$char;
            $result=$number;
            $number=0;
        }
        elseif ($op == "+") {
            echo "Выполняем действие " . $result . "+" . $number;
            $result = (intval($result)) + (intval($number));
            echo "={$result} \n";
            $op=$char;
            $number = 0;
        } elseif ($op == "-") {
            echo "Выполняем действие " . $result . "-" . $number;
            $result = (intval($result)) - (intval($number));
            echo "={$result} \n";
            $op=$char;
            $number = 0;
            } elseif ($op == "*") {
            echo "Выполняем действие " . $result . "*" . $number;
            $result = (intval($result)) * (intval($number));
            echo "={$result} \n";
            $op=$char;
            $number = 0;
            } elseif ($char=="=") {
            echo "Финальный результат = " . $result;
            exit;
            } else {
            echo "Что-то пошло не так.";
            }

    }elseif (is_numeric($char)){
       /// echo "Поступило число  : {$char}. \n";
        $number=($number*10)+$char;
    }else{
        echo "Неверный символ: '$char'\n";
    }
}