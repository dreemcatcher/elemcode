<?php
$input='10+10+10+10+10-10+10*2-2=';
$inputLength = mb_strlen($input);

$result=0;
$number=0;
$op="";

echo $input."<br>";
echo $result."<br>";
for ($i=0; $i<$inputLength;$i++){
    $char=mb_substr($input, $i, 1);

    if ($char=="*"||$char=="+"||$char=="-"||$char=="=") {
        //$result=$number;
        $op="$char";
        if ($op == "+") {
            ///echo $result . "<br>";
            echo "Выполняем действие" . $result . "+" . $number;
            $result = (intval($result)) + (intval($number));
            echo "={$result}<br>";
            $op=$char;
            $number = 0;
        } elseif ($op == "-") {
            echo "Выполняем действие" . $result . "-" . $number;
            $result = (intval($result)) - (intval($number));
            echo "={$result}<br>";
            $op=$char;
            $number = 0;
            } elseif ($op == "*") {
            echo "Выполняем действие" . $result . "*" . $number;
            $result = (intval($result)) * (intval($number));
            echo "={$result}<br>";
            $op=$char;
            $number = 0;
            } elseif ($op == "=") {
            echo "Финальный Результат" . $result;
            exit;
            } else {
            echo "11111111";
            }

    }elseif (is_numeric($char)){
        echo "Поступило число  : {$char}.<br>";
        $number=($number*10)+$char;
    }else{
        echo "Неверный символ: '$char'\n";
    }
}