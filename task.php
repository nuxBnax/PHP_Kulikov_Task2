<?php

//1. Реализовать основные 4 арифметические операции в виде функции с тремя параметрами – два параметра это числа,
// третий – операция. Обязательно использовать оператор return.

function arithmeticOperations(int $arg1, int $arg2, string $operation): float
{
    if ($operation == 'Sum') {
        return $arg1 + $arg2;
    }
    if ($operation == 'Subtract') {
        return $arg1 - $arg2;
    }
    if ($operation == 'Multiply') {
        return $arg1 * $arg2;
    }
    if ($operation == 'Divide') {
        return $arg1 / $arg2;
    } else {
        return 0;
    }
}

;

//2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1,
//$arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения
//операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное
//значение (использовать switch).

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case 'Sum':
            echo arithmeticOperations($arg1, $arg2, 'Sum');
            break;
        case 'Subtract':
            echo arithmeticOperations($arg1, $arg2, 'Subtract');
            break;
        case 'Multiply':
            echo arithmeticOperations($arg1, $arg2, 'Multiply');
            break;
        case 'Divide':
            echo arithmeticOperations($arg1, $arg2, 'Divide');
            break;
        default:
            echo "Unknown operation";
    }
}

;
mathOperation(2, 5, 'Multiply');
echo PHP_EOL;

//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве
// значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива,
// чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область:
// Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

$cities = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Гатчина',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань',
        'Касимов',
        'Михайлов',
        'Новомичуринск'
    ]
];

foreach ($cities as $city => $arr) {
    echo $city . ':' . PHP_EOL;
    foreach ($arr as $item) {
        echo '   ' . $item . PHP_EOL;
    }
}

//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
//буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

$alfabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
    ' ' => ' ', ',' => ',', '.' => '.',
    '!' => '!', '?' => '?', '-' => '-'
];

$str = 'Привет от желтых штеблет, Как там Ваши дела? У нас Всё хорошо!';


function transliteration(string $str)
{
    $arrStr = mb_str_split($str);
    $newString = '';
    global $alfabet;
    for ($i = 0; $i < count($arrStr); $i++) {
        foreach ($alfabet as $key => $value) {
            if (mb_strtolower($arrStr[$i]) == $key && mb_strtolower($arrStr[$i]) == $arrStr[$i]) {
                $newString .= $value;
            }
            if (mb_strtolower($arrStr[$i]) == $key && mb_strtolower($arrStr[$i]) != $arrStr[$i]) {
                $newString .= strtoupper($value);
            }
        }
    }
    return $newString;
}

echo transliteration($str);

//5. *С помощью рекурсии организовать функцию возведения числа в степень.
//Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

echo PHP_EOL;
function power(int $val, int $pow): int
{
    if ($pow <= 0) {
        return 1;
    }
    return power($val, $pow - 1) * $val;
}

echo "Результат возведения в степень - " . power(5, 4);

echo PHP_EOL;

// 6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты.

function timeNow()
{
    $currentTime = date("H:i");
    $currentTimeToArray = explode(':', $currentTime);
    if ($currentTimeToArray[0] % 10 == 0 || $currentTimeToArray[0] % 10 >= 5 && $currentTimeToArray[0] % 10 <= 20) {
        $hours = ' часов ';
    }
    if ($currentTimeToArray[0] == 1 || $currentTimeToArray[0] == 21) {
        $hours = ' час ';
    }
    if ($currentTimeToArray[0] % 10 >= 2 && $currentTimeToArray[0] % 10 <= 4) {
        $hours = ' часа ';
    }

    if ($currentTimeToArray[1] == 1 || $currentTimeToArray[1] > 20 && $currentTimeToArray[1] % 10 == 1) {
        $minute = ' минута';
    }
    else if ($currentTimeToArray[1] >= 2 && $currentTimeToArray[1] <= 4 || $currentTimeToArray[1] > 20 &&
        ($currentTimeToArray[1] % 10 >= 2 && $currentTimeToArray[1] <= 4)){
        $minute = ' минуты';
    } else {
        $minute = ' минут';
    }

    $time = $currentTimeToArray[0] . $hours . $currentTimeToArray[1] . $minute;
    return $time;
}

echo timeNow();