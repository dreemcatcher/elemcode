<?php
header("Content-Type: text/plain; charset=utf-8");
error_reporting(-1);
/* Оценки, которые поставили фотке анона в одноклассниках */
$rates = array(3, 5, 3, 2, 1, 8, 4, 3, 4, 3, 2, 3);
/* Посчитаем среднюю оценку. Для этого найдем сумму всех оценок, и поделим
ее на их количество */
$ratesSum = array_sum($rates);
$ratesCount = count($rates); /* Количество оценок — эту строчку надо дописать самому */
$averageRate = $ratesSum / $ratesCount; /* Средняя оценка — допиши сам */
echo "Анону поставили {$ratesCount} оценок, их сумма = {$ratesSum}\nСредний балл — {$averageRate}\n";
?>