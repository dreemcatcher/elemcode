<?php
header("Content-Type: text/plain; charset=utf-8");
//Дан текст, содержащий в себе email'ы (адреса почты вроде
// you+me@some.domain-domain.com ). Напиши скрипт, выводящий
// все email, встречающиеся в этом тексте
function findMail($text){
    $matches=array();
    $pattern = '/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-zа-я0-9]{2,4})+/i';
   // $pattern = '/([a-zA-Z0-9_.+-]+)@([a-z.-]+)/';
    preg_match_all($pattern, $text, $matches);

    return $matches;
}
$textBox=('Во первых у меня есть официальная почта для серёзных переговоров satosi@2ch.ru, 
во вторых есть почта для других целей randommail@mail.ru и в третьих gmail somename@gmail.com');

foreach (findMail($textBox)["0"] as $strong) {
    echo "<br />".$strong."<br />";
}
