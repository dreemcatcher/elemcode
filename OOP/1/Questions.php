<?php
header("Content-Type: text/plain; charset=utf-8");
class Question
{
    public $text;           // текст вопроса
    public $points = 5;     // число баллов, по умолчанию 5
    public $answers;        // варианты ответов
    public $correctAnswer;  // правильный ответ
}


$q1 = new Question;
$q2 = new Question;
$q3 = new Question;

//var_dump($q1);

// Вопрос 1
$q1 = new Question;
$q1->text = "Какая планета располагается четвертой по счету от Солнца?";
$q1->points = 10; // 10 баллов за ответ
$q1->answers = array('a' => 'Венера', 'b' => 'Марс', 'c' => 'Юпитер', 'd' => 'Меркурий'); // Варианты ответа
$q1->correctAnswer = 'c'; // Правильный ответ

// Вопрос 2
$q2 = new Question;
$q2->text = 'Какой город является столицей Великобритании?';
$q2->points = 5;
$q2->answers = array('a' => 'Париж', 'b' => 'Москва', 'c' => 'Нью-Йорк', 'd' => 'Лондон');
$q2->correctAnswer = 'd';

// Вопрос 3
$q3 = new Question;
$q3->text = 'Кто придумал теорию относительности?';
$q3->points = 30;
$q3->answers = array('a' => 'Джон Леннон', 'b' => 'Джим Моррисон', 'c' => 'Альберт Эйнштейн', 'd' => 'Исаак Ньютон');
$q3->correctAnswer = 'c';

// Выведем содержимое, чтобы проверить, что все верно
//var_dump($q1, $q2, $q3);


function createQuestions()
{
    // Создаем пустой массив
    $questions = [];

    // Создаем и заполняем первый объект
    $q = new Question;
    $q->text = 'Какой тег отвечает за создание таблицы в HTML';
    $q->answers = array('a' => '<HTML>', 'b' => '<TD>', 'c' => '<table>', 'd' => '<tr>');
    $q->correctAnswer = 'c';
    // Кладем вопрос в массив
    $questions[] = $q;

    // Создаем второй объект
    $q = new Question;
    $q->text = 'Тут такой вопрос 2';
    $q->answers = array('a' => 'Париж', 'b' => 'Москва', 'c' => 'Нью-Йорк', 'd' => 'Лондон');
    $q->correctAnswer = 'c';
    // Кладем вопрос в массив
    $questions[] = $q;

    // Создаем второй объект
    $q = new Question;
    $q->text = 'Тут такой вопрос 3';
    $q->answers = array('a' => 'Париж', 'b' => 'Москва', 'c' => 'Нью-Йорк', 'd' => 'Лондон');
    $q->correctAnswer = 'c';
    // Кладем вопрос в массив
    $questions[] = $q;

    return $questions;
}


function printQuestions($questions)
{
    $number = 1; // номер вопроса

    foreach ($questions as $question) {
        echo "{$number}. {$question->text}\n\n";

        echo "Варианты ответов:\n";

        foreach ($question->answers as $letter => $answer) {
            echo "  {$letter}. {$answer}\n";
        }

        $number++;
    }
}

$questions = createQuestions();
printQuestions($questions);


function checkAnswers($questions, $answers)
{
    // Проверим, что число ответов равно числу вопросов (защищаемся от ошибки)
    if (count($questions) != count($answers)) {
        die("Число ответов и вопросов не совпадает\n");
    }

    $pointsTotal = 0; // сколько набрано баллов

    // сколько можно набрать баллов при всех правильных ответах
    $pointsMax = 0;
    // сколько отвечено верно
    $correctAnswers = 0;

    $totalQuestions = count($questions); // Сколько всего вопросов

    // Цикл для обхода вопросов и ответов
    for ($i = 0; $i < count($questions); $i++) {
        $question = $questions[$i]; // Текущий вопрос
        $answer = $answers[$i]; // текущий ответ

        // Считаем максимальную сумму баллов
        $pointsMax += $question->points;

        // Проверяем ответ
        if ($answer == $question->correctAnswer) {
            // Добавляем баллы
            $correctAnswers ++;
            $pointsTotal += $question->points;
        } else {
            // Неправильный ответ
            $number = $i + 1;
            echo "Неправильный ответ на вопрос №{$number} ({$question->text})\n";
        }
    }

    // Выведем итог
    echo "Правильных ответов: {$correctAnswers} из {$totalQuestions}, баллов набрано: ? из ?\n";
}

$questions = createQuestions();
printQuestions($questions);
$answers = array('c', 'd', 'a');
checkAnswers($questions, $answers);