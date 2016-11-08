<?php
header("Content-Type: text/plain; charset=utf-8");
$input='243+6743-78*2=';
$inputLength = mb_strlen($input);

$result=0;
$number=0;
$op="";

for ($i=0; $i<$inputLength;$i++){
    $char=mb_substr($input, $i, 1);

    if ($char=="*"||$char=="+"||$char=="-"||$char=="/"||$char=="^"||$char=="=")  {
        switch($op) {
            case '':
                $op = $char;
                $result = $number;
                $number = 0;
                break;
            case "+":
                echo "Выполняем действие " . $result . "+" . $number;
                $result = (intval($result)) + (intval($number));
                echo "={$result} \n";
                $op = $char;
                $number = 0;
                break;
            case "-":
                echo "Выполняем действие " . $result . "-" . $number;
                $result = (intval($result)) - (intval($number));
                echo "={$result} \n";
                $op=$char;
                $number = 0;
                break;
            case "*":
                echo "Выполняем действие " . $result . "*" . $number;
                $result = (intval($result)) * (intval($number));
                echo "={$result} \n";
                $op=$char;
                $number = 0;
                break;
            case "/":
                echo "Выполняем действие " . $result . "/" . $number;
                $result = (intval($result)) / (intval($number));
                echo "={$result} \n";
                $op=$char;
                $number = 0;
                break;
            case "^":
                echo "Выполняем действие " . $result . "^" . $number;
                $result = (intval($result)) ^ (intval($number));
                echo "={$result} \n";
                $op=$char;
                $number = 0;
                break;
            case "=":
                echo "Финальный результат = " . $result;
                exit;
        }
        if ($char=="="){
                echo "Финальный результат = " . $result;
                exit;
        }
    }elseif (is_numeric($char)){
        $number=($number*10)+$char;
    }else{
        echo "Неверный символ: '$char'\n";
    }
}