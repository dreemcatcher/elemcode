<?php

function grammarCheck($text){
    //echo $text."<br>";
    // Проверим в лоб на отсутствие запятых перед а и но
    $regexpA='/(\s\sа\s)|(([а-я0-9]\sа\s))/u';
    // Маркируем нашу ошибку
    $text=preg_replace($regexpA,'[, a]',$text);

    $regexpNO='/(\s\sно\s)|(([а-я0-9]\sно\s))/u';
    // Маркируем нашу ошибку
    $text=preg_replace($regexpNO,'[, но]',$text);

    $regexpNO='/(жы)/ui';
    $text=preg_replace($regexpNO,'[жи]',$text);

    $regexpNO='/(ши)/ui';
    $text=preg_replace($regexpNO,'[ши]',$text);

    $regexpNO='/(сдесь)/ui';
    $text=preg_replace($regexpNO,'[здесь]',$text);

    $regexpNO='/(координально)/ui';
    $text=preg_replace($regexpNO,'[кардинально]',$text);

    $regexpNO='/(зделал)/ui';
    $text=preg_replace($regexpNO,'[сделал]',$text);

    $regexpNO='/(зделаю)/ui';
    $text=preg_replace($regexpNO,'[сделаю]',$text);

    $regexpNO='/(зделан)/ui';
    $text=preg_replace($regexpNO,'[сделан]',$text);

    $regexpNO='/(,[^\s])/ui';
    $text=preg_replace($regexpNO,'[, ]',$text);

    $regexpNO='/(;[^\s])/ui';
    $text=preg_replace($regexpNO,'[; ]',$text);

    $regexpNO='/(![^\s])/ui';
    $text=preg_replace($regexpNO,'[! ]',$text);

    $regexpNO='/([?][^\s])/ui';
    $text=preg_replace($regexpNO,'[? ]',$text);

    $regexpNO='/([.]{2}[^\s])/ui';
    $text=preg_replace($regexpNO,'[. ]',$text);

    $regexpNO='/[:][^\s]/ui';
    $text=preg_replace($regexpNO,'[: ]',$text);

    return $text;
}

// Текст для проверки. Извините, мне действительно не приходит в голову ничего кроме text
// Аккуратно ставим в текст ошибки.
// Текст из ЖЖ Лебедева, так что заранее извиняюсь за маты если они там есть.

$text="Главный секрет психического здоровья - оставаться внутри собственной капсулы комфорта.
По умолчанию сдесь каждому человеку достается ситуация,когда ему хорошо,удобно, комфортно, ладно с собой и своими мыслями. 
С годами все идет по пизде, конечно. координально, сдесь, зделал, зделаю, зделан . И особенно этому способствуют другие люди. Каждый что-то хочет, дает советы, доебывается, пытается исправить тебя и пр.
А особенно сложно бывает тем, кто по какой-то причине зделал стал известным. В классе, в компании, в телевизоре, в интернете, 
на улице. Количество желающих достучаться до тебя и вольно или невольно разрушить капсулу комфорта возрастает и становится невыносимым.
Единственный способ сохранить рассудок и не лишиться психического здоровья - игнор. Жы шы пишы с буквай и. И зачем я только взял этот текст?Всё-равно..дописывать пришлось.
Игнор - фантастически действительный способ. Игнор бывает самым разнообразным зделаю. Приведу пару примеров из собственного опыта.
Первый уровень игнора - не считать, что все входящие сигналы имеют зделан ко мне какое-либо отношение. Тот факт, что я вижу 
или слышу угрозу, оскорбление, ненужные мне слова совершенно не означает, что я готов их пропустить во внутренние покои. Кто-то что-то сказал,
 окей, но это не повод для меня инвестировать хотя;бы одну копейку душевных сил для принимания этого шума близко к сердцу. Тест:на:двоеточие.
Второй уровень игнора - физическая координально фильтрация. Тоже крайне действенная мера. Любой известный человек неизбежно 
обрастает микроорганизмами, которые без должной гигиены рискуют вырасти в мозговых полипов. У меня есть кроме эпизодических 
сумасшедших около десятка постоянных авторов разной степени фундаментального расстройства мышления (обоего пола)!Некоторые из них пишут до 15 писем в сутки.
Разумеется, если бы я даже просто пролистывал эту мутную хуету, я бы довольно быстро обрел расстройство рассудка. Поэтому у 
меня выработалось простое правило: как только я получаю десятое письмо от очередного ебаната, я тут же настраиваю фильтр на 
стороне сервера, и все дальнейшие письма даже не доходят до меня, растворяясь в пучине сточных вод.
Ко второму уровню так же относится и любая другая блокировка. Бывают пронырливые ебанаты, которые лезут в ФБ, ВК, смс, звонки, 
почту и пр. Главное - везде их заблокировать и забанить. Тогда они угасают как спичка в закрытой банке. По крайней мере для меня.
Приведенные выше способы сохранения здорового рассудка пригодятся любому, кто начал вести блог и неизбежно столкнулся с 
немотивированным потоком говна и доебываний, а также просто всем обычным людям во всех жизненных ситуациях.
Оберегайте внутренние покои, а тут я написал а и но без запятой. А тут будет проверка на отсутствие запятой перед 'а' а тут но будет проверка на отсутствие запятой перед 'но'";

//Вызов функции
echo grammarCheck($text);