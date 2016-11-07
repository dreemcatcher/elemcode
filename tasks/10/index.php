<?php
header("Content-Type: text/plain; charset=utf-8");
error_reporting(-1);
/* Слоги, из которых составляется имя */
$letters = array(
    'ко', 'и', 'дзу', 'ми',
    'са', 'ку', 'ра', 'да',
    'чи', 'а', 'ки', 'ми',
    'на', 'го', 'ха', 'ру'
);
/* В эту переменную запишем получившееся имя */
$name = ' ';
/* Гененрируем 4 слога */
for ($i = 1; $i <= 4; $i++) {
    /* Выкидываем случайное число (count - число элементов в массиве) */
    $random = array_rand($letters);
    $randomText = $letters[$random];
//    echo "<pre>";
//    print_r ($letters);
//    echo "</pre>";
    echo "Выпало число {$random}, слог {$randomText}\n";
    $name = $randomText . $name;
}
echo "------\n";
echo "Советую имя: {$name} - не прогадаешь!\n";